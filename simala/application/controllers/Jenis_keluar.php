<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_keluar extends CI_Controller
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
          $this->load->model('Jenis_keluar_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $jenis_keluar = $this->Jenis_keluar_model->get_all();

        $data = array(
            'jenis_keluar_data' => $jenis_keluar
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Jenis Keluar';
        $data['assign_js'] = 'jenis_keluar/js/index.js';
        load_view('jenis_keluar/tb_jenis_keluar_list', $data);
    }

    public function read($id)
    {
        $row = $this->Jenis_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_jenis_keluar' => $row->id_jenis_keluar,
        		'nm_jenis_keluar' => $row->nm_jenis_keluar,
	          );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Jenis Keluar';
            $data['assign_js'] = 'jenis_keluar/js/index.js';
            load_view('jenis_keluar/tb_jenis_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_keluar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_keluar/create_action'),
      	    'id_jenis_keluar' => set_value('id_jenis_keluar'),
      	    'nm_jenis_keluar' => set_value('nm_jenis_keluar'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Jenis Keluar';
        $data['assign_js'] = 'jenis_keluar/js/index.js';
        load_view('jenis_keluar/tb_jenis_keluar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nm_jenis_keluar' => $this->input->post('nm_jenis_keluar',TRUE),
        	  );

            $this->Jenis_keluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_keluar'));
        }
    }

    public function update($id)
    {
        $row = $this->Jenis_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_keluar/update_action'),
            		'id_jenis_keluar' => set_value('id_jenis_keluar', $row->id_jenis_keluar),
            		'nm_jenis_keluar' => set_value('nm_jenis_keluar', $row->nm_jenis_keluar),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Jenis Keluar';
            $data['assign_js'] = 'jenis_keluar/js/index.js';
            load_view('jenis_keluar/tb_jenis_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_keluar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_keluar', TRUE));
        } else {
            $data = array(
        		'nm_jenis_keluar' => $this->input->post('nm_jenis_keluar',TRUE),
        	  );

            $this->Jenis_keluar_model->update($this->input->post('id_jenis_keluar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_keluar'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jenis_keluar_model->get_by_id($id);

        if ($row) {
            $this->Jenis_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_keluar'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_jenis_keluar', 'nm jenis keluar', 'trim|required');

	$this->form_validation->set_rules('id_jenis_keluar', 'id_jenis_keluar', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
