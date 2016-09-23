<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Krs extends CI_Controller
{
    private $template;
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
          $this->load->library('excel');
          $this->template = './template/krs_khs_template.xlsx';
        }
    }

    public function index(){
      $data_mhs_krs = $this->App_model->get_query("SELECT * FROM v_mhs_krs WHERE nim='".$this->session->userdata('nim')."'")->result();
      $data = array(
        'data_mhs_krs' => $data_mhs_krs
      );
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
      $data['assign_js'] = 'krs/js/index.js';
      load_view('krs/list_krs', $data);
    }

    public function proses_krs($nim,$ta,$id_krs){
      $cek_ta = $this->App_model->get_query("SELECT ta,status FROM tb_kurikulum WHERE ta='".$ta."'")->row();
      if ($cek_ta->status == 1) {
        $t=time();
        $status_tutup=false;
        $status_buka_1 = false;
        $status_buka = false;
        $count_down = date("Y-m-d H:i:s",$t); //komen dibuka setelah selesai semua $this->session->userdata('kode_prodi')."'";
        $count_masa_isi = $this->App_model->get_query("SELECT * FROM v_count_down WHERE ta='". $this->session->userdata('ta') ."' AND kd_prodi='". $this->session->userdata('kode_prodi')."'")->row();
        if ($count_down>=$count_masa_isi->waktu_buka && $count_down<=$count_masa_isi->waktu_tutup) {
            $status_tutup=false;
            $status_buka=true;
            $data['title_page'] = 'Pembelian Mata Kuliah Anda Periode '.$this->session->userdata('ta');
        }
        elseif ($count_down<=$count_masa_isi->waktu_buka) {
            $status_tutup=false;
            $status_buka=false;
            $status_buka_1=true;
            $data['title_page'] = 'Pembelian Mata Kuliah Untuk KRS Periode '.$this->session->userdata('ta').' Belum Di Buka';

        }
        elseif ($count_down>=$count_masa_isi->waktu_tutup) {
            $status_tutup=false;
            $status_buka=false;
            $data['title_page'] = 'Pembelian Mata Kuliah Untuk KRS Periode '.$this->session->userdata('ta').' Telah Ditutup'."";
        }
        else {
            $status_tutup=false;
        }

        $beli_mk = $this->App_model->get_query("SELECT * FROM v_data_krs WHERE nim='".$nim."' AND ta='".$ta."'")->result();
        $data['data_krs_data']= $beli_mk;
        $data['id_krs']= $id_krs;
        $data['tgl_tutup'] = $count_masa_isi->waktu_tutup;
        $data['tgl_buka'] = $count_masa_isi->waktu_buka;
        $data['status_tutup'] = $status_tutup;
        $data['status_buka_1'] = $status_buka_1;
        $data['status_buka'] = $status_buka;
        $data['site_title'] = 'SIMALA';
        $data['assign_js'] = 'krs/js/index.js';
        load_view('krs/tb_mhs_data_krs_proses',$data);
      }
      else {
        $data['ta'] = $cek_ta->ta;
        $data['site_title'] = 'SIMALA';
        $data['assign_js'] = 'krs/js/index.js';
        load_view('krs/warning',$data);
      }
    }

    public function getKelasMataKuliah($a){
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $mata_kuliah = $this->App_model->get_query("SELECT * FROM v_kelas_kuliah WHERE id_kurikulum='".$a."'")->result();
      }
      else {
        $mata_kuliah = $this->App_model->get_query("SELECT * FROM v_kelas_kuliah WHERE id_kurikulum='".$a."' AND nm_mk LIKE '%".$cari."%'")->result();
      }
      $temps = array();
      //$mata_kuliah = $this->mata_kuliah->get_all();
      foreach ($mata_kuliah as $key) {
        $temps[] = array(
          'id_kelas' => $key->id_kelas,
          'kode_mk' => $key->kode_mk,
          'nm_mk' => $key->nm_mk,
          'nm_kelas' => $key->nm_kelas,
          'ta' => $key->ta
        );
      }
      echo json_encode($temps);
    }

    public function getKurikulum(){
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $kurikulum = $this->App_model->get_query("SELECT * FROM tb_kurikulum")->result();
      }
      else {
        //$kurikulum = $this->App_model->get_limit_kurikulum('tb_kurikulum',$page,0,$cari);
        $kurikulum = $this->App_model->get_query("SELECT * FROM tb_kurikulum WHERE kd_prodi='".$this->session->userdata('kode_prodi')."' AND nm_kurikulum LIKE '%".$cari."%' AND ta LIKE '%".$cari."%' ORDER BY ta DESC")->result();
      }

      $temps = array();
      foreach ($kurikulum as $key) {
        $temps[] = array(
          'id_kurikulum' => $key->id_kurikulum,
          'nm_kurikulum' => $key->nm_kurikulum,
          'ta' => $key->ta,
          'kd_prodi' => $key->kd_prodi
        );
      }
      echo json_encode($temps);
    }

    public function krs_add()
    {

      $id_krs = $this->input->post('id_krs');
      $id_kelas = $this->input->post('id_kelas');
      if ($id_krs =='' || $id_kelas=='') {
        $this->session->set_flashdata('message', '<span class="label label-danger">Baca Buku Panduan</span>');
        redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$id_krs));
      }
      else {
        $cek_belanja = $this->App_model->get_query("SELECT * FROM tb_mhs_data_krs WHERE id_krs='".$id_krs."'")->row();
        $cek_kelas = $this->App_model->get_query("SELECT * FROM v_kelas_kuliah WHERE id_kelas='".$id_kelas."'")->row();
        // if ($cek_kelas->id_kelas == $id_kelas) {
        //   $this->session->set_flashdata('message', '<span class="label label-danger">Kelas Sama Pilih Kelas Dan Mata Kuliah Berbeda</span>');
        //   redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$id_krs));
        // }
        // else
        if ($cek_kelas->ta != $this->session->userdata('ta')) {
          $this->session->set_flashdata('message', '<span class="label label-danger">Periode kurikulum Salah</span>');
          redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$id_krs));
        }
        else {
          $data = array(
            'id_krs' => $id_krs,
            'id_kelas'=> $id_kelas,
            'status_upload' => "N",
            'status_nilai' => "N"
          );
          $insert = $this->App_model->insertRecord('tb_mhs_data_krs',$data);
          if ($insert==true) {
            $this->session->set_flashdata('message', '<span class="label label-success">Belanja Mata Kuliah Berhasil</span>');
            redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$id_krs));
          }
        }
      }
    }

    public function delete($id,$data)
    {
        $row = $this->Data_krs_model->get_by_id($id);
        if ($row) {
            $this->Data_krs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$data));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('krs/proses_krs/'.$this->session->userdata('nim').'/'.$this->session->userdata('ta').'/'.$data));
        }
    }
}
