<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Countdown_krs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Countdown_krs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $countdown_krs = $this->Countdown_krs_model->get_all();

        $data = array(
            'countdown_krs_data' => $countdown_krs
        );

        $this->load->view('countdown_krs/tb_cd_krs_list', $data);
    }

    public function read($id)
    {
        $row = $this->Countdown_krs_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cd_krs' => $row->id_cd_krs,
		'waktu_buka' => $row->waktu_buka,
		'waktu_tutup' => $row->waktu_tutup,
		'id_kurikulum' => $row->id_kurikulum,
	    );
            $this->load->view('countdown_krs/tb_cd_krs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_krs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('countdown_krs/create_action'),
	    'id_cd_krs' => set_value('id_cd_krs'),
	    'waktu_buka' => set_value('waktu_buka'),
	    'waktu_tutup' => set_value('waktu_tutup'),
	    'id_kurikulum' => set_value('id_kurikulum'),
	);
        $this->load->view('countdown_krs/tb_cd_krs_form', $data);
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

            $this->Countdown_krs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('countdown_krs'));
        }
    }

    public function update($id)
    {
        $row = $this->Countdown_krs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('countdown_krs/update_action'),
		'id_cd_krs' => set_value('id_cd_krs', $row->id_cd_krs),
		'waktu_buka' => set_value('waktu_buka', $row->waktu_buka),
		'waktu_tutup' => set_value('waktu_tutup', $row->waktu_tutup),
		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
	    );
            $this->load->view('countdown_krs/tb_cd_krs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_krs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cd_krs', TRUE));
        } else {
            $data = array(
		'waktu_buka' => $this->input->post('waktu_buka',TRUE),
		'waktu_tutup' => $this->input->post('waktu_tutup',TRUE),
		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
	    );

            $this->Countdown_krs_model->update($this->input->post('id_cd_krs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('countdown_krs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Countdown_krs_model->get_by_id($id);

        if ($row) {
            $this->Countdown_krs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('countdown_krs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('countdown_krs'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('waktu_buka', 'waktu buka', 'trim|required');
	$this->form_validation->set_rules('waktu_tutup', 'waktu tutup', 'trim|required');
	$this->form_validation->set_rules('id_kurikulum', 'id kurikulum', 'trim|required');

	$this->form_validation->set_rules('id_cd_krs', 'id_cd_krs', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
