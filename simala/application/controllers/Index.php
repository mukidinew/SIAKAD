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
  		else if($this->session->userdata('level') != 'baak'){
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

    $count_mhs = $this->app_model->total_rows("v_sync_mhs");
    $count_mhs_lulus = $this->app_model->total_rows("v_sync_mhs_lulus");
    $count_mk_kur = $this->app_model->total_rows("v_sync_mk_kurikulum");
    $count_nilai = $this->app_model->total_rows("v_sync_nilai");
    $count_kelas_kuliah = $this->app_model->total_rows("v_sync_kelas_kuliah");
    $count_kelas_dosen = $this->app_model->total_rows("v_sync_kelas_dosen");
    $count_data_krs = $this->app_model->total_rows("v_sync_data_krs");
    $count_data_krs = $this->app_model->total_rows("v_sync_data_krs");
    $count_kurikulum = $this->app_model->total_rows_where("tb_kurikulum","status_upload","N");
    $count_mata_kuliah = $this->app_model->total_rows_where("tb_mata_kuliah","status_upload","N");
    

    $data['count_mhs'] =$count_mhs ;
    $data['count_kurikulum'] =$count_kurikulum ;
    $data['count_mata_kuliah'] =$count_mata_kuliah ;
    $data['count_mhs_lulus'] =$count_mhs_lulus;
    $data['count_mk_kur'] =$count_mk_kur;
    $data['count_nilai'] = $count_nilai;
    $data['count_kelas_kuliah'] = $count_kelas_kuliah;
    $data['count_kelas_dosen'] = $count_kelas_dosen;
    $data['count_data_krs'] = $count_data_krs;

    $data['mhs_aktif'] = $data_angkatan;
    $data['mhs_lulus'] = $data_lulus;
    $data['site_title'] = 'SIMALA';
    $data['title_page'] = 'SELAMAT DATANG DI SIMALA || SISTEM INFORMASI MAHASISWA ALMAMATER ADHI GUNA';
    $data['assign_js'] = '';
    load_view('beranda/beranda', $data);
  }
}
