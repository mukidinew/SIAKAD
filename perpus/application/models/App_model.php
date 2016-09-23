<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model
{
  public $order = 'DESC';

  function __construct()
  {
      parent::__construct();
  }

  function cek_user($data) {
			$query = $this->db->get_where('admin', $data);
			return $query;
	}

  function update($table,$fiel,$id, $data)
  {
      $this->db->set($data);
      $this->db->where($fiel, $id);
      $this->db->update($table, $data);
      return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function insertRecord($table, $data){
      $this->db->insert($table,$data);
      return ($this->db->affected_rows() != 1) ? false : true;
  }

  function get_query($q)
  {
      return $this->db->query($q);
  }

  function count_table($t) {
      $this->db->from($t);
      return $this->db->count_all_results();
  }

  function get_all_view($t)
  {
      $this->db->order_by("", $this->order);
      return $this->db->get($t)->result();
  }

  function get_view_by_id($table,$field,$sort)
  {
      $this->db->where($field, $sort);
      return $this->db->get($table)->row();
  }

  function get_view_by_id_res($table,$field,$sort)
  {
      $this->db->where($field, $sort);
      return $this->db->get($table)->result();
  }
}
