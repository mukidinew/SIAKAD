<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skripsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'prodi'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Skripsi_model');
          $this->load->model("App_model");
          $this->load->library('form_validation');
        }
    }
    public function index()
    {
        $skripsi = $this->App_model->get_query("SELECT * FROM v_skripsi")->result();

        $data = array(
            'skripsi_data' => $skripsi
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Skripsi Mahasiswa';
        $data['assign_js'] = 'skripsi/js/index.js';
        load_view('skripsi/tb_skripsi_list', $data);
    }

    public function read($id)
    {
        $row = $this->Skripsi_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_skripsi' => $row->id_skripsi,
        		'valid_prodi' => $row->valid_prodi,
        		'tgl_maju' => $row->tgl_maju,
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Skripsi Mahasiswa';
            $data['assign_js'] = 'skripsi/js/index.js';
            load_view('skripsi/tb_skripsi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skripsi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('skripsi/create_action'),
      	    'id_skripsi' => set_value('id_skripsi'),
      	    'valid_prodi' => set_value('valid_prodi'),
      	    'tgl_maju' => set_value('tgl_maju'),
      	);
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Skripsi Mahasiswa';
        $data['assign_js'] = 'skripsi/js/index.js';
        load_view('skripsi/tb_skripsi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'valid_prodi' => $this->input->post('valid_prodi',TRUE),
          		'tgl_maju' => $this->input->post('tgl_maju',TRUE),
        	  );

            $this->Skripsi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('skripsi'));
        }
    }

    public function update($id)
    {
        $row = $this->Skripsi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('skripsi/update_action'),
            		'id_skripsi' => set_value('id_skripsi', $row->id_skripsi),
            		'valid_prodi' => set_value('valid_prodi', $row->valid_prodi),
            		'tgl_maju' => set_value('tgl_maju', $row->tgl_maju),
            );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Skripsi Mahasiswa';
            $data['assign_js'] = 'skripsi/js/index.js';
            load_view('skripsi/tb_skripsi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skripsi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_skripsi', TRUE));
        } else {
            $data = array(
        		'valid_prodi' => $this->input->post('valid_prodi',TRUE),
        		'tgl_maju' => $this->input->post('tgl_maju',TRUE),
        	  );

            $this->Skripsi_model->update($this->input->post('id_skripsi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('skripsi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Skripsi_model->get_by_id($id);

        if ($row) {
            $this->Skripsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('skripsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skripsi'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('valid_prodi', 'valid prodi', 'trim|required');
    	$this->form_validation->set_rules('tgl_maju', 'tgl maju', 'trim|required');

    	$this->form_validation->set_rules('id_skripsi', 'id_skripsi', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_skripsi.xls";
        $judul = "tb_skripsi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Proposal Maju");
	xlsWriteLabel($tablehead, $kolomhead++, "Bebas Pustaka");
	xlsWriteLabel($tablehead, $kolomhead++, "Bebas Smt");
	xlsWriteLabel($tablehead, $kolomhead++, "Bebas Proposal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");

	foreach ($this->Skripsi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_proposal_maju);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bebas_pustaka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bebas_smt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bebas_proposal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
