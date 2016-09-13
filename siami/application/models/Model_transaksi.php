<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getdatabiaya($nim, $angkatan){
		return $this->db->query("select * from biaya natural join jenis_bayar WHERE kode_biaya not in(select kode_biaya from (select *, (jml_biaya-jumlah_bayar) as sisa from pembayaran natural join biaya where nim='".$nim."' group by kode_biaya having sisa=0) as a) and angkatan='".$angkatan."' or status='P'");
	}

	public function getdatajenisbayar($angkatan,$tgl){
		return $this->db->query("SELECT kode_jns_bayar, kode_biaya, jml_biaya, status, tgl_aktif, nama_jns_bayar FROM biaya natural join jenis_bayar where angkatan = '".$angkatan."' and status='A' UNION SELECT t2.kode_jns_bayar, t1.kode_biaya, t1.jml_biaya, t2.status, t1.tgl_aktif, t2.nama_jns_bayar FROM biaya t1 natural join jenis_bayar t2 inner join (SELECT max(tgl_aktif) as tgl, kode_jns_bayar from biaya natural join jenis_bayar where (status='P' and tgl_aktif <= str_to_date('".$tgl."', '%d-%m-%Y')) GROUP BY kode_jns_bayar) t3 ON t2.kode_jns_bayar = t3.kode_jns_bayar and t1.tgl_aktif = t3.tgl");
	}

	public function getbiaya($kb,$ta){
		return $this->db->query("select * from biaya natural join jenis_bayar where tgl_aktif <= str_to_date('".$ta."', '%d-%m-%Y') and kode_biaya='".$kb."'");
	}

	public function simpanbayar($data){
		$this->db->insert("pembayaran", $data);
	}

	public function gettransaksi($nim){
		$this->db->select("nim, kode_bayar, jumlah_bayar, jml_biaya, keterangan, nama_jns_bayar, tglbyr, statusbayar");
		$this->db->from("view_pembayaran");
		$this->db->where("nim = '".$nim."'");
		$this->db->order_by('statusbayar','ASC');
		$this->db->order_by('kode_bayar','ASC');
		$this->db->order_by('kode_bayar','ASC');

		return $this->db->get();
	}

	public function gettr($kode){
		$this->db->select("*");
		$this->db->from("view_pembayaran");
		$this->db->where("kode_bayar = '".$kode."'");

		return $this->db->get();
	}

	public function hapustransaksi($id){
		$this->db->where("kode_bayar = '".$id."'");
		$this->db->delete("pembayaran");
	}

	public function simpanangsuran($data, $where){
		$this->db->where($where);
		$this->db->update("pembayaran", $data);
	}

	public function getKurikulum(){
			return $this->db->query("select * from tb_kurikulum");
	}

	public function getvalidtransaksi($kdbyr){
		$this->db->select("nim, kode_bayar,statusbayar");
		$this->db->from("view_pembayaran");
		$this->db->where("statusbayar = 'Lunas' AND kode_bayar='".$kdbyr."'");
		return $this->db->get();
	}

	function get_view_by_id($table,$field,$sort)
  {
      $this->db->where($field, $sort);
      return $this->db->get($table)->row();
  }

	public function get_query($q)
	{
		return $this->db->query($q)->result();
	}
}
