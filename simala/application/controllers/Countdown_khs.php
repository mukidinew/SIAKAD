<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Countdown_khs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Countdown_khs_model');
        $this->load->library('form_validation');
        $this->load->model("App_model","app_model");
    }

    public function index()
    {
        $countdown_khs = $this->app_model->get_query("SELECT * FROM v_count_down_khs")->result();

        $data = array(
            'countdown_khs_data' => $countdown_khs
        );
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Setting Pengambilan KHS';
        $data['assign_js'] = 'countdown_khs/js/index.js';
        load_view('countdown_khs/tb_cd_khs_list', $data);
    }

    public function read($id)
    {
        $row = $this->Countdown_khs_model->get_by_id($id);
        if ($row) {
            $data = array(
            		'id_cd_khs' => $row->id_cd_khs,
            		'waktu_buka' => $row->waktu_buka,
            		'waktu_tutup' => $row->waktu_tutup,
            		'id_kurikulum' => $row->id_kurikulum,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Setting Pengambilan KHS';
            $data['assign_js'] = 'countdown_khs/js/index.js';
            load_view('countdown_khs/tb_cd_khs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_khs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('countdown_khs/create_action'),
      	    'id_cd_khs' => set_value('id_cd_khs'),
      	    'waktu_buka' => set_value('waktu_buka'),
      	    'waktu_tutup' => set_value('waktu_tutup'),
      	    'id_kurikulum' => set_value('id_kurikulum'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Setting Pengambilan KHS';
        $data['assign_js'] = 'countdown_khs/js/index.js';
        load_view('countdown_khs/tb_cd_khs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'waktu_buka' => $this->input->post('waktu_buka',TRUE),
          		'waktu_tutup' => $this->input->post('waktu_tutup',TRUE),
          		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
	          );

            $this->Countdown_khs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('countdown_khs'));
        }
    }

    public function update($id)
    {
        $row = $this->Countdown_khs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('countdown_khs/update_action'),
            		'id_cd_khs' => set_value('id_cd_khs', $row->id_cd_khs),
            		'waktu_buka' => set_value('waktu_buka', $row->waktu_buka),
            		'waktu_tutup' => set_value('waktu_tutup', $row->waktu_tutup),
            		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
      	    );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Setting Pengambilan KHS';
            $data['assign_js'] = 'countdown_khs/js/index.js';
            load_view('countdown_khs/tb_cd_khs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_khs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cd_khs', TRUE));
        } else {
            $data = array(
          		'waktu_buka' => $this->input->post('waktu_buka',TRUE),
          		'waktu_tutup' => $this->input->post('waktu_tutup',TRUE),
          		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
        	  );

            $this->Countdown_khs_model->update($this->input->post('id_cd_khs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('countdown_khs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Countdown_khs_model->get_by_id($id);

        if ($row) {
            $this->Countdown_khs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('countdown_khs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_khs'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('waktu_buka', 'waktu buka', 'trim|required');
    	$this->form_validation->set_rules('waktu_tutup', 'waktu tutup', 'trim|required');
    	$this->form_validation->set_rules('id_kurikulum', 'id kurikulum', 'trim|required');

    	$this->form_validation->set_rules('id_cd_khs', 'id_cd_khs', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
