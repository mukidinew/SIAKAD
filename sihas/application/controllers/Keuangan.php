<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'mhs'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('App_model');
          $this->load->model('Data_krs_model');
          $this->load->model('mhs_krs_model','mhs_krs');
        }
    }

    public function index(){
      $data_mhs_krs = $this->App_model->get_query("SELECT * FROM v_bayar_smt WHERE nim='".$this->session->userdata('nim')."'")->result();
      $data = array(
        'data_mhs_keu' => $data_mhs_krs
      );
      $data['site_title'] = 'SIHAS';
      $data['title_page'] = 'Pembayaran';
      $data['assign_js'] = 'keuangan/js/index.js';
      load_view('keuangan/list_keuangan', $data);
    }

    public function keuangan_lain(){
      $data_mhs_krs = $this->App_model->get_query("SELECT * FROM v_bayar_lain WHERE nim='".$this->session->userdata('nim')."'")->result();
      $data = array(
        'data_mhs_keu' => $data_mhs_krs
      );
      $data['site_title'] = 'SIHAS';
      $data['title_page'] = 'Pembayaran';
      $data['assign_js'] = 'keuangan/js/index.js';
      load_view('keuangan/list_keuangan_lain', $data);
    }

  }
