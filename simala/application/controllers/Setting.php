<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller
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
          $this->load->model('Setting_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $setting = $this->Setting_model->get_all();

        $data = array(
            'setting_data' => $setting
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Pengaturan Dasar';
        $data['assign_js'] = 'setting/js/index.js';
        load_view('setting/tb_setting_list', $data);
    }

    public function read($id)
    {
        $row = $this->Setting_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_sett' => $row->id_sett,
          		'kode_feed' => base64_decode($row->kode_feed),
          		'pass_feed' => base64_decode($row->pass_feed),
          		'role' => $row->role,
          		'url_ws' => $row->url_ws,
          		'mode' => $row->mode,
          		'link' => $row->link
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Pengaturan Dasar';
            $data['assign_js'] = 'setting/js/index.js';
            load_view('setting/tb_setting_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function create()
    {
        $data = array(
          'button' => 'Create',
          'action' => site_url('setting/create_action'),
    	    'id_sett' => set_value('id_sett'),
    	    'kode_feed' => set_value('kode_feed'),
    	    'pass_feed' => set_value('pass_feed'),
    	    'role' => set_value('role'),
    	    'url_ws' => set_value('url_ws'),
    	    'mode' => set_value('mode'),
    	    'link' => set_value('link')
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Pengaturan Dasar';
        $data['assign_js'] = 'setting/js/index.js';
        load_view('setting/tb_setting_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'kode_feed' => base64_encode($this->input->post('kode_feed',TRUE)),
          		'pass_feed' => base64_encode($this->input->post('pass_feed',TRUE)),
          		'role' => $this->input->post('role',TRUE),
          		'url_ws' => $this->input->post('url_ws',TRUE),
          		'mode' => $this->input->post('mode',TRUE),
          		'link' => $this->input->post('link',TRUE)
        	  );
            $this->Setting_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setting'));
        }
    }

    public function update($id)
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $data = array(
              'button' => 'Update',
              'action' => site_url('setting/update_action'),
          		'id_sett' => set_value('id_sett', $row->id_sett),
          		'kode_feed' => base64_decode(set_value('kode_feed', $row->kode_feed)),
          		'pass_feed' => base64_decode(set_value('pass_feed', $row->pass_feed)),
          		'role' => set_value('role', $row->role),
          		'url_ws' => set_value('url_ws', $row->url_ws),
          		'mode' => set_value('mode', $row->mode),
          		'link' => set_value('link', $row->link)
          	);
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Pengaturan Dasar';
            $data['assign_js'] = 'setting/js/index.js';
            load_view('setting/tb_setting_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sett', TRUE));
        } else {
            $data = array(
            'kode_feed' => base64_decode($this->input->post('kode_feed',TRUE)),
            'pass_feed' => base64_decode($this->input->post('pass_feed',TRUE)),
            'role' => $this->input->post('role',TRUE),
            'url_ws' => $this->input->post('url_ws',TRUE),
            'mode' => $this->input->post('mode',TRUE),
            'link' => $this->input->post('link',TRUE),
            );

            $this->Setting_model->update($this->input->post('id_sett', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setting'));
        }
    }

    public function delete($id)
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $this->Setting_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setting'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('kode_feed', 'kode feed', 'trim|required');
      	$this->form_validation->set_rules('pass_feed', 'pass feed', 'trim|required');
      	$this->form_validation->set_rules('role', 'role', 'trim|required');
      	$this->form_validation->set_rules('url_ws', 'url ws', 'trim|required');
      	$this->form_validation->set_rules('mode', 'mode', 'trim|required');
      	$this->form_validation->set_rules('link', 'link', 'trim|required');
      	$this->form_validation->set_rules('id_sett', 'id_sett', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
