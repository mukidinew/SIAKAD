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
        else if($this->session->userdata('level') != 'baak'){
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
        $skripsi = $this->Skripsi_model->get_all();

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
        		'id_proposal_maju' => $row->id_proposal_maju,
        		'bebas_pustaka' => $row->bebas_pustaka,
        		'bebas_smt' => $row->bebas_smt,
        		'bebas_proposal' => $row->bebas_proposal,
        		'tgl_daftar' => $row->tgl_daftar,
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
	    'id_proposal_maju' => set_value('id_proposal_maju'),
	    'bebas_pustaka' => set_value('bebas_pustaka'),
      'bebas_smt' => set_value('bebas_smt'),
	    'kliring_nilai' => set_value('kliring_nilai'),
	    'bebas_proposal' => set_value('bebas_proposal'),
	    'tgl_daftar' => set_value('tgl_daftar'),
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
		'id_proposal_maju' => $this->input->post('id_proposal_maju',TRUE),
		'bebas_pustaka' => $this->input->post('bebas_pustaka',TRUE),
    'bebas_smt' => $this->input->post('bebas_smt',TRUE),
		'kliring_nilai' => $this->input->post('kliring_nilai',TRUE),
		'bebas_proposal' => $this->input->post('bebas_proposal',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
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
		'id_proposal_maju' => set_value('id_proposal_maju', $row->id_proposal_maju),
		'bebas_pustaka' => set_value('bebas_pustaka', $row->bebas_pustaka),
    'bebas_smt' => set_value('bebas_smt', $row->bebas_smt),
		'kliring_nilai' => set_value('kliring_nilai', $row->kliring_nilai),
		'bebas_proposal' => set_value('bebas_proposal', $row->bebas_proposal),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
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
		'id_proposal_maju' => $this->input->post('id_proposal_maju',TRUE),
		'bebas_pustaka' => $this->input->post('bebas_pustaka',TRUE),
    'bebas_smt' => $this->input->post('bebas_smt',TRUE),
		'kliring_nilai' => $this->input->post('kliring_nilai',TRUE),
		'bebas_proposal' => $this->input->post('bebas_proposal',TRUE),
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
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
	$this->form_validation->set_rules('id_proposal_maju', 'id proposal maju', 'trim|required');
	$this->form_validation->set_rules('bebas_pustaka', 'bebas pustaka', 'trim|required');
	$this->form_validation->set_rules('bebas_smt', 'bebas smt', 'trim|required');
  $this->form_validation->set_rules('bebas_proposal', 'bebas proposal', 'trim|required');
	$this->form_validation->set_rules('kliring_nilai', 'kliring nilai', 'trim|required');
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');

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

    public function getIdProposalMaju()
    {
      $prodi='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $prodi = $this->App_model->get_query("SELECT * FROM v_proposal_maju")->result();
      }
      else {
        $prodi = $this->App_model->get_query("SELECT * FROM v_proposal_maju WHERE nim LIKE '%".$cari."%' OR nm_mhs LIKE '%".$cari."%'")->result();
      }

      $temps = array();
      foreach ($prodi as $key) {
        $temps[] = array(
          'id_proposal_maju' => $key->id_proposal_maju,
          'nim' => $key->nim,
          'nm_mhs' => $key->nm_mhs,
          'judul' => $key->judul
        );
      }
      echo json_encode($temps);
    }
}
