<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $proposal = $this->Proposal_model->get_all();

        $data = array(
            'proposal_data' => $proposal
        );

        $this->load->view('proposal/tb_proposal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mhs_proposal' => $row->id_mhs_proposal,
		'id_mhs' => $row->id_mhs,
		'judul' => $row->judul,
		'id_pembimbing_1' => $row->id_pembimbing_1,
		'id_pembimbing_2' => $row->id_pembimbing_2,
		'tgl_daftar' => $row->tgl_daftar,
		'tgl_kadaluarsa' => $row->tgl_kadaluarsa,
	    );
            $this->load->view('proposal/tb_proposal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proposal/create_action'),
	    'id_mhs_proposal' => set_value('id_mhs_proposal'),
	    'id_mhs' => set_value('id_mhs'),
	    'judul' => set_value('judul'),
	    'id_pembimbing_1' => set_value('id_pembimbing_1'),
	    'id_pembimbing_2' => set_value('id_pembimbing_2'),
	    'tgl_daftar' => set_value('tgl_daftar'),
	    'tgl_kadaluarsa' => set_value('tgl_kadaluarsa'),
	);
        $this->load->view('proposal/tb_proposal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'id_pembimbing_1' => $this->input->post('id_pembimbing_1',TRUE),
		'id_pembimbing_2' => $this->input->post('id_pembimbing_2',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa',TRUE),
	    );

            $this->Proposal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proposal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proposal/update_action'),
		'id_mhs_proposal' => set_value('id_mhs_proposal', $row->id_mhs_proposal),
		'id_mhs' => set_value('id_mhs', $row->id_mhs),
		'judul' => set_value('judul', $row->judul),
		'id_pembimbing_1' => set_value('id_pembimbing_1', $row->id_pembimbing_1),
		'id_pembimbing_2' => set_value('id_pembimbing_2', $row->id_pembimbing_2),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
		'tgl_kadaluarsa' => set_value('tgl_kadaluarsa', $row->tgl_kadaluarsa),
	    );
            $this->load->view('proposal/tb_proposal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mhs_proposal', TRUE));
        } else {
            $data = array(
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'id_pembimbing_1' => $this->input->post('id_pembimbing_1',TRUE),
		'id_pembimbing_2' => $this->input->post('id_pembimbing_2',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa',TRUE),
	    );

            $this->Proposal_model->update($this->input->post('id_mhs_proposal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $this->Proposal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proposal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('id_pembimbing_1', 'id pembimbing 1', 'trim|required');
	$this->form_validation->set_rules('id_pembimbing_2', 'id pembimbing 2', 'trim|required');
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');
	$this->form_validation->set_rules('tgl_kadaluarsa', 'tgl kadaluarsa', 'trim|required');

	$this->form_validation->set_rules('id_mhs_proposal', 'id_mhs_proposal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_proposal.xls";
        $judul = "tb_proposal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pembimbing 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pembimbing 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kadaluarsa");

	foreach ($this->Proposal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pembimbing_1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pembimbing_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kadaluarsa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Proposal.php */
/* Location: ./application/controllers/Proposal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-23 17:50:43 */
/* http://harviacode.com */