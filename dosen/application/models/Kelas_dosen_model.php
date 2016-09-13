<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_dosen_model extends CI_Model
{

    public $table = 'tb_kelas_dosen';
    public $table_view = 'v_kelas_dosen';
    public $id = 'id_kelas_dosen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
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
        $this->db->like('id_kelas_dosen', $q);
	$this->db->or_like('id_data_krs', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('r_t_muka', $q);
	$this->db->or_like('t_muka', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kelas_dosen', $q);
	$this->db->or_like('id_data_krs', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('r_t_muka', $q);
	$this->db->or_like('t_muka', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

    function get_query($q)
    {
        return $this->db->query($q);
    }

    function get_all_view()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_view)->result();
    }

    // get data by id
    function get_by_id_view($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table_view);
    }

    function get_limit_query_dosen($t,$limit, $start = 0, $q = NULL) {
        $this->db->order_by("", $this->order);
        $this->db->like('nidn', $q);
        $this->db->like('nm_dosen', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($t)->result();
    }

    function get_limit_query_kelas($t,$limit, $start = 0, $q = NULL) {
        $this->db->order_by("", $this->order);
        $this->db->like('kode_mk', $q);
        $this->db->like('nm_mk', $q);
        $this->db->like('ta', $q);
        $this->db->like('id_prodi', $q);
        $this->db->like('nm_prodi', $q);
        $this->db->like('nm_kelas', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($t)->result();
    }

    // function get_limit_query_krs($t,$limit, $start = 0, $q = NULL) {
    //     $this->db->order_by("", $this->order);
    //     $this->db->like('nim', $q);
    //     $this->db->like('nm_mhs', $q);
    //     $this->db->like('ta', $q);
    //     $this->db->like('id_matkul', $q);
    //     $this->db->like('nm_prodi', $q);
    //     $this->db->limit($limit, $start);
    //     return $this->db->get($t)->result();
    // }
}
