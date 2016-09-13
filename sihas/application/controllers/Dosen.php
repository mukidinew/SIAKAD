<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'mhs'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Dosen_model');
        }
    }

    public function index()
    {
        $dosen = $this->Dosen_model->get_all();
        $data = array(
            'dosen_data' => $dosen
        );
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Dosen';
    		$data['assign_js'] = 'dosen/js/index.js';
        load_view('dosen/tb_dosen_list', $data);
    }

    public function read($id)
    {
        $row = $this->Dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'nidn' => $row->nidn,
        		'nm_dosen' => $row->nm_dosen,
        		'program_studi' => $row->program_studi);
            $data['site_title'] = 'SIMALA';
        		$data['title_page'] = 'Olah Data Dosen';
        		$data['assign_js'] = 'dosen/js/index.js';
            load_view('dosen/tb_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
}
