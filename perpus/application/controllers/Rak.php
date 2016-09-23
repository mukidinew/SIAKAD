<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rak_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $rak = $this->Rak_model->get_all();

        $data = array(
            'rak_data' => $rak
        );
        $data['breadcrumb']='Rak Buku';
        $data['title']='Olah Data Rak Buku';
        $data['assign_js']='rak/js/index.js';
        load_view('rak/tb_rak_list', $data);
    }

    public function read($id)
    {
        $row = $this->Rak_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_rak' => $row->id_rak,
          		'id_kategori' => $row->id_kategori,
          		'nm_rak' => $row->nm_rak,
	          );
            $data['breadcrumb']='Rak Buku';
            $data['title']='Olah Data Rak Buku';
            $data['assign_js']='rak/js/index.js';
            load_view('rak/tb_rak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rak'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rak/create_action'),
      	    'id_rak' => set_value('id_rak'),
      	    'id_kategori' => set_value('id_kategori'),
      	    'nm_rak' => set_value('nm_rak'),
      	);
        $data['breadcrumb']='Rak Buku';
        $data['title']='Olah Data Rak Buku';
        $data['assign_js']='rak/js/index.js';
        load_view('rak/tb_rak_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'id_kategori' => $this->input->post('id_kategori',TRUE),
          		'nm_rak' => $this->input->post('nm_rak',TRUE),
        	  );
            $this->Rak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rak'));
        }
    }

    public function update($id)
    {
        $row = $this->Rak_model->get_by_id($id);
        $kategori_row = $this->App_model->get_query("SELECT * FROM tb_kategori WHERE id_kategori='".$row->id_kategori."'")->row();
        $kategori = $this->App_model->get_query("SELECT * FROM tb_kategori")->result();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rak/update_action'),
            		'id_rak' => set_value('id_rak', $row->id_rak),
            		'id_kategori' => set_value('id_kategori', $row->id_kategori),
            		'nm_rak' => set_value('nm_rak', $row->nm_rak),
            );
            $data['kategori_row']=$kategori_row;
            $data['kategori']=$kategori;
            $data['breadcrumb']='Rak Buku';
            $data['title']='Olah Data Rak Buku';
            $data['assign_js']='rak/js/index.js';
            load_view('rak/tb_rak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rak'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rak', TRUE));
        } else {
            $data = array(
          		'id_kategori' => $this->input->post('id_kategori',TRUE),
          		'nm_rak' => $this->input->post('nm_rak',TRUE),
        	  );
            $this->Rak_model->update($this->input->post('id_rak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rak'));
        }
    }

    public function delete($id)
    {
        $row = $this->Rak_model->get_by_id($id);
        if ($row) {
            $this->Rak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rak'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
    	$this->form_validation->set_rules('nm_rak', 'nm rak', 'trim|required');

    	$this->form_validation->set_rules('id_rak', 'id_rak', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_rak.xls";
        $judul = "tb_rak";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nm Rak");

	foreach ($this->Rak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_rak);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
