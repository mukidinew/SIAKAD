<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      if (!$this->session->userdata('login')) {
  			redirect('auth');
  		}
  		else if($this->session->userdata('level') != 'dosen'){
  				redirect('auth/logout');
  		}
  		else {
        $this->load->model('App_model','app_model');
      }
  }
  public function index()
  {
    $count_mhs_1 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20111");
    $count_mhs_2 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20121");
    $count_mhs_3 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","2013");
    $count_mhs_4 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20141");
    $count_mhs_5 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20151");
    $data_angkatan = array(
      'ang_2011' => $count_mhs_1,
      'ang_2012' => $count_mhs_2,
      'ang_2013' => $count_mhs_3,
      'ang_2014' => $count_mhs_4,
      'ang_2015' => $count_mhs_5,
    );
    $count_mhs_l_1 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20071");
    $count_mhs_l_2 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20081");
    $count_mhs_l_3 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20091");
    $count_mhs_l_4 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20101");
    $count_mhs_l_5 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20111");
    $data_lulus = array(
      'ang_2007' => $count_mhs_l_1,
      'ang_2008' => $count_mhs_l_2,
      'ang_2009' => $count_mhs_l_3,
      'ang_2010' => $count_mhs_l_4,
      'ang_2011' => $count_mhs_l_5
    );

    $dosen = $this->app_model->get_query("SELECT * FROM tb_dosen WHERE nidn='".$this->session->userdata('nidn')."'")->row();

    $data['mhs_aktif'] = $data_angkatan;
    $data['mhs_lulus'] = $data_lulus;
    $data['site_title'] = 'SIDOSEN';
    $data['title_page'] = 'SELAMAT DATANG <b>'.$dosen->nm_dosen.'</b> || SISTEM INFORMASI DOSEN ADHI GUNA';
    $data['assign_js'] = '';
    load_view('beranda/beranda', $data);
  }
}
