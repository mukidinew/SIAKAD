<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai_transfer extends CI_Controller
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
          $this->load->model('Nilai_transfer_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $nilai_transfer = $this->Nilai_transfer_model->get_all();

        $data = array(
            'nilai_transfer_data' => $nilai_transfer
        );

        $this->load->view('nilai_transfer/tb_nilai_transfer_list', $data);
    }

    public function read($id)
    {
        $row = $this->Nilai_transfer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilai_trans' => $row->id_nilai_trans,
		'id_mhs' => $row->id_mhs,
		'kd_mk_asal' => $row->kd_mk_asal,
		'nm_mk' => $row->nm_mk,
		'jml_sks_asal' => $row->jml_sks_asal,
		'nilai_huruf' => $row->nilai_huruf,
		'id_mk' => $row->id_mk,
	    );
            $this->load->view('nilai_transfer/tb_nilai_transfer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_transfer'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai_transfer/create_action'),
	    'id_nilai_trans' => set_value('id_nilai_trans'),
	    'id_mhs' => set_value('id_mhs'),
	    'kd_mk_asal' => set_value('kd_mk_asal'),
	    'nm_mk' => set_value('nm_mk'),
	    'jml_sks_asal' => set_value('jml_sks_asal'),
	    'nilai_huruf' => set_value('nilai_huruf'),
	    'id_mk' => set_value('id_mk'),
	);
        $this->load->view('nilai_transfer/tb_nilai_transfer_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'kd_mk_asal' => $this->input->post('kd_mk_asal',TRUE),
		'nm_mk' => $this->input->post('nm_mk',TRUE),
		'jml_sks_asal' => $this->input->post('jml_sks_asal',TRUE),
		'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
		'id_mk' => $this->input->post('id_mk',TRUE),
	    );

            $this->Nilai_transfer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai_transfer'));
        }
    }

    public function update($id)
    {
        $row = $this->Nilai_transfer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai_transfer/update_action'),
		'id_nilai_trans' => set_value('id_nilai_trans', $row->id_nilai_trans),
		'id_mhs' => set_value('id_mhs', $row->id_mhs),
		'kd_mk_asal' => set_value('kd_mk_asal', $row->kd_mk_asal),
		'nm_mk' => set_value('nm_mk', $row->nm_mk),
		'jml_sks_asal' => set_value('jml_sks_asal', $row->jml_sks_asal),
		'nilai_huruf' => set_value('nilai_huruf', $row->nilai_huruf),
		'id_mk' => set_value('id_mk', $row->id_mk),
	    );
            $this->load->view('nilai_transfer/tb_nilai_transfer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_transfer'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai_trans', TRUE));
        } else {
            $data = array(
		'id_mhs' => $this->input->post('id_mhs',TRUE),
		'kd_mk_asal' => $this->input->post('kd_mk_asal',TRUE),
		'nm_mk' => $this->input->post('nm_mk',TRUE),
		'jml_sks_asal' => $this->input->post('jml_sks_asal',TRUE),
		'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
		'id_mk' => $this->input->post('id_mk',TRUE),
	    );

            $this->Nilai_transfer_model->update($this->input->post('id_nilai_trans', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai_transfer'));
        }
    }

    public function delete($id)
    {
        $row = $this->Nilai_transfer_model->get_by_id($id);

        if ($row) {
            $this->Nilai_transfer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai_transfer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai_transfer'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('kd_mk_asal', 'kd mk asal', 'trim|required');
	$this->form_validation->set_rules('nm_mk', 'nm mk', 'trim|required');
	$this->form_validation->set_rules('jml_sks_asal', 'jml sks asal', 'trim|required');
	$this->form_validation->set_rules('nilai_huruf', 'nilai huruf', 'trim|required');
	$this->form_validation->set_rules('id_mk', 'id mk', 'trim|required');

	$this->form_validation->set_rules('id_nilai_trans', 'id_nilai_trans', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_nilai_transfer.xls";
        $judul = "tb_nilai_transfer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Mk Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Mk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jml Sks Asal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Huruf");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mk");

	foreach ($this->Nilai_transfer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_mk_asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_mk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jml_sks_asal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_huruf);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_nilai_transfer.doc");

        $data = array(
            'tb_nilai_transfer_data' => $this->Nilai_transfer_model->get_all(),
            'start' => 0
        );

        $this->load->view('nilai_transfer/tb_nilai_transfer_doc',$data);
    }

}

/* End of file Nilai_transfer.php */
/* Location: ./application/controllers/Nilai_transfer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-09 21:46:16 */
/* http://harviacode.com */
