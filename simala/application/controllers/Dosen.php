<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
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
          $this->load->model('Dosen_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $dosen = $this->Dosen_model->get_all();
        $data = array(
            'dosen_data' => $dosen
        );
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Dosen';
    		$data['assign_js'] = 'dosen/js/index.js';
        load_view('dosen/tb_dosen_list', $data);
    }

    public function read($id)
    {
        $row = $this->Dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'nidn' => $row->nidn,
        		'nm_dosen' => $row->nm_dosen,
        		'program_studi' => $row->program_studi);
            $data['site_title'] = 'SIMALA';
        		$data['title_page'] = 'Olah Data Dosen';
        		$data['assign_js'] = 'dosen/js/index.js';
            load_view('dosen/tb_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
      	    'nidn' => set_value('nidn'),
      	    'nm_dosen' => set_value('nm_dosen'),
      	    'program_studi' => set_value('program_studi')
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Dosen';
        $data['assign_js'] = 'dosen/js/index.js';
        load_view('dosen/tb_dosen_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nidn' => $this->input->post('nidn',TRUE),
        		'nm_dosen' => $this->input->post('nm_dosen',TRUE),
        		'program_studi' => $this->input->post('program_studi',TRUE)
            );

            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }

    public function update($id)
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
            		'nidn' => set_value('nidn', $row->nidn),
            		'nm_dosen' => set_value('nm_dosen', $row->nm_dosen),
            		'program_studi' => set_value('program_studi', $row->program_studi)
            	  );
                $data['site_title'] = 'SIMALA';
            		$data['title_page'] = 'Olah Data Dosen';
            		$data['assign_js'] = 'dosen/js/index.js';
                load_view('dosen/tb_dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nidn', TRUE));
        } else {
            $data = array(
		'nm_dosen' => $this->input->post('nm_dosen',TRUE),
		'program_studi' => $this->input->post('program_studi',TRUE),
	    );

            $this->Dosen_model->update($this->input->post('nidn', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }

    public function delete($id)
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $this->Dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_dosen', 'nm dosen', 'trim|required');
	$this->form_validation->set_rules('program_studi', 'program studi', 'trim|required');

	$this->form_validation->set_rules('nidn', 'nidn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_dosen.xls";
        $judul = "tb_dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Program Studi");

	foreach ($this->Dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_dosen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->program_studi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_dosen.doc");

        $data = array(
            'tb_dosen_data' => $this->Dosen_model->get_all(),
            'start' => 0
        );

        load_view('dosen/tb_dosen_doc',$data);
    }

    public function getProdi()
    {
      $dosen='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $dosen = $this->Dosen_model->get_query("SELECT * FROM tb_prodi")->result();
      }
      else {
        $dosen = $this->Dosen_model->get_limit_prodi($page,0,$cari);
      }
      $temps = array();
      foreach ($dosen as $key) {
        $temps[] = array(
          'id_prodi' => $key->id_prodi,
          'nm_prodi' => $key->nm_prodi,
          'nm_ketua' => $key->nm_ketua
        );
      }
      echo json_encode($temps);
    }
}
