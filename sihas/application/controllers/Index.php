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
  		else if($this->session->userdata('level') != 'mhs'){
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

    $buka_krs = $this->app_model->get_query('SELECT * FROM v_count_down WHERE id_cd_krs="6"');
    $pengumuman = $this->app_model->get_query("SELECT * FROM tb_pengumuman WHERE status='Y' ORDER BY id_pengumuman ASC")->result();

    $namahari = date("l");

    if ($namahari == "Sunday") $namahari = "Minggu";
    else if ($namahari == "Monday") $namahari = "Senin";
    else if ($namahari == "Tuesday") $namahari = "Selasa";
    else if ($namahari == "Wednesday") $namahari = "Rabu";
    else if ($namahari == "Thursday") $namahari = "Kamis";
    else if ($namahari == "Friday") $namahari = "Jumat";
    else if ($namahari == "Saturday") $namahari = "Sabtu";
    $data_mhs_jadwal = $this->app_model->get_query("SELECT * FROM v_data_krs WHERE nim='". $this->session->userdata('nim') ."'")->result();
    $data_jadwal=[];
    foreach ($data_mhs_jadwal as $key) {
      $data_jadwal_cari = $this->app_model->get_query("SELECT * FROM v_jadwal WHERE nm_hari='".$namahari."' AND (kode_mk ='".$key->id_matkul."' AND (nm_kelas='".$key->nm_kelas."' AND id_kurikulum='". $this->session->userdata('id_kurikulum')."'))");
      
      if ($data_jadwal_cari->num_rows()==1) {
        array_push($data_jadwal,$data_jadwal_cari->row());
      }

    }
    $data['data_jadwal'] = $data_jadwal;
    $data['pengumuman']= $buka_krs->row();
    $data['pengumuman_penting']= $pengumuman;
    $data['mhs_aktif'] = $data_angkatan;
    $data['mhs_lulus'] = $data_lulus;
    $data['site_title'] = 'SIPAD';
    $data['title_page'] = 'SELAMAT DATANG DI SIHAS || SISTEM INFORMASI HASIL ANALISA STUDI';
    $data['assign_js'] = 'beranda/js/index.js';
    load_view('beranda/beranda', $data);
  }
}
