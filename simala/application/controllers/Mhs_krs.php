<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs_krs extends CI_Controller
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
          $this->load->model('Mhs_krs_model');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $mhs_krs = $this->app_model->get_all_view_val_krs();

        $data = array(
            'data_mhs_krs' => $mhs_krs
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Validasi KRS';
        $data['assign_js'] = 'mhs_krs/js/index.js';
        load_view('mhs_krs/tb_mhs_krs_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mhs_krs_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_krs' => $row->id_krs,
        		'id_mhs' => $row->id_mhs,
        		'kode_pembayaran' => $row->kode_pembayaran,
        		'id_kurikulum' => $row->id_kurikulum,
        		'status_ambil' => $row->status_ambil,
        		'status_cek' => $row->status_cek,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Validasi KRS';
            $data['assign_js'] = 'mhs_krs/js/index.js';
            load_view('mhs_krs/tb_mhs_krs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_krs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mhs_krs/create_action'),
      	    'id_krs' => set_value('id_krs'),
      	    'id_mhs' => set_value('id_mhs'),
      	    'kode_pembayaran' => set_value('kode_pembayaran'),
      	    'id_kurikulum' => set_value('id_kurikulum'),
      	    'status_ambil' => set_value('status_ambil'),
      	    'status_cek' => set_value('status_cek'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Validasi KRS';
        $data['assign_js'] = 'mhs_krs/js/index.js';
        load_view('mhs_krs/tb_mhs_krs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'kode_pembayaran' => $this->input->post('kode_pembayaran',TRUE),
        		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
        		'status_ambil' => $this->input->post('status_ambil',TRUE),
        		'status_cek' => $this->input->post('status_cek',TRUE),
        	  );

            $this->Mhs_krs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mhs_krs'));
        }
    }

    public function update($id)
    {
        $row = $this->Mhs_krs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mhs_krs/update_action'),
            		'id_krs' => set_value('id_krs', $row->id_krs),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            		'kode_pembayaran' => set_value('kode_pembayaran', $row->kode_pembayaran),
            		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
            		'status_ambil' => set_value('status_ambil', $row->status_ambil),
            		'status_cek' => set_value('status_cek', $row->status_cek),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Validasi KRS';
            $data['assign_js'] = 'mhs_krs/js/index.js';
            load_view('mhs_krs/tb_mhs_krs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_krs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_krs', TRUE));
        } else {
            $data = array(
        		'id_mhs' => $this->input->post('id_mhs',TRUE),
        		'kode_pembayaran' => $this->input->post('kode_pembayaran',TRUE),
        		'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
        		'status_ambil' => $this->input->post('status_ambil',TRUE),
        		'status_cek' => $this->input->post('status_cek',TRUE),
        	  );

            $this->Mhs_krs_model->update($this->input->post('id_krs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mhs_krs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mhs_krs_model->get_by_id($id);

        if ($row) {
            $this->Mhs_krs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mhs_krs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mhs_krs'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
	$this->form_validation->set_rules('kode_pembayaran', 'kode pembayaran', 'trim|required');
	$this->form_validation->set_rules('id_kurikulum', 'id kurikulum', 'trim|required');
	$this->form_validation->set_rules('status_ambil', 'status ambil', 'trim|required');
	$this->form_validation->set_rules('status_cek', 'status cek', 'trim|required');

	$this->form_validation->set_rules('id_krs', 'id_krs', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mhs_krs.xls";
        $judul = "tb_mhs_krs";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kurikulum");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Ambil");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Cek");

	foreach ($this->Mhs_krs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mhs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pembayaran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kurikulum);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_ambil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_cek);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mhs_krs.doc");

        $data = array(
            'tb_mhs_krs_data' => $this->Mhs_krs_model->get_all(),
            'start' => 0
        );

        load_view('mhs_krs/tb_mhs_krs_doc',$data);
    }

    public function konfirmasi($id_krs,$nim)
    {
      $data = array(
          'status_ambil' => 'Y'
      );
      $this->Mhs_krs_model->update($id_krs, $data);
      $dataUser = array(
        'id_user' => NULL,
        'id_krs' => $id_krs,
        'username' => $nim,
        'password' => $nim,
        'level' =>'mhs',
        'val_periode' => 'Y'
      );
      $insertUser= $this->app_model->insertRecord('login_mhs',$dataUser);
      if ($insertUser==true) {
        $this->session->set_flashdata('message', 'Validasi Data Berhasil');
        redirect(site_url('mhs_krs'));
      }
      else {
        $this->session->set_flashdata('message', 'Gagal Validasi');
        redirect(site_url('mhs_krs'));
      }
    }

}
