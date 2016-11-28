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
    $data['site_title'] = 'SIMALA';
    $data['title_page'] = 'SELAMAT DATANG DI SIMALA || SISTEM INFORMASI MAHASISWA ALMAMATER ADHI GUNA';
    $data['assign_js'] = 'beranda/js/index.js';
    load_view('beranda/beranda', $data);
  }
  public function graphMhs()
  {
    $data_masuk = $this->app_model->get_query("SELECT
            COUNT(IF(m1.smt_masuk='20161',1, NULL)) AS item_2016,
            COUNT(IF(m1.smt_masuk='20151',1, NULL)) AS item_2015,
            COUNT(IF(m1.smt_masuk='20141',1, NULL)) AS item_2014,
            COUNT(IF(m1.smt_masuk='20131' OR m1.smt_masuk='2013',1, NULL)) AS item_2013,
            COUNT(IF(m1.smt_masuk='20121',1, NULL)) AS item_2012,
            COUNT(IF(m1.smt_masuk='20111',1, NULL)) AS item_2011,
            COUNT(IF(m1.smt_masuk='20101',1, NULL)) AS item_2010,
            COUNT(IF(m1.smt_masuk='20091',1, NULL)) AS item_2009,
            COUNT(IF(m1.smt_masuk='20081',1, NULL)) AS item_2008,
            COUNT(IF(m1.smt_masuk='20071',1, NULL)) AS item_2007
            FROM tb_mhs m1")->result();
    $data_keluar = $this->app_model->get_query("SELECT
            COUNT(IF(m1.smt_masuk='20071' AND m1.status_mhs=3,1, NULL)) AS item_2007,
            COUNT(IF(m1.smt_masuk='20081' AND m1.status_mhs=3,1, NULL)) AS item_2008,
            COUNT(IF(m1.smt_masuk='20091' AND m1.status_mhs=3,1, NULL)) AS item_2009,
            COUNT(IF(m1.smt_masuk='20101' AND m1.status_mhs=3,1, NULL)) AS item_2010,
            COUNT(IF(m1.smt_masuk='20111' AND m1.status_mhs=3,1, NULL)) AS item_2011,
            COUNT(IF(m1.smt_masuk='20121' AND m1.status_mhs=3,1, NULL)) AS item_2012,
            COUNT(IF(m1.smt_masuk='20131' AND m1.status_mhs=3,1, NULL)) AS item_2013,
            COUNT(IF(m1.smt_masuk='20141' AND m1.status_mhs=3,1, NULL)) AS item_2014,
            COUNT(IF(m1.smt_masuk='20151' AND m1.status_mhs=3,1, NULL)) AS item_2015,
            COUNT(IF(m1.smt_masuk='20161' AND m1.status_mhs=3,1, NULL)) AS item_2016
            FROM tb_mhs m1")->result();
    $data_angkatan_masuk=array();
    foreach ($data_masuk as $key) {
      array_push($data_angkatan_masuk,$key->item_2016);
      array_push($data_angkatan_masuk,$key->item_2015);
      array_push($data_angkatan_masuk,$key->item_2014);
      array_push($data_angkatan_masuk,$key->item_2013);
      array_push($data_angkatan_masuk,$key->item_2012);
      array_push($data_angkatan_masuk,$key->item_2011);
      array_push($data_angkatan_masuk,$key->item_2010);
      array_push($data_angkatan_masuk,$key->item_2009);
      array_push($data_angkatan_masuk,$key->item_2008);
      array_push($data_angkatan_masuk,$key->item_2007);
    }
    $data_angkatan_keluar=array();
    foreach ($data_keluar as $key) {
      array_push($data_angkatan_keluar, $key->item_2016);
      array_push($data_angkatan_keluar, $key->item_2015);
      array_push($data_angkatan_keluar, $key->item_2014);
      array_push($data_angkatan_keluar, $key->item_2013);
      array_push($data_angkatan_keluar, $key->item_2012);
      array_push($data_angkatan_keluar, $key->item_2011);
      array_push($data_angkatan_keluar, $key->item_2010);
      array_push($data_angkatan_keluar, $key->item_2009);
      array_push($data_angkatan_keluar, $key->item_2008);
      array_push($data_angkatan_keluar, $key->item_2007);
    }
    $data_result = array(
          'data_masuk' => $data_angkatan_masuk,
          'data_keluar'=> $data_angkatan_keluar
    );
    echo json_encode($data_result);
  }
  // public function graphMhsLulus()
  // {
  //   $count_mhs_l_1 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20071");
  //   $count_mhs_l_2 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20081");
  //   $count_mhs_l_3 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20091");
  //   $count_mhs_l_4 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20101");
  //   $count_mhs_l_5 = $this->app_model->total_rows_where("v_mhs_lulus","smt_masuk","20111");
  //   $data=array();
  //
  //   $data_lulus = array($count_mhs_l_1,$count_mhs_l_2,$count_mhs_l_3,$count_mhs_l_4,$count_mhs_l_5);
  //   $a=0;
  //   for ($i=2007; $i < 2011; $i++) {
  //     $data[$i] = $data_lulus[$a];
  //     $a++;
  //   }
  //   $count_mhs_2 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20121");
  //   $count_mhs_3 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","2013");
  //   $count_mhs_4 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20141");
  //   $count_mhs_5 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20151");
  //   $count_mhs_6 = $this->app_model->total_rows_where("v_mhs_aktif","smt_masuk","20161");
  //   $data_angkatan = array(
  //     'ang_2012' => $count_mhs_2,
  //     'ang_2013' => $count_mhs_3,
  //     'ang_2014' => $count_mhs_4,
  //     'ang_2015' => $count_mhs_5,
  //     'ang_2016' => $count_mhs_6,
  //   );
  //   echo json_encode($data);
  // }

  public function contoh_json()
  {
    $data=$this->app_model->get_query("SELECT * FROM v_mhs_aktif limit 0,2")->result();
    echo json_encode($data);
  }
}
