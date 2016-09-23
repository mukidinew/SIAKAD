<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Khs extends CI_Controller
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
      $data_mhs_krs = $this->App_model->get_query("SELECT * FROM v_mhs_krs WHERE nim='".$this->session->userdata('nim')."'")->result();
      $data = array(
        'data_mhs_krs' => $data_mhs_krs
      );
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Olah Kartu Hasil Studi Mahasiswa';
      $data['assign_js'] = 'khs/js/index.js';
      load_view('khs/list_krs', $data);
    }

    public function proses_khs($nim,$ta,$id_krs){
      $t=time();
      $status_tutup=false;
      $status_buka_1 = false;
      $status_buka = false;
      $count_down = date("Y-m-d H:i:s",$t); //komen dibuka setelah selesai semua $this->session->userdata('kode_prodi')."'";
      $count_masa_isi = $this->App_model->get_query("SELECT * FROM v_count_down_khs WHERE ta='". $this->session->userdata('ta') ."' AND kd_prodi='". $this->session->userdata('kode_prodi')."'")->row();
      if ($count_down>=$count_masa_isi->waktu_buka && $count_down<=$count_masa_isi->waktu_tutup) {
          $status_tutup=false;
          $status_buka=true;
          $data['title_page'] = 'Pembelian Mata Kuliah Anda Periode '.$this->session->userdata('ta');
      }
      elseif ($count_down<=$count_masa_isi->waktu_buka) {
          $status_tutup=false;
          $status_buka=false;
          $status_buka_1=true;
          $data['title_page'] = 'KHS Periode '.$this->session->userdata('ta').' Belum Di Buka';

      }
      elseif ($count_down>=$count_masa_isi->waktu_tutup) {
          $status_tutup=false;
          $status_buka=false;
          $data['title_page'] = 'KHS Periode '.$this->session->userdata('ta').' Telah Ditutup'."";
      }
      else {
          $status_tutup=false;
      }

      $beli_mk = $this->App_model->get_query("SELECT * FROM v_nilai WHERE nim='".$nim."' AND ta='".$ta."'")->result();
      $data['data_krs_data']= $beli_mk;
      $data['id_krs']= $id_krs;
      $data['tgl_tutup'] = $count_masa_isi->waktu_tutup;
      $data['tgl_buka'] = $count_masa_isi->waktu_buka;
      $data['status_tutup'] = $status_tutup;
      $data['status_buka_1'] = $status_buka_1;
      $data['status_buka'] = $status_buka;
      $data['site_title'] = 'SIMALA';
      $data['assign_js'] = 'khs/js/index.js';
      load_view('khs/tb_mhs_data_krs_proses',$data);
    }

    public function transkrip_nilai()
    {
      $this->load->library('fpdf_gen');
      $nim = $this->session->userdata('nim');
      $data_nilai = $this->App_model->get_query("SELECT * FROM v_nilai WHERE nim='". $this->session->userdata('nim') ."' AND ta='".$this->session->userdata('ta')."'")->result();
      $data['nilai_data'] = $data_nilai;

      $data_mhs = $this->App_model->get_view_by_id('v_mhs_aktif','nim',$nim);
      $data['nim'] = $data_mhs->nim;
      $data['nm_mhs'] =$data_mhs->nm_mhs;
      $data['tpt_lhr'] =$data_mhs->tpt_lhr;
      $data['nm_prodi'] =$data_mhs->nm_prodi;
      //$data['tgl_lhr'] =$data_mhs->tgl_lhr;

      $data['assign_css'] = 'nilai/css/app.css';
      $data['assign_js'] = 'nilai/js/index.js';
      load_pdf('nilai/lap_transkrip_nilai', $data);

      $html = $this->output->get_output();
      $this->dompdf->set_paper('A4', 'potrait');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("khs".$data_mhs->nim.".pdf",array('Attachment'=>0));
    }
}
