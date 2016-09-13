<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_lulus_model extends CI_Model
{

    public $table = 'tb_mhs_lulus';
    public $id = 'id_mhs';
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
        $this->db->like('id_mhs', $q);
	$this->db->or_like('id_jns_keluar', $q);
	$this->db->or_like('tgl_keluar', $q);
	$this->db->or_like('jalur_skripsi', $q);
	$this->db->or_like('judul_skripsi', $q);
	$this->db->or_like('bln_awal_bim', $q);
	$this->db->or_like('bln_akhir_bim', $q);
	$this->db->or_like('sk_yudisium', $q);
	$this->db->or_like('tgl_yudisium', $q);
	$this->db->or_like('IPK', $q);
	$this->db->or_like('no_ijazah', $q);
	$this->db->or_like('ket', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_mhs', $q);
	$this->db->or_like('id_jns_keluar', $q);
	$this->db->or_like('tgl_keluar', $q);
	$this->db->or_like('jalur_skripsi', $q);
	$this->db->or_like('judul_skripsi', $q);
	$this->db->or_like('bln_awal_bim', $q);
	$this->db->or_like('bln_akhir_bim', $q);
	$this->db->or_like('sk_yudisium', $q);
	$this->db->or_like('tgl_yudisium', $q);
	$this->db->or_like('IPK', $q);
	$this->db->or_like('no_ijazah', $q);
	$this->db->or_like('ket', $q);
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

}
