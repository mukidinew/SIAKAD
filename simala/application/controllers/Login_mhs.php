<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_mhs extends CI_Controller
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
          $this->load->model('Login_mhs_model');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $login_mhs = $this->app_model->get_all_view('z_login_mhs');

        $data = array(
            'login_mhs_data' => $login_mhs
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Pengguna Basis Mahasiswa';
        $data['assign_js'] = 'login_mhs/js/index.js';
        load_view('login_mhs/login_mhs_list', $data);
    }

    public function read($id)
    {
        $row = $this->Login_mhs_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_user' => $row->id_user,
        		'username' => base64_decode($row->username),
        		'password' => base64_decode($row->password),
        		'id_mhs' => $row->id_mhs,
        		'level' => $row->level,
        		'status' => $row->status,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Pengguna Basis Mahasiswa';
            $data['assign_js'] = 'login_mhs/js/index.js';
            load_view('login_mhs/login_mhs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_mhs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('login_mhs/create_action'),
      	    'id_user' => set_value('id_user'),
      	    'username' => set_value('username'),
      	    'password' => set_value('password'),
      	    'id_mhs' => set_value('id_mhs'),
      	    'level' => set_value('level'),
      	    'status' => set_value('status'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Pengguna Basis Mahasiswa';
        $data['assign_js'] = 'login_mhs/js/index.js';
        load_view('login_mhs/login_mhs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'username' => base64_encode($this->input->post('username',TRUE)),
        		'password' => base64_encode($this->input->post('password',TRUE)),
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'level' => $this->input->post('level',TRUE),
        		'status' => $this->input->post('status',TRUE),
        	  );

            $this->Login_mhs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login_mhs'));
        }
    }

    public function update($id)
    {
        $row = $this->Login_mhs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('login_mhs/update_action'),
            		'id_user' => set_value('id_user', $row->id_user),
            		'username' => set_value('username', $row->username),
            		'password' => set_value('password', $row->password),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            		'level' => set_value('level', $row->level),
            		'status' => set_value('status', $row->status),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Pengguna Basis Mahasiswa';
            $data['assign_js'] = 'login_mhs/js/index.js';
            load_view('login_mhs/login_mhs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_mhs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
        		'username' => base64_encode($this->input->post('username',TRUE)),
        		'password' => base64_encode($this->input->post('password',TRUE)),
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'level' => $this->input->post('level',TRUE),
        		'status' => $this->input->post('status',TRUE),
        	  );

            $this->Login_mhs_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('login_mhs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Login_mhs_model->get_by_id($id);

        if ($row) {
            $this->Login_mhs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('login_mhs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('login_mhs'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
