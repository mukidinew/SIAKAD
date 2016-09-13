<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status_mhs extends CI_Controller
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
          $this->load->model('Status_mhs_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $status_mhs = $this->Status_mhs_model->get_all();

        $data = array(
            'status_mhs_data' => $status_mhs
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Data Master Status Mahasiswa';
        $data['assign_js'] = 'status_mhs/js/index.js';
        load_view('status_mhs/tb_status_mhs_list', $data);
    }

    public function read($id)
    {
        $row = $this->Status_mhs_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_status' => $row->id_status,
          		'nm_status' => $row->nm_status,
          		'ket' => $row->ket,
          	);
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Data Master Status Mahasiswa';
            $data['assign_js'] = 'status_mhs/js/index.js';
            load_view('status_mhs/tb_status_mhs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_mhs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status_mhs/create_action'),
      	    'id_status' => set_value('id_status'),
      	    'nm_status' => set_value('nm_status'),
      	    'ket' => set_value('ket'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Data Master Status Mahasiswa';
        $data['assign_js'] = 'status_mhs/js/index.js';
        load_view('status_mhs/tb_status_mhs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nm_status' => $this->input->post('nm_status',TRUE),
        		'ket' => $this->input->post('ket',TRUE),
            );
            $this->Status_mhs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status_mhs'));
        }
    }

    public function update($id)
    {
        $row = $this->Status_mhs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status_mhs/update_action'),
            		'id_status' => set_value('id_status', $row->id_status),
            		'nm_status' => set_value('nm_status', $row->nm_status),
            		'ket' => set_value('ket', $row->ket),
            	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Data Master Status Mahasiswa';
            $data['assign_js'] = 'status_mhs/js/index.js';
            load_view('status_mhs/tb_status_mhs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_mhs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status', TRUE));
        } else {
            $data = array(
        		'nm_status' => $this->input->post('nm_status',TRUE),
        		'ket' => $this->input->post('ket',TRUE),
        	    );
            $this->Status_mhs_model->update($this->input->post('id_status', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status_mhs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Status_mhs_model->get_by_id($id);

        if ($row) {
            $this->Status_mhs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status_mhs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_mhs'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_status', 'nm status', 'trim|required');
    	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

    	$this->form_validation->set_rules('id_status', 'id_status', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
