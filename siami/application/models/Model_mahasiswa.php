
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mahasiswa extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getdatamahasiswa($id=null){
		$this->db->select("*");
		$this->db->from("view_mahasiswa");
		$this->db->where("nim", $id);
		$this->db->limit(0,1);

		return $this->db->get();
	}

	public function caridatamahasiswa($id=null){
		$this->db->select("*");
		$this->db->from("view_mahasiswa");
		$this->db->like("nim", $id);
		$this->db->or_like("nama", $id);
		$this->db->limit(0,20);

		return $this->db->get();
	}


}
