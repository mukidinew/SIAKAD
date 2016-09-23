<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pinjam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pinjam = $this->Pinjam_model->get_all();

        $data = array(
            'pinjam_data' => $pinjam
        );

        $this->load->view('pinjam/tb_pinjam_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pinjam' => $row->id_pinjam,
		'id_buku' => $row->id_buku,
		'tgl_pjm' => $row->tgl_pjm,
		'lama_pjm' => $row->lama_pjm,
		'tgl_kembali' => $row->tgl_kembali,
		'id_mhs' => $row->id_mhs,
		'status_pjm' => $row->status_pjm,
	    );
            $this->load->view('pinjam/tb_pinjam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pinjam/create_action'),
	    'id_pinjam' => set_value('id_pinjam'),
	    'id_buku' => set_value('id_buku'),
	    'tgl_pjm' => set_value('tgl_pjm'),
	    'lama_pjm' => set_value('lama_pjm'),
	    'tgl_kembali' => set_value('tgl_kembali'),
	    'id_mhs' => set_value('id_mhs'),
	    'status_pjm' => set_value('status_pjm'),
	);
        $this->load->view('pinjam/tb_pinjam_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_buku' => $this->input->post('id_buku',TRUE),
		'tgl_pjm' => $this->input->post('tgl_pjm',TRUE),
		'lama_pjm' => $this->input->post('lama_pjm',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'status_pjm' => $this->input->post('status_pjm',TRUE),
	    );

            $this->Pinjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pinjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pinjam/update_action'),
		'id_pinjam' => set_value('id_pinjam', $row->id_pinjam),
		'id_buku' => set_value('id_buku', $row->id_buku),
		'tgl_pjm' => set_value('tgl_pjm', $row->tgl_pjm),
		'lama_pjm' => set_value('lama_pjm', $row->lama_pjm),
		'tgl_kembali' => set_value('tgl_kembali', $row->tgl_kembali),
		'id_mhs' => set_value('id_mhs', $row->id_mhs),
		'status_pjm' => set_value('status_pjm', $row->status_pjm),
	    );
            $this->load->view('pinjam/tb_pinjam_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pinjam', TRUE));
        } else {
            $data = array(
		'id_buku' => $this->input->post('id_buku',TRUE),
		'tgl_pjm' => $this->input->post('tgl_pjm',TRUE),
		'lama_pjm' => $this->input->post('lama_pjm',TRUE),
		'tgl_kembali' => $this->input->post('tgl_kembali',TRUE),
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'status_pjm' => $this->input->post('status_pjm',TRUE),
	    );

            $this->Pinjam_model->update($this->input->post('id_pinjam', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pinjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pinjam_model->get_by_id($id);

        if ($row) {
            $this->Pinjam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pinjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pinjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');
	$this->form_validation->set_rules('tgl_pjm', 'tgl pjm', 'trim|required');
	$this->form_validation->set_rules('lama_pjm', 'lama pjm', 'trim|required');
	$this->form_validation->set_rules('tgl_kembali', 'tgl kembali', 'trim|required');
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('status_pjm', 'status pjm', 'trim|required');

	$this->form_validation->set_rules('id_pinjam', 'id_pinjam', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_pinjam.xls";
        $judul = "tb_pinjam";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pjm");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama Pjm");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kembali");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mhs");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Pjm");

	foreach ($this->Pinjam_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_buku);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pjm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lama_pjm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kembali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_pjm);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pinjam.php */
/* Location: ./application/controllers/Pinjam.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-14 13:16:57 */
/* http://harviacode.com */