<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proposal_maju extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_maju_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $proposal_maju = $this->App_model->get_query("SELECT * FROM v_proposal_maju")->result();
        $data = array(
            'proposal_maju_data' => $proposal_maju
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Maju Proposal';
        $data['assign_js'] = 'proposal_maju/js/index.js';
        load_view('proposal_maju/tb_proposal_maju_list', $data);
    }

    public function read($id)
    {
        $row = $this->Proposal_maju_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proposal_maju' => $row->id_proposal_maju,
		'id_proposal' => $row->id_proposal,
		'kode_bayar' => $row->kode_bayar,
		'bebas_pustaka' => $row->bebas_pustaka,
		'bebas_smt' => $row->bebas_smt,
		'tgl_daftar' => $row->tgl_daftar,
	    );
      $data['site_title'] = 'SIPAD';
      $data['title_page'] = 'Olah Data Maju Proposal';
      $data['assign_js'] = 'proposal_maju/js/index.js';
            load_view('proposal_maju/tb_proposal_maju_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal_maju'));
        }
    }

    public function create()
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('proposal_maju/create_action'),
        	    'id_proposal_maju' => set_value('id_proposal_maju'),
        	    'id_proposal' => set_value('id_proposal'),
        	    'kode_bayar' => set_value('kode_bayar'),
        	    'bebas_pustaka' => set_value('bebas_pustaka'),
        	    'bebas_smt' => set_value('bebas_smt'),
        	    'tgl_daftar' => set_value('tgl_daftar'),
        	);
          $data['site_title'] = 'SIPAD';
          $data['title_page'] = 'Olah Data Maju Proposal';
          $data['assign_js'] = 'proposal_maju/js/index.js';
        load_view('proposal_maju/tb_proposal_maju_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'kode_bayar' => $this->input->post('kode_bayar',TRUE),
		'bebas_pustaka' => $this->input->post('bebas_pustaka',TRUE),
		'bebas_smt' => $this->input->post('bebas_smt',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
	    );

            $this->Proposal_maju_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proposal_maju'));
        }
    }

    public function update($id)
    {
        $row = $this->Proposal_maju_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proposal_maju/update_action'),
		'id_proposal_maju' => set_value('id_proposal_maju', $row->id_proposal_maju),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'kode_bayar' => set_value('kode_bayar', $row->kode_bayar),
		'bebas_pustaka' => set_value('bebas_pustaka', $row->bebas_pustaka),
		'bebas_smt' => set_value('bebas_smt', $row->bebas_smt),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
	    );
      $data['site_title'] = 'SIPAD';
      $data['title_page'] = 'Olah Data Maju Proposal';
      $data['assign_js'] = 'proposal_maju/js/index.js';
            load_view('proposal_maju/tb_proposal_maju_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal_maju'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proposal_maju', TRUE));
        } else {
            $data = array(
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'kode_bayar' => $this->input->post('kode_bayar',TRUE),
		'bebas_pustaka' => $this->input->post('bebas_pustaka',TRUE),
		'bebas_smt' => $this->input->post('bebas_smt',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
	    );

            $this->Proposal_maju_model->update($this->input->post('id_proposal_maju', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal_maju'));
        }
    }

    public function delete($id)
    {
        $row = $this->Proposal_maju_model->get_by_id($id);

        if ($row) {
            $this->Proposal_maju_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proposal_maju'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal_maju'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_proposal', 'id proposal', 'trim|required');
	$this->form_validation->set_rules('kode_bayar', 'kode bayar', 'trim|required');
	$this->form_validation->set_rules('bebas_pustaka', 'bebas pustaka', 'trim|required');
	$this->form_validation->set_rules('bebas_smt', 'bebas smt', 'trim|required');
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');

	$this->form_validation->set_rules('id_proposal_maju', 'id_proposal_maju', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_proposal_maju.xls";
        $judul = "tb_proposal_maju";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Proposal");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Bebas Pustaka");
	xlsWriteLabel($tablehead, $kolomhead++, "Bebas Smt");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");

	foreach ($this->Proposal_maju_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_proposal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bebas_pustaka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bebas_smt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function getMhsProposal()
    {
      $prodi='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $prodi = $this->App_model->get_query("SELECT * FROM v_list_proposal WHERE id_prodi='". $this->session->userdata('level_prodi') ."'")->result();
      }
      else {
        $prodi = $this->App_model->get_query("SELECT * FROM v_list_proposal WHERE id_prodi='". $this->session->userdata('level_prodi') ."' AND  (nim LIKE '%".$cari."%' OR nm_mhs LIKE '%".$cari."%')")->result();
      }

      $temps = array();
      foreach ($prodi as $key) {
        $temps[] = array(
          'id_mhs_proposal' => $key->id_mhs_proposal,
          'nim' => $key->nim,
          'nm_mhs' => $key->nm_mhs,
          'judul' => $key->judul
        );
      }
      echo json_encode($temps);
    }
}
