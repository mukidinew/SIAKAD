<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_absensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $dosen_absensi = $this->Dosen_absensi_model->get_all();

        $data = array(
            'dosen_absensi_data' => $dosen_absensi
        );

        $this->load->view('dosen_absensi/tb_dosen_absensi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dosen_absensi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_absensi' => $row->id_absensi,
		'id_kelas_dosen' => $row->id_kelas_dosen,
		'tgl_masuk' => $row->tgl_masuk,
		'jam_masuk' => $row->jam_masuk,
		'status_kehadiran' => $row->status_kehadiran,
		'pembahasan' => $row->pembahasan,
	    );
            $this->load->view('dosen_absensi/tb_dosen_absensi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_absensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen_absensi/create_action'),
	    'id_absensi' => set_value('id_absensi'),
	    'id_kelas_dosen' => set_value('id_kelas_dosen'),
	    'tgl_masuk' => set_value('tgl_masuk'),
	    'jam_masuk' => set_value('jam_masuk'),
	    'status_kehadiran' => set_value('status_kehadiran'),
	    'pembahasan' => set_value('pembahasan'),
	);
        $this->load->view('dosen_absensi/tb_dosen_absensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kelas_dosen' => $this->input->post('id_kelas_dosen',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		'jam_masuk' => $this->input->post('jam_masuk',TRUE),
		'status_kehadiran' => $this->input->post('status_kehadiran',TRUE),
		'pembahasan' => $this->input->post('pembahasan',TRUE),
	    );

            $this->Dosen_absensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen_absensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dosen_absensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen_absensi/update_action'),
		'id_absensi' => set_value('id_absensi', $row->id_absensi),
		'id_kelas_dosen' => set_value('id_kelas_dosen', $row->id_kelas_dosen),
		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
		'jam_masuk' => set_value('jam_masuk', $row->jam_masuk),
		'status_kehadiran' => set_value('status_kehadiran', $row->status_kehadiran),
		'pembahasan' => set_value('pembahasan', $row->pembahasan),
	    );
            $this->load->view('dosen_absensi/tb_dosen_absensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_absensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_absensi', TRUE));
        } else {
            $data = array(
		'id_kelas_dosen' => $this->input->post('id_kelas_dosen',TRUE),
		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
		'jam_masuk' => $this->input->post('jam_masuk',TRUE),
		'status_kehadiran' => $this->input->post('status_kehadiran',TRUE),
		'pembahasan' => $this->input->post('pembahasan',TRUE),
	    );

            $this->Dosen_absensi_model->update($this->input->post('id_absensi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen_absensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dosen_absensi_model->get_by_id($id);

        if ($row) {
            $this->Dosen_absensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen_absensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_absensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas_dosen', 'id kelas dosen', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
	$this->form_validation->set_rules('jam_masuk', 'jam masuk', 'trim|required');
	$this->form_validation->set_rules('status_kehadiran', 'status kehadiran', 'trim|required');
	$this->form_validation->set_rules('pembahasan', 'pembahasan', 'trim|required');

	$this->form_validation->set_rules('id_absensi', 'id_absensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_dosen_absensi.xls";
        $judul = "tb_dosen_absensi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Kehadiran");
	xlsWriteLabel($tablehead, $kolomhead++, "Pembahasan");

	foreach ($this->Dosen_absensi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_kehadiran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembahasan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dosen_absensi.php */
/* Location: ./application/controllers/Dosen_absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-17 18:47:50 */
/* http://harviacode.com */