<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller
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
          $this->load->model('Mata_kuliah_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $mata_kuliah = $this->Mata_kuliah_model->get_all();

        $data = array(
            'mata_kuliah_data' => $mata_kuliah
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mata Kuliah';
        $data['assign_js'] = 'mata_kuliah/js/index.js';
        load_view('mata_kuliah/tb_mata_kuliah_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mata_kuliah_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'kode_mk' => $row->kode_mk,
          		'nm_mk' => $row->nm_mk,
          		'sks' => $row->sks,
          		'semester' => $row->semester
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mata Kuliah';
            $data['assign_js'] = 'mata_kuliah/js/index.js';
            load_view('mata_kuliah/tb_mata_kuliah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mata_kuliah/create_action'),
      	    'kode_mk' => set_value('kode_mk'),
      	    'nm_mk' => set_value('nm_mk'),
      	    'sks' => set_value('sks'),
      	    'semester' => set_value('semester'),
      	);
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mata Kuliah';
        $data['assign_js'] = 'mata_kuliah/js/index.js';
        load_view('mata_kuliah/tb_mata_kuliah_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'kode_mk' => $this->input->post('kode_mk',TRUE),
          		'nm_mk' => $this->input->post('nm_mk',TRUE),
          		'sks' => $this->input->post('sks',TRUE),
          		'semester' => $this->input->post('semester',TRUE),
        	  );
            $this->Mata_kuliah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mata_kuliah'));
        }
    }

    public function update($id)
    {
        $row = $this->Mata_kuliah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mata_kuliah/update_action'),
            		'kode_mk' => set_value('kode_mk', $row->kode_mk),
            		'nm_mk' => set_value('nm_mk', $row->nm_mk),
            		'sks' => set_value('sks', $row->sks),
            		'semester' => set_value('semester', $row->semester),
            );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mata Kuliah';
            $data['assign_js'] = 'mata_kuliah/js/index.js';
            load_view('mata_kuliah/tb_mata_kuliah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_mk', TRUE));
        } else {
            $data = array(
          		'nm_mk' => $this->input->post('nm_mk',TRUE),
          		'sks' => $this->input->post('sks',TRUE),
          		'semester' => $this->input->post('semester',TRUE),
        	  );
            $this->Mata_kuliah_model->update($this->input->post('kode_mk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mata_kuliah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mata_kuliah_model->get_by_id($id);

        if ($row) {
            $this->Mata_kuliah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mata_kuliah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mata_kuliah'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_mk', 'nm mk', 'trim|required');
    	$this->form_validation->set_rules('sks', 'sks', 'trim|required');
    	$this->form_validation->set_rules('semester', 'semester', 'trim|required');

    	$this->form_validation->set_rules('kode_mk', 'kode_mk', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mata_kuliah.xls";
        $judul = "tb_mata_kuliah";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Nm Mk");
      	xlsWriteLabel($tablehead, $kolomhead++, "Sks");
      	xlsWriteLabel($tablehead, $kolomhead++, "Semester");

      	foreach ($this->Mata_kuliah_model->get_all() as $data) {
          $kolombody = 0;

          //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
          xlsWriteNumber($tablebody, $kolombody++, $nourut);
          xlsWriteLabel($tablebody, $kolombody++, $data->nm_mk);
          xlsWriteNumber($tablebody, $kolombody++, $data->sks);
          xlsWriteNumber($tablebody, $kolombody++, $data->semester);

          $tablebody++;
          $nourut++;
        }

      xlsEOF();
      exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mata_kuliah.doc");

        $data = array(
            'tb_mata_kuliah_data' => $this->Mata_kuliah_model->get_all(),
            'start' => 0
        );

        load_view('mata_kuliah/tb_mata_kuliah_doc',$data);
    }
}
