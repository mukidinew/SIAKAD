<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_krs_model extends CI_Model
{

    public $table = 'tb_mhs_data_krs';
    public $table_view = 'v_data_krs';
    public $id = 'id_data_krs';
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
        $this->db->like('id_data_krs', $q);
      	$this->db->or_like('id_krs', $q);
      	$this->db->or_like('id_kelas', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_data_krs', $q);
      	$this->db->or_like('id_krs', $q);
      	$this->db->or_like('id_kelas', $q);
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

    function get_query($q)
    {
        return $this->db->query($q);
    }

    function get_limit_query($t,$limit, $start = 0, $q = NULL) {
        $this->db->order_by("", $this->order);
        $this->db->like('id_krs', $q);
      	$this->db->or_like('nim', $q);
        $this->db->or_like('nama', $q);
      	$this->db->or_like('ta', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($t)->result();
    }

    function get_limit_query_kls($t,$limit, $start = 0, $q = NULL) {
        $this->db->order_by("id_kelas", $this->order);
        $this->db->like('id_kelas', $q);
      	$this->db->or_like('kode_mk', $q);
        $this->db->or_like('nm_mk', $q);
        $this->db->or_like('ta', $q);
      	$this->db->or_like('nm_prodi', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($t)->result();
    }
}
