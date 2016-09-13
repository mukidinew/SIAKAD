<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_webservice extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function ambildatajb($where){
		$this->db->select("*");
		$this->db->from("jenis_bayar");
		$this->db->where($where);
		
		return $this->db->get();
	}
	
	public function ambildataangkatan($where){
		$this->db->select("angkatan");
		$this->db->from("biaya");
		$this->db->where($where);
		
		return $this->db->get();
	}
}
