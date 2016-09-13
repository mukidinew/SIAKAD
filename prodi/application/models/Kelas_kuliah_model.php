<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_kuliah_model extends CI_Model
{

    public $table = 'tb_kelas_kul';
    public $id = 'id_kelas';
    public $order = 'DESC';
    public $where_id_prodi = 'id_prodi';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($where_prodi)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where($this->where_id_prodi,$where_prodi);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL,$where_prodi) {
        $this->db->like('id_kelas', $q);
      	$this->db->or_like('nm_kelas', $q);
      	$this->db->or_like('id_matkul', $q);
      	$this->db->or_like('id_kurikulum', $q);
      	$this->db->or_like('id_prodi', $q);
      	$this->db->from($this->table);
        $this->db->where($this->where_id_prodi,$where_prodi);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL,$where_prodi) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kelas', $q);
      	$this->db->or_like('nm_kelas', $q);
      	$this->db->or_like('id_matkul', $q);
      	$this->db->or_like('id_kurikulum', $q);
      	$this->db->or_like('id_prodi', $q);
      	$this->db->limit($limit, $start);
        $this->db->where($this->where_id_prodi,$where_prodi);
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

    function get_all_view($where_prodi)
    {
        $this->db->where($this->where_id_prodi,$where_prodi);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('v_kelas_kuliah')->result();
    }

    // get data by id
    function get_by_id_view($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('v_kelas_kuliah')->row();
    }

    function get_query($q)
    {
        return $this->db->query($q);
    }
}
