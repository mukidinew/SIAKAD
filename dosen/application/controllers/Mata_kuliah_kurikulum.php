<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mata_kuliah_kurikulum extends CI_Controller
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
          $this->load->model('Mata_kuliah_kurikulum_model');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $mata_kuliah_kurikulum = $this->app_model->get_all_view_mk_kur();

        $data = array(
            'mata_kuliah_kurikulum_data' => $mata_kuliah_kurikulum
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mata Kuliah Perkurikulum | Periode';
        $data['assign_js'] = 'mata_kuliah_kurikulum/js/index.js';
        load_view('mata_kuliah_kurikulum/tb_mk_kurikulum_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mata_kuliah_kurikulum_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_kur_mk' => $row->id_kur_mk,
        		'kode_mk' => $row->kode_mk,
        		'id_kurikulum' => $row->id_kurikulum,
      	    );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mata Kuliah Perkurikulum | Periode';
            $data['assign_js'] = 'mata_kuliah_kurikulum/js/index.js';
            load_view('mata_kuliah_kurikulum/tb_mk_kurikulum_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah_kurikulum'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mata_kuliah_kurikulum/create_action'),
      	    'id_kur_mk' => set_value('id_kur_mk'),
      	    'kode_mk' => set_value('kode_mk'),
      	    'id_kurikulum' => set_value('id_kurikulum'),
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mata Kuliah Perkurikulum | Periode';
        $data['assign_js'] = 'mata_kuliah_kurikulum/js/index.js';
        load_view('mata_kuliah_kurikulum/tb_mk_kurikulum_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
	    );

            $this->Mata_kuliah_kurikulum_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mata_kuliah_kurikulum'));
        }
    }

    public function update($id)
    {
        $row = $this->Mata_kuliah_kurikulum_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mata_kuliah_kurikulum/update_action'),
		'id_kur_mk' => set_value('id_kur_mk', $row->id_kur_mk),
		'kode_mk' => set_value('kode_mk', $row->kode_mk),
		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
	    );
            load_view('mata_kuliah_kurikulum/tb_mk_kurikulum_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah_kurikulum'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kur_mk', TRUE));
        } else {
            $data = array(
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
	    );

            $this->Mata_kuliah_kurikulum_model->update($this->input->post('id_kur_mk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mata_kuliah_kurikulum'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mata_kuliah_kurikulum_model->get_by_id($id);

        if ($row) {
            $this->Mata_kuliah_kurikulum_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mata_kuliah_kurikulum'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah_kurikulum'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');
	$this->form_validation->set_rules('id_kurikulum', 'id kurikulum', 'trim|required');

	$this->form_validation->set_rules('id_kur_mk', 'id_kur_mk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mk_kurikulum.xls";
        $judul = "tb_mk_kurikulum";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mk");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kurikulum");

	foreach ($this->Mata_kuliah_kurikulum_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_mk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kurikulum);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mk_kurikulum.doc");

        $data = array(
            'tb_mk_kurikulum_data' => $this->Mata_kuliah_kurikulum_model->get_all(),
            'start' => 0
        );

        load_view('mata_kuliah_kurikulum/tb_mk_kurikulum_doc',$data);
    }

    public function get_mata_kuliah()
    {
      $mk='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $mk = $this->app_model->get_query("SELECT * FROM v_mk_kurikulum")->result();
      }
      else {
        $mk = $this->app_model->get_limit_mk_kurikulum('v_mk_kurikulum',$page,0,$cari);
      }
      $temps = array();
      foreach ($mk as $key) {
        $temps[] = array(
          'id_kur_mk' => $key->id_kur_mk,
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
        $kurikulum = $this->app_model->get_query("SELECT * FROM tb_kurikulum")->result();
      }
      else {
        $kurikulum = $this->app_model->get_limit_kurikulum('tb_kurikulum',$page,0,$cari);
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
}
