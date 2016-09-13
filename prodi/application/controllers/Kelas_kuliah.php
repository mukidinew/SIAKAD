<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_kuliah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'prodi'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Kelas_kuliah_model');
          $this->load->model('App_model','app_model');
          $this->load->model('Mata_kuliah_model','mata_kuliah');
          $this->load->model('kurikulum_model','kurikulum');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $kelas_kuliah = $this->Kelas_kuliah_model->get_all_view($this->session->userdata('level_prodi'));
        $kurikulum_data = $this->kurikulum->get_all($this->session->userdata('level_prodi'));
        $data = array(
            'kelas_kuliah_data' => $kelas_kuliah
        );
        $data['kurikulum_data'] = $kurikulum_data;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Kelas Kuliah';
        $data['assign_js'] = 'kelas_kuliah/js/index.js';
        load_view('kelas_kuliah/tb_kelas_kul_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kelas_kuliah_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_kelas' => $row->id_kelas,
        		'nm_kelas' => $row->nm_kelas,
        		'id_matkul' => $row->id_matkul,
        		'id_kurikulum' => $row->id_kurikulum,
        		'id_prodi' => $row->id_prodi,
        	 );
           $data['site_title'] = 'SIPAD';
           $data['title_page'] = 'Olah Data Kelas Kuliah';
           $data['assign_js'] = 'kelas_kuliah/js/index.js';
           load_view('kelas_kuliah/tb_kelas_kul_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_kuliah'));
        }
    }

    public function create()
    {
        // $prodi = $this->prodi->get_all();
        // $mata_kuliah = $this->mata_kuliah->get_all();
        // $kurikulum = $this->kurikulum->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelas_kuliah/create_action'),
      	    'id_kelas' => set_value('id_kelas'),
      	    'nm_kelas' => set_value('nm_kelas'),
      	    'id_matkul' => set_value('id_matkul'),
      	    'id_kurikulum' => set_value('id_kurikulum'),
      	    'id_prodi' => set_value('id_prodi'),
      	);
        // $data['prodi'] = $prodi;
        // $data['mata_kuliah'] = $mata_kuliah;
        // $data['kurikulum'] = $kurikulum;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Kelas Kuliah';
        $data['assign_js'] = 'kelas_kuliah/js/index.js';
        load_view('kelas_kuliah/tb_kelas_kul_form', $data);
    }

    public function getProdi(){
      $prodi='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $prodi = $this->app_model->get_query("SELECT * FROM tb_prodi")->result();
      }
      else {
        $prodi = $this->app_model->get_query("SELECT * FROM tb_prodi WHERE id_prodi='".$this->session->userdata("level_prodi")."' AND nm_prodi LIKE '%".$cari."%'")->result();
      }

      $temps = array();
      foreach ($prodi as $key) {
        $temps[] = array(
          'id_prodi' => $key->id_prodi,
          'nm_prodi' => $key->nm_prodi,
          'nm_ketua' => $key->nm_ketua
        );
      }
      echo json_encode($temps);
    }

    public function getMataKuliah($a){
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $mata_kuliah = $this->app_model->get_query("SELECT * FROM v_mk_kurikulum WHERE id_kurikulum='".$a."'")->result();
      }
      else {
        $mata_kuliah = $this->app_model->get_query("SELECT * FROM v_mk_kurikulum WHERE id_kurikulum='".$a."' AND nm_mk LIKE '%".$cari."%'")->result();
      }
      $temps = array();
      //$mata_kuliah = $this->mata_kuliah->get_all();
      foreach ($mata_kuliah as $key) {
        $temps[] = array(
          'kode_mk' => $key->kode_mk,
          'nm_mk' => $key->nm_mk,
          'nm_kurikulum' => $key->nm_kurikulum,
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
        $kurikulum = $this->app_model->get_query("SELECT * FROM tb_kurikulum where kd_prodi='".$this->session->userdata('level_prodi')."'")->result();
      }
      else {
        $kurikulum = $this->app_model->get_query("SELECT * FROM tb_kurikulum WHERE kd_prodi='".$this->session->userdata('level_prodi')."' AND nm_kurikulum LIKE '%".$cari."%' AND ta LIKE '%".$cari."%' ORDER BY ta DESC")->result();
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


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nm_kelas' => $this->input->post('nm_kelas',TRUE),
        		'id_matkul' => $this->input->post('id_matkul',TRUE),
        		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
        		'id_prodi' => $this->input->post('id_prodi',TRUE),
        	  );

            $this->Kelas_kuliah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelas_kuliah'));
        }
    }

    public function update($id)
    {
        $row = $this->Kelas_kuliah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelas_kuliah/update_action'),
            		'id_kelas' => set_value('id_kelas', $row->id_kelas),
            		'nm_kelas' => set_value('nm_kelas', $row->nm_kelas),
            		'id_matkul' => set_value('id_matkul', $row->id_matkul),
            		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
            		'id_prodi' => set_value('id_prodi', $row->id_prodi),
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Kelas Kuliah';
            $data['assign_js'] = 'kelas_kuliah/js/index.js';
            load_view('kelas_kuliah/tb_kelas_kul_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_kuliah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas', TRUE));
        } else {
            $data = array(
		'nm_kelas' => $this->input->post('nm_kelas',TRUE),
		'id_matkul' => $this->input->post('id_matkul',TRUE),
		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
	    );

            $this->Kelas_kuliah_model->update($this->input->post('id_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelas_kuliah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_kuliah_model->get_by_id($id);

        if ($row) {
            $this->Kelas_kuliah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelas_kuliah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_kuliah'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_kelas', 'nm kelas', 'trim|required');
    	$this->form_validation->set_rules('id_matkul', 'id matkul', 'trim|required');
    	$this->form_validation->set_rules('id_kurikulum', 'id kurikulum', 'trim|required');
    	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');

    	$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_kelas_kul.xls";
        $judul = "v_kelas_kul";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
      	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mata Kuliah");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Mata Kuliah");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Ajaran / Periode");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Program Studi");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama Program Studi");

	      foreach ($this->Kelas_kuliah_model->get_all_view($this->session->userdata('level_prodi')) as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_kelas);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_mk);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_mk);
            xlsWriteNumber($tablebody, $kolombody++, $data->ta);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_prodi);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_prodi);
      	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }
    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kelas_kul.doc");

        $data = array(
            'tb_kelas_kul_data' => $this->Kelas_kuliah_model->get_all(),
            'start' => 0
        );

        load_view('kelas_kuliah/tb_kelas_kul_doc',$data);
    }
    public function get_kelas($id_kur)
    {
      $kelas_kur = $this->Kelas_kuliah_model->get_query("SELECT * FROM v_kelas_kuliah WHERE id_kurikulum='".$id_kur."'")->result();
      $data['kelas_kuliah_data']=$kelas_kur;
      $data['site_title'] = 'SIPAD';
      $data['title_page'] = 'Kelas Mata Kuliah Berdasarkan Kurikulum Dipilih';
      $data['assign_js'] = 'kurikulum/js/index.js';
      load_view('kelas_kuliah/kelas_kurikulum', $data);
    }
}
