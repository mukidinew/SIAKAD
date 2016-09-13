<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembayaran extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function simpan($data){
		$this->db->insert('jenis_bayar',$data);
	}

	public function simpanbayar($data){
		$this->db->insert('biaya', $data);
	}
	
	public function ambildata(){
		$this->db->select("*");
		$this->db->from("jenis_bayar");
		
		return $this->db->get();
	}

	public function ambildatavb($where){
		$this->db->select("*");
		$this->db->from("view_biaya");
		
		if(!empty($where)){
			$this->db->where($where);
		}
		
		return $this->db->get();
	}

	public function ambildataid($id){
		$this->db->select("*");
		$this->db->from("jenis_bayar");
		$this->db->where("kode_jns_bayar", $id);
		
		return $this->db->get();
	}
	
	public function edit($data, $where){
		$this->db->where($where);
		$this->db->update("jenis_bayar", $data);
	}
	
	public function hapus($where){
		$this->db->where($where);
		$this->db->delete("jenis_bayar");
	}

	public function hapusbiaya($where){
		$this->db->where($where);
		$this->db->delete("biaya");
	}
	
	public function lihatpembayaran(){
		
	}
	
	public function lihatpembayarandetail($id){
		
	}
	
	public function hapuspembayaran($id){
		
	}
	
}

?>
