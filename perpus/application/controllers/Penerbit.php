<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerbit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerbit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $penerbit = $this->Penerbit_model->get_all();

        $data = array(
            'penerbit_data' => $penerbit
        );

        $this->load->view('penerbit/tb_penerbit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Penerbit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penerbit' => $row->id_penerbit,
		'nm_penerbit' => $row->nm_penerbit,
		'alamat' => $row->alamat,
	    );
            $this->load->view('penerbit/tb_penerbit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerbit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penerbit/create_action'),
	    'id_penerbit' => set_value('id_penerbit'),
	    'nm_penerbit' => set_value('nm_penerbit'),
	    'alamat' => set_value('alamat'),
	);
        $this->load->view('penerbit/tb_penerbit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_penerbit' => $this->input->post('nm_penerbit',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Penerbit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penerbit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penerbit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penerbit/update_action'),
		'id_penerbit' => set_value('id_penerbit', $row->id_penerbit),
		'nm_penerbit' => set_value('nm_penerbit', $row->nm_penerbit),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->load->view('penerbit/tb_penerbit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerbit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penerbit', TRUE));
        } else {
            $data = array(
		'nm_penerbit' => $this->input->post('nm_penerbit',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Penerbit_model->update($this->input->post('id_penerbit', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penerbit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penerbit_model->get_by_id($id);

        if ($row) {
            $this->Penerbit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penerbit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerbit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_penerbit', 'nm penerbit', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_penerbit', 'id_penerbit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_penerbit.xls";
        $judul = "tb_penerbit";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Penerbit");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");

	foreach ($this->Penerbit_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_penerbit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Penerbit.php */
/* Location: ./application/controllers/Penerbit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-14 13:16:33 */
/* http://harviacode.com */