<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('model_pembayaran', 'mp');
	}
	
	public function index(){
		$x['datajb'] = $this->mp->ambildata()->result();
		$x['jmljb'] = $this->mp->ambildata()->num_rows();
		$x['akses'] = false;
		$data['data'] = $this->load->view('view_pembayaran',$x,true);
		$data['active'] = 'pembayaran';
				
		$this->load->view('view_home',$data);
	}
	
	public function jenisbayar(){
		$data['data'] = $this->load->view('view_jenisbayar',null,true);
		$data['active'] = 'pembayaran';
		
		$this->load->view('view_home',$data);
	}
	
	public function kelolabiaya(){
		$data['data'] = $this->load->view('view_kelolabiaya',null,true);
		$data['active'] = 'pembayaran';
		
		$this->load->view('view_home',$data);
	}
    
    public function kelola(){
        $kodejb = $this->input->post("jnsbyr");
        $angkatan = $this->input->post("angkatan");
        $nominal = $this->input->post("nomby");
        $kodeby = "BY".$this->input->post("kodeby");

        $data = array(
        	"kode_biaya"=>$kodeby,
        	"kode_jns_bayar"=>$kodejb,
        	"jml_biaya"=>$nominal,
        	"angkatan"=>"",
        	"tgl_aktif"=>"0000-00-00"
        );

        if($this->input->post("tglaktif") !== null){
			$tgl = explode("-",$this->input->post("tglaktif"));
       		$data['tgl_aktif'] = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        }

        if($this->input->post("angkatan") !== null){
        	$data['angkatan'] = $this->input->post("angkatan");
        }

        $this->mp->simpanbayar($data);

        redirect("pembayaran");
    }
	
	public function simpan(){
		$kode = "JB".$this->input->post("kodejb");
		$nama = $this->input->post("namajb");
		$status = $this->input->post("statusjb");
		
		$data = array(
			"kode_jns_bayar" => $kode,
			"nama_jns_bayar" => $nama,
			"status" => $status
		);
		
		$this->mp->simpan($data);
		
		redirect("pembayaran");
	}
	
	public function edit($id){
		$id = base64_decode($id);
		$where = array("kode_jns_bayar" => $id);
		
		$kode = "JB".$this->input->post("kodejb");
		$nama = $this->input->post("namajb");
		$status = $this->input->post("statusjb");
		
		$data = array(
			"kode_jns_bayar" => $kode,
			"nama_jns_bayar" => $nama,
			"status" => $status
		);
		
		$this->mp->edit($data, $where);
		
		redirect("pembayaran");
		
	}

	public function hapusbiaya($id){
		$id = base64_decode($id);

		$this->mp->hapusbiaya("kode_biaya = '".$id."'");
		redirect("pembayaran");

	}
	
	public function e($id){
		$id = base64_decode($id);
		$x['data'] = $this->mp->ambildataid($id)->result();
		$x['jml'] = $this->mp->ambildataid($id)->num_rows();
		$data['data'] = $this->load->view('view_editjbayar',$x,true);
		$data['active'] = 'pembayaran';
		
		$this->load->view('view_home',$data);
	}
	
	public function h($id){
		$id = base64_decode($id);
		
		$where = array("kode_jns_bayar"=>$id);
		$this->mp->hapus($where);
		redirect("pembayaran");
	}

	public function d($d){
		$x['datajb'] = $this->mp->ambildata()->result();
		$x['jmljb'] = $this->mp->ambildata()->num_rows();
		if($d == "periodik"){
			$x['datavb'] = $this->mp->ambildatavb("status = 'P'")->result();
			$x['jmlvb'] = $this->mp->ambildatavb("status = 'P'")->num_rows();
			$x['status'] = $d;
		}
		if(is_numeric($d)){
			$x['datavb'] = $this->mp->ambildatavb("angkatan = '".$d."'")->result();
			$x['jmlvb'] = $this->mp->ambildatavb("angkatan = '".$d."'")->num_rows();
			$x['status'] = $d;
		}

		$x['akses'] = true;
		$data['data'] = $this->load->view('view_pembayaran',$x,true);
		$data['active'] = 'pembayaran';
				
		$this->load->view('view_home',$data);
	}
}

?>


