<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $buku = $this->Buku_model->get_all_view();

        $data = array(
            'buku_data' => $buku
        );
        $data['breadcrumb']='buku';
    		$data['title']='Olah Data Buku';
        $data['assign_js']='buku/js/index.js';
        load_view('buku/tb_buku_list', $data);
    }

    public function read($id)
    {
        $row = $this->Buku_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_buku' => $row->id_buku,
          		'id_rak' => $row->id_rak,
          		'id_penerbit' => $row->id_penerbit,
          		'nm_buku' => $row->nm_buku,
          		'thn_terbit' => $row->thn_terbit,
          		'nm_penulis' => $row->nm_penulis,
        	  );
            $data['breadcrumb']='buku';
        		$data['title']='Olah Data Buku';
            load_view('buku/tb_buku_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function create()
    {
        $rak = $this->App_model->get_query("SELECT * FROM tb_rak")->result();
        $penerbit = $this->App_model->get_query("SELECT * FROM tb_penerbit")->result();
        $data = array(
            'button' => 'Create',
            'action' => site_url('buku/create_action'),
      	    'id_buku' => set_value('id_buku'),
      	    'id_rak' => set_value('id_rak'),
      	    'id_penerbit' => set_value('id_penerbit'),
      	    'nm_buku' => set_value('nm_buku'),
      	    'thn_terbit' => set_value('thn_terbit'),
      	    'nm_penulis' => set_value('nm_penulis'),
      	);
        $data['rak']=$rak;
        $data['penerbit']=$penerbit;
        $data['breadcrumb']='buku';
        $data['title']='Olah Data Buku';
    		$data['assign_js']='buku/js/index.js';
        load_view('buku/tb_buku_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'id_rak' => $this->input->post('id_rak',TRUE),
          		'id_penerbit' => $this->input->post('id_penerbit',TRUE),
          		'nm_buku' => $this->input->post('nm_buku',TRUE),
          		'thn_terbit' => $this->input->post('thn_terbit',TRUE),
          		'nm_penulis' => $this->input->post('nm_penulis',TRUE),
        	  );
            $this->Buku_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('buku'));
        }
    }

    public function update($id)
    {

        $row = $this->Buku_model->get_by_id($id);
        $rak_row = $this->App_model->get_query("SELECT * FROM tb_rak WHERE id_rak='".$row->id_rak."'")->row();
        $rak = $this->App_model->get_query("SELECT * FROM tb_rak")->result();

        $penerbit_row = $this->App_model->get_query("SELECT * FROM tb_penerbit WHERE id_penerbit='".$row->id_penerbit."'")->row();
        $penerbit = $this->App_model->get_query("SELECT * FROM tb_penerbit")->result();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buku/update_action'),
            		'id_buku' => set_value('id_buku', $row->id_buku),
            		'id_rak' => set_value('id_rak', $row->id_rak),
            		'id_penerbit' => set_value('id_penerbit', $row->id_penerbit),
            		'nm_buku' => set_value('nm_buku', $row->nm_buku),
            		'thn_terbit' => set_value('thn_terbit', $row->thn_terbit),
            		'nm_penulis' => set_value('nm_penulis', $row->nm_penulis),
	          );
            $data['rak']=$rak;
            $data['rak_row']=$rak_row;
            $data['penerbit']=$penerbit;
            $data['penerbit_row']=$penerbit_row;
            $data['breadcrumb']='buku';
            $data['title']='Olah Data Buku';
        		$data['assign_js']='buku/js/index.js';
            load_view('buku/tb_buku_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buku', TRUE));
        } else {
            $data = array(
		'id_rak' => $this->input->post('id_rak',TRUE),
		'id_penerbit' => $this->input->post('id_penerbit',TRUE),
		'nm_buku' => $this->input->post('nm_buku',TRUE),
		'thn_terbit' => $this->input->post('thn_terbit',TRUE),
		'nm_penulis' => $this->input->post('nm_penulis',TRUE),
	    );

            $this->Buku_model->update($this->input->post('id_buku', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('buku'));
        }
    }

    public function delete($id)
    {
        $row = $this->Buku_model->get_by_id($id);

        if ($row) {
            $this->Buku_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('buku'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_rak', 'id rak', 'trim|required');
	$this->form_validation->set_rules('id_penerbit', 'id penerbit', 'trim|required');
	$this->form_validation->set_rules('nm_buku', 'nm buku', 'trim|required');
	$this->form_validation->set_rules('thn_terbit', 'thn terbit', 'trim|required');
	$this->form_validation->set_rules('nm_penulis', 'nm penulis', 'trim|required');

	$this->form_validation->set_rules('id_buku', 'id_buku', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_buku.xls";
        $judul = "tb_buku";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Rak");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Penerbit");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Buku");
	xlsWriteLabel($tablehead, $kolomhead++, "Thn Terbit");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Penulis");

	foreach ($this->Buku_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_rak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_penerbit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_buku);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thn_terbit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_penulis);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-14 13:15:50 */
/* http://harviacode.com */
