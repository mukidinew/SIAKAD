<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_wali extends CI_Controller
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
        else{
          $this->load->model('Dosen_wali_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $dosen_wali = $this->App_model->get_query("SELECT * FROM v_dosen_wali")->result();

        $data = array(
            'dosen_wali_data' => $dosen_wali
        );
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Dosen Wali';
    		$data['assign_js'] = 'dosen_wali/js/index.js';
        load_view('dosen_wali/tb_dosen_wali_list', $data);
    }

    public function read($id)
    {
        $row = $this->Dosen_wali_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_dosen_wali' => $row->id_dosen_wali,
        		'id_dosen' => $row->id_dosen,
        		'tanggal_diangkat' => $row->tanggal_diangkat,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Dosen Wali';
            $data['assign_js'] = 'dosen_wali/js/index.js';
            load_view('dosen_wali/tb_dosen_wali_read', $data);
        }
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_wali'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen_wali/create_action'),
      	    'id_dosen_wali' => set_value('id_dosen_wali'),
      	    'id_dosen' => set_value('id_dosen'),
      	    'tanggal_diangkat' => set_value('tanggal_diangkat'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Dosen Wali';
        $data['assign_js'] = 'dosen_wali/js/index.js';
        load_view('dosen_wali/tb_dosen_wali_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_dosen' => $this->input->post('id_dosen',TRUE),
        		'tanggal_diangkat' => $this->input->post('tanggal_diangkat',TRUE),
        	  );

            $this->Dosen_wali_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen_wali'));
        }
    }

    public function update($id)
    {
        $row = $this->Dosen_wali_model->get_by_id($id);

        if ($row) {
            $data = array(
              'button' => 'Update',
              'action' => site_url('dosen_wali/update_action'),
          		'id_dosen_wali' => set_value('id_dosen_wali', $row->id_dosen_wali),
          		'id_dosen' => set_value('id_dosen', $row->id_dosen),
          		'tanggal_diangkat' => set_value('tanggal_diangkat', $row->tanggal_diangkat),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Dosen Wali';
            $data['assign_js'] = 'dosen_wali/js/index.js';
            load_view('dosen_wali/tb_dosen_wali_form', $data);
        }
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_wali'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen_wali', TRUE));
        } else {
            $data = array(
          		'id_dosen' => $this->input->post('id_dosen',TRUE),
          		'tanggal_diangkat' => $this->input->post('tanggal_diangkat',TRUE),
          	);
            $this->Dosen_wali_model->update($this->input->post('id_dosen_wali', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen_wali'));
        }
    }

    public function delete($id)
    {
        $row = $this->Dosen_wali_model->get_by_id($id);

        if ($row) {
            $this->Dosen_wali_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen_wali'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_wali'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('tanggal_diangkat', 'tanggal diangkat', 'trim|required');

	$this->form_validation->set_rules('id_dosen_wali', 'id_dosen_wali', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
