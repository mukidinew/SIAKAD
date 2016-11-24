<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ruangan = $this->Ruangan_model->get_all();

        $data = array(
            'ruangan_data' => $ruangan
        );

        $this->load->view('ruangan/tb_ruangan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ruangan' => $row->id_ruangan,
		'nm_ruangan' => $row->nm_ruangan,
		'ket' => $row->ket,
	    );
            $this->load->view('ruangan/tb_ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ruangan/create_action'),
	    'id_ruangan' => set_value('id_ruangan'),
	    'nm_ruangan' => set_value('nm_ruangan'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('ruangan/tb_ruangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_ruangan' => $this->input->post('nm_ruangan',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ruangan/update_action'),
		'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
		'nm_ruangan' => set_value('nm_ruangan', $row->nm_ruangan),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->load->view('ruangan/tb_ruangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruangan', TRUE));
        } else {
            $data = array(
		'nm_ruangan' => $this->input->post('nm_ruangan',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Ruangan_model->update($this->input->post('id_ruangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $this->Ruangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ruangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_ruangan', 'nm ruangan', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_ruangan.xls";
        $judul = "tb_ruangan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Ruangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Ruangan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_ruangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/Ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-24 03:02:22 */
/* http://harviacode.com */