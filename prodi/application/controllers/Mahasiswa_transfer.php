<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_transfer extends CI_Controller
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
          $this->load->model('Mahasiswa_transfer_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $mahasiswa_transfer = $this->App_model->get_query("SELECT * FROM v_mhs_transfer")->result();

        $data = array(
            'mahasiswa_transfer_data' => $mahasiswa_transfer
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mahasiswa Transfer';
        $data['assign_js'] = 'mahasiswa_transfer/js/index.js';
        load_view('mahasiswa_transfer/tb_mhs_transfer_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mahasiswa_transfer_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_trans' => $row->id_trans,
        		'id_mhs' => $row->id_mhs,
        		'sks_diakui' => $row->sks_diakui,
        		'pt_asal' => $row->pt_asal,
        		'prodi_asal' => $row->prodi_asal,
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mahasiswa Transfer';
            $data['assign_js'] = 'mahasiswa_transfer/js/index.js';
            load_view('mahasiswa_transfer/tb_mhs_transfer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_transfer'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa_transfer/create_action'),
      	    'id_trans' => set_value('id_trans'),
      	    'id_mhs' => set_value('id_mhs'),
      	    'sks_diakui' => set_value('sks_diakui'),
      	    'pt_asal' => set_value('pt_asal'),
      	    'prodi_asal' => set_value('prodi_asal'),
      	);
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mahasiswa Transfer';
        $data['assign_js'] = 'mahasiswa_transfer/js/index.js';
        load_view('mahasiswa_transfer/tb_mhs_transfer_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'sks_diakui' => $this->input->post('sks_diakui',TRUE),
        		'pt_asal' => $this->input->post('pt_asal',TRUE),
        		'prodi_asal' => $this->input->post('prodi_asal',TRUE),
        	  );
            $this->Mahasiswa_transfer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa_transfer'));
        }
    }

    public function update($id)
    {
        $row = $this->Mahasiswa_transfer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa_transfer/update_action'),
            		'id_trans' => set_value('id_trans', $row->id_trans),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            		'sks_diakui' => set_value('sks_diakui', $row->sks_diakui),
            		'pt_asal' => set_value('pt_asal', $row->pt_asal),
            		'prodi_asal' => set_value('prodi_asal', $row->prodi_asal),
            );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mahasiswa Transfer';
            $data['assign_js'] = 'mahasiswa_transfer/js/index.js';
            load_view('mahasiswa_transfer/tb_mhs_transfer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_transfer'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_trans', TRUE));
        } else {
            $data = array(
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'sks_diakui' => $this->input->post('sks_diakui',TRUE),
        		'pt_asal' => $this->input->post('pt_asal',TRUE),
        		'prodi_asal' => $this->input->post('prodi_asal',TRUE),
        	  );

            $this->Mahasiswa_transfer_model->update($this->input->post('id_trans', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa_transfer'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mahasiswa_transfer_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_transfer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa_transfer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_transfer'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
    	$this->form_validation->set_rules('sks_diakui', 'sks diakui', 'trim|required');
    	$this->form_validation->set_rules('pt_asal', 'pt asal', 'trim|required');
    	$this->form_validation->set_rules('prodi_asal', 'prodi asal', 'trim|required');

    	$this->form_validation->set_rules('id_trans', 'id_trans', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mhs_transfer.xls";
        $judul = "tb_mhs_transfer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Sks Diakui");
	xlsWriteLabel($tablehead, $kolomhead++, "Pt Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Prodi Asal");

	foreach ($this->Mahasiswa_transfer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sks_diakui);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pt_asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prodi_asal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mhs_transfer.doc");

        $data = array(
            'tb_mhs_transfer_data' => $this->Mahasiswa_transfer_model->get_all(),
            'start' => 0
        );
        load_view('mahasiswa_transfer/tb_mhs_transfer_doc',$data);
    }

}
