<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs_wali extends CI_Controller
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
          $this->load->model('Mhs_wali_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $mhs_wali = $this->Mhs_wali_model->get_all();

        $data = array(
            'mhs_wali_data' => $mhs_wali
        );
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Perwalian Mahasiswa';
    		$data['assign_js'] = 'dosen_wali/js/index.js';
        load_view('mhs_wali/tb_mhs_wali_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mhs_wali_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_mhs_wali' => $row->id_mhs_wali,
          		'id_dosen_wali' => $row->id_dosen_wali,
          		'id_mhs' => $row->id_mhs,
          	);
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Perwalian Mahasiswa';
            $data['assign_js'] = 'dosen_wali/js/index.js';
            load_view('mhs_wali/tb_mhs_wali_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_wali'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mhs_wali/create_action'),
      	    'id_mhs_wali' => set_value('id_mhs_wali'),
      	    'id_dosen_wali' => set_value('id_dosen_wali'),
      	    'id_mhs' => set_value('id_mhs'),
      	);
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Perwalian Mahasiswa';
    		$data['assign_js'] = 'dosen_wali/js/index.js';
        load_view('mhs_wali/tb_mhs_wali_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'id_dosen_wali' => $this->input->post('id_dosen_wali',TRUE),
          		'id_mhs' => $this->input->post('id_mhs',TRUE),
          	);

            $this->Mhs_wali_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mhs_wali'));
        }
    }

    public function update($id)
    {
        $row = $this->Mhs_wali_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mhs_wali/update_action'),
            		'id_mhs_wali' => set_value('id_mhs_wali', $row->id_mhs_wali),
            		'id_dosen_wali' => set_value('id_dosen_wali', $row->id_dosen_wali),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            );
            $data['site_title'] = 'SIMALA';
        		$data['title_page'] = 'Olah Data Perwalian Mahasiswa';
        		$data['assign_js'] = 'dosen_wali/js/index.js';
            load_view('mhs_wali/tb_mhs_wali_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_wali'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mhs_wali', TRUE));
        } else {
            $data = array(
		'id_dosen_wali' => $this->input->post('id_dosen_wali',TRUE),
		'id_mhs' => $this->input->post('id_mhs',TRUE),
	    );

            $this->Mhs_wali_model->update($this->input->post('id_mhs_wali', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mhs_wali'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mhs_wali_model->get_by_id($id);

        if ($row) {
            $this->Mhs_wali_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mhs_wali'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_wali'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_dosen_wali', 'id dosen wali', 'trim|required');
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');

	$this->form_validation->set_rules('id_mhs_wali', 'id_mhs_wali', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
