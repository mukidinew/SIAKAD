<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public $table = 'tb_mhs';
    public $id = 'nim';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($where_prodi)
    {
      $this->db->where('kd_prodi',$where_prodi);
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nim', $q);
      	$this->db->or_like('nm_mhs', $q);
      	$this->db->or_like('tpt_lhr', $q);
      	$this->db->or_like('tgl_lahir', $q);
      	$this->db->or_like('jenkel', $q);
      	$this->db->or_like('agama', $q);
      	$this->db->or_like('kelurahan', $q);
      	$this->db->or_like('wilayah', $q);
      	$this->db->or_like('nm_ibu', $q);
      	$this->db->or_like('kd_prodi', $q);
      	$this->db->or_like('tgl_masuk', $q);
      	$this->db->or_like('smt_masuk', $q);
      	$this->db->or_like('status_mhs', $q);
      	$this->db->or_like('status_awal', $q);
      	$this->db->or_like('email', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nim', $q);
      	$this->db->or_like('nm_mhs', $q);
      	$this->db->or_like('tpt_lhr', $q);
      	$this->db->or_like('tgl_lahir', $q);
      	$this->db->or_like('alamat', $q);
      	$this->db->or_like('nm_prodi', $q);
      	$this->db->or_like('smt_masuk', $q);
      	$this->db->or_like('email', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get("v_mhs_aktif")->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
