<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_pembimbing_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $dosen_pembimbing = $this->Dosen_pembimbing_model->get_all();

        $data = array(
            'dosen_pembimbing_data' => $dosen_pembimbing
        );

        $this->load->view('dosen_pembimbing/tb_dosen_pembimbing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dosen_pembimbing_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembimbing' => $row->id_pembimbing,
		'id_dosen' => $row->id_dosen,
		'status' => $row->status,
	    );
            $this->load->view('dosen_pembimbing/tb_dosen_pembimbing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_pembimbing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen_pembimbing/create_action'),
	    'id_pembimbing' => set_value('id_pembimbing'),
	    'id_dosen' => set_value('id_dosen'),
	    'status' => set_value('status'),
	);
        $this->load->view('dosen_pembimbing/tb_dosen_pembimbing_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Dosen_pembimbing_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen_pembimbing'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dosen_pembimbing_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen_pembimbing/update_action'),
		'id_pembimbing' => set_value('id_pembimbing', $row->id_pembimbing),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('dosen_pembimbing/tb_dosen_pembimbing_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_pembimbing'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembimbing', TRUE));
        } else {
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Dosen_pembimbing_model->update($this->input->post('id_pembimbing', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen_pembimbing'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dosen_pembimbing_model->get_by_id($id);

        if ($row) {
            $this->Dosen_pembimbing_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen_pembimbing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_pembimbing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pembimbing', 'id_pembimbing', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_dosen_pembimbing.xls";
        $judul = "tb_dosen_pembimbing";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Dosen_pembimbing_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dosen_pembimbing.php */
/* Location: ./application/controllers/Dosen_pembimbing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-07 07:08:21 */
/* http://harviacode.com */