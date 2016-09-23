<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kategori = $this->Kategori_model->get_all();

        $data = array(
            'kategori_data' => $kategori
        );
        $data['breadcrumb']='Kategori Buku';
    		$data['title']='Olah Data Kategori Buku';
        $data['assign_js']='kategori/js/index.js';
        load_view('kategori/tb_kategori_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_kategori' => $row->id_kategori,
          		'nm_kategori' => $row->nm_kategori,
      	    );
            $data['breadcrumb']='Kategori Buku';
            $data['title']='Olah Data Kategori Buku';
            $data['assign_js']='kategori/js/index.js';
            load_view('kategori/tb_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori/create_action'),
      	    'id_kategori' => set_value('id_kategori'),
      	    'nm_kategori' => set_value('nm_kategori'),
      	);
        $data['breadcrumb']='Kategori Buku';
        $data['title']='Olah Data Kategori Buku';
        $data['assign_js']='kategori/js/index.js';
        load_view('kategori/tb_kategori_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
      		      'nm_kategori' => $this->input->post('nm_kategori',TRUE),
      	    );
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori'));
        }
    }

    public function update($id)
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
              'button' => 'Update',
              'action' => site_url('kategori/update_action'),
          		'id_kategori' => set_value('id_kategori', $row->id_kategori),
          		'nm_kategori' => set_value('nm_kategori', $row->nm_kategori),
      	    );
            $data['breadcrumb']='Kategori Buku';
            $data['title']='Olah Data Kategori Buku';
            $data['assign_js']='kategori/js/index.js';
            load_view('kategori/tb_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
        		    'nm_kategori' => $this->input->post('nm_kategori',TRUE),
        	  );
            $this->Kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_kategori', 'nm kategori', 'trim|required');
    	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kategori.xls";
        $judul = "tb_kategori";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Kategori");

	foreach ($this->Kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-14 13:16:18 */
/* http://harviacode.com */
