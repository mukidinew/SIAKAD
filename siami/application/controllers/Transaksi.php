
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("model_mahasiswa");
		$this->load->model("model_transaksi");
	}

	public function index(){
		$data['data'] = $this->load->view('view_transaksi',null,true);
		$data['active'] = 'transaksi';

		$this->load->view('view_home',$data);
	}

	public function layanan(){

		$cari = $this->input->get("cari");

		$x = null;
		if(!empty($cari)){
			$x['src'] = $cari;
			$x['datamahasiswa'] = $this->model_mahasiswa->caridatamahasiswa($cari)->result();
			$x['jml'] = $this->model_mahasiswa->caridatamahasiswa($cari)->num_rows();
		}
		$data['data'] = $this->load->view('view_layanan',$x,true);
		$data['active'] = 'layanan';

		$this->load->view('view_home',$data);
	}

	public function laporan(){
		$x['jenis_bayar'] = $this->model_transaksi->get_query("SELECT * FROM jenis_bayar");
		$data['data'] = $this->load->view('view_laporan',$x,true);
		$data['active'] = 'laporan';
		$this->load->view('view_home',$data);
	}

	public function laporan_buat(){
		$this->load->library('fpdf_gen');
		$angkatan = $this->input->post('angkatan');
		$jurusan = $this->input->post('jurusan');
		$tahun = $this->input->post('thn');
		$jb = $this->input->post('jb');
		if ($jurusan == '1') {
			$data_laporan = $this->model_transaksi->get_query("SELECT * FROM view_pembayaran WHERE angkatan='".$angkatan."' AND nama_jns_bayar='".$jb."'");
		}
		else {
			$data_laporan = $this->model_transaksi->get_query("SELECT * FROM view_pembayaran WHERE nim LIKE '%".$jurusan."%' AND (angkatan='".$angkatan."' AND (nama_jns_bayar='".$jb."'))");
		}

		$data['data_laporan'] = $data_laporan;
		//echo json_encode($data_laporan);
		$data['angkatan'] = $angkatan;
		if ($jurusan=='55201') {
			$data['jurusan'] = "TI";
		}
		else if ($jurusan=='57201') {
				$data['jurusan'] = "SI";
		}
		else{
				$data['jurusan'] = "SI/TI";
		}
		$data['tahun'] = $tahun;
		$data['jenis_bayar'] = $jb;
		$this->load->view("cetak_laporan",$data);

		$html = $this->output->get_output();
		$this->dompdf->set_paper("legal", 'potrait');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("".$angkatan."-".date('D-M-Y').".pdf",array('Attachment'=>0));
	}

	public function p($id){
		$id = base64_decode($id);
		$tgl= date("d-m-Y");
		$x['kurikulum'] = $this->model_transaksi->getKurikulum()->result();
		$x['datam'] = $this->model_mahasiswa->getdatamahasiswa($id)->result();
		$x['datajb'] = $this->model_transaksi->getdatajenisbayar($x['datam'][0]->angkatan,$tgl)->result();
		$data['data'] = $this->load->view("view_prosestransaksi", $x, true);
		$this->load->view("view_home", $data);
	}

	public function simpantransaksi(){
		$kodebayar = md5(date("dmYHis").$this->input->post("nim"));
		$tgl = explode("-",$this->input->post("tglbayar"));
		$tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		$data =  array(
			"kode_bayar" => $kodebayar,
			"kode_biaya" => $this->input->post("kkb"),
			"nim" => $this->input->post("nim"),
			"nik" => "140201025",
			"jumlah_bayar" => $this->input->post("jby"),
			"tgl_byr" => $tgl,
			"keterangan" => $this->input->post("ket"),
			"no_referensi" => $this->input->post("norefbank")
		);
		$this->model_transaksi->simpanbayar($data);
		// redirect("mahasiswa/d/".base64_encode($this->input->post("nim")));
	 	$act= array(
			'hasil' => true,
			'data' =>$kodebayar
		);
		echo json_encode($act);
	}

	public function getbiaya(){
		$kjb = $this->input->post("kb");
		$ta = $this->input->post("tglbayar");
		$data = $this->model_transaksi->getbiaya($kjb,$ta)->result();

		echo $data[0]->kode_biaya." : ".$data[0]->jml_biaya;
	}

	public function getjenisbiaya(){
		$angkatan = $this->input->post("angk");
		$tgl = $this->input->post("tglbayar");
		$data = $this->model_transaksi->getdatajenisbayar($angkatan,$tgl)->result();
		echo "<option value=''>--Pilih Jenis Biaya--</option>";
		foreach($data as $j){
			echo "<option value='".$j->kode_biaya."'>".$j->nama_jns_bayar."</option>";
		}
	}

	public function hapus($id,$nim){
		$id = $id;
		$this->model_transaksi->hapustransaksi($id);
		redirect("mahasiswa/d/".base64_encode($nim));
	}

	public function bayarangsuran($kode){
		if(!empty($kode)){
			$datax['kurikulum'] = $this->model_transaksi->getKurikulum()->result();
			$datax['dt'] = $this->model_transaksi->gettr($kode)->result();
			$data['data'] = $this->load->view("view_bayarangsuran",$datax,true);
		}
		$this->load->view("view_home",$data);
	}

	public function simpanangsuran(){
		$bayarbaru = $this->input->post("jmlbyr")+$this->input->post("jmlangsuran");
		$data = array(
			"jumlah_bayar" => $bayarbaru
		);
		$where = "kode_bayar = '".$this->input->post("kdbyr")."'";
		$a = $this->model_transaksi->simpanangsuran($data, $where);

		$kode_bayar = $this->input->post('kdbyr');
		$hasil = $this->model_transaksi->getvalidtransaksi($kode_bayar);
		if ($hasil->num_rows() == 1) {
				echo true;
		}
		else{
			echo false;
		}
	}

	public function cetak_transaksi($kode_bayar='')
	{
		$this->load->library('fpdf_gen');
		$data_pembayaran = $this->model_transaksi->get_view_by_id('view_pembayaran','kode_bayar',$kode_bayar);
		$data_identitas = $this->model_transaksi->get_view_by_id('view_mahasiswa','nim',$data_pembayaran->nim);
		$data['kode_bayar']=$data_pembayaran->kode_bayar;
		$data['nama']=$data_identitas->nama;
		$data['nim']=$data_pembayaran->nim;
		$data['jurusan']='.................';
		$data['konfirmasi']='Y';
		$data['status']=$data_pembayaran->statusbayar;
		$data['periode']=$data_pembayaran->keterangan;
		$this->load->view("cetak_transaksi",$data);
		$html = $this->output->get_output();
		$this->dompdf->set_paper(array(0,0,684.00,297.00), 'potrait');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("".$data_pembayaran->nim."-".date('D-M-Y').".pdf",array('Attachment'=>0));
	}
}

?>
