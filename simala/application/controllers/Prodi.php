<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi extends CI_Controller
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
          $this->load->model('Prodi_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $prodi = $this->Prodi_model->get_all();

        $data = array(
            'prodi_data' => $prodi
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Prodi';
        $data['assign_js'] = 'prodi/js/index.js';
        load_view('prodi/tb_prodi_list', $data);
    }

    public function read($id)
    {
        $row = $this->Prodi_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_prodi' => $row->id_prodi,
          		'nm_prodi' => $row->nm_prodi,
          		'nm_ketua' => $row->nm_ketua,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Prodi';
            $data['assign_js'] = 'prodi/js/index.js';
            load_view('prodi/tb_prodi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodi/create_action'),
      	    'id_prodi' => set_value('id_prodi'),
      	    'nm_prodi' => set_value('nm_prodi'),
      	    'nm_ketua' => set_value('nm_ketua'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Prodi';
        $data['assign_js'] = 'prodi/js/index.js';
        load_view('prodi/tb_prodi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'nm_prodi' => $this->input->post('nm_prodi',TRUE),
          		'nm_ketua' => $this->input->post('nm_ketua',TRUE),
          	);

            $this->Prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prodi'));
        }
    }

    public function update($id)
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodi/update_action'),
            		'id_prodi' => set_value('id_prodi', $row->id_prodi),
            		'nm_prodi' => set_value('nm_prodi', $row->nm_prodi),
            		'nm_ketua' => set_value('nm_ketua', $row->nm_ketua),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Prodi';
            $data['assign_js'] = 'prodi/js/index.js';
            load_view('prodi/tb_prodi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prodi', TRUE));
        } else {
            $data = array(
          		'nm_prodi' => $this->input->post('nm_prodi',TRUE),
          		'nm_ketua' => $this->input->post('nm_ketua',TRUE),
          	);
            $this->Prodi_model->update($this->input->post('id_prodi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prodi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Prodi_model->get_by_id($id);
        if ($row) {
            $this->Prodi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_prodi', 'nm prodi', 'trim|required');
    	$this->form_validation->set_rules('nm_ketua', 'nm ketua', 'trim|required');

    	$this->form_validation->set_rules('id_prodi', 'id_prodi', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
