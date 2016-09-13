<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'mhs'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Nilai_model');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $nilai = $this->app_model->get_all_view_nilai();

        $data = array(
            'nilai_data' => $nilai
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Nilai';
        $data['assign_js'] = 'nilai/js/index.js';
        load_view('nilai/tb_nilai_list', $data);
    }

    public function read($id)
    {
        $row = $this->Nilai_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_nilai' => $row->id_nilai,
        		'id_krs' => $row->id_krs,
        		'nilai_angka' => $row->nilai_angka,
        		'nilai_index' => $row->nilai_index,
        		'nilai_huruf' => $row->nilai_huruf,
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Masukan Data Nilai';
            $data['assign_js'] = 'nilai/js/index.js';
            load_view('nilai/tb_nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai/create_action'),
      	    'id_nilai' => set_value('id_nilai'),
      	    'id_krs' => set_value('id_krs'),
      	    'nilai_angka' => set_value('nilai_angka'),
      	    'nilai_index' => set_value('nilai_index'),
      	    'nilai_huruf' => set_value('nilai_huruf'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Dosen';
        $data['assign_js'] = 'nilai/js/index.js';
        load_view('nilai/tb_nilai_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_krs' => $this->input->post('id_krs',TRUE),
        		'nilai_angka' => $this->input->post('nilai_angka',TRUE),
        		'nilai_index' => $this->input->post('nilai_index',TRUE),
        		'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
        	  );

            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai'));
        }
    }

    public function update($id)
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai/update_action'),
            		'id_nilai' => set_value('id_nilai', $row->id_nilai),
            		'id_krs' => set_value('id_krs', $row->id_krs),
            		'nilai_angka' => set_value('nilai_angka', $row->nilai_angka),
            		'nilai_index' => set_value('nilai_index', $row->nilai_index),
            		'nilai_huruf' => set_value('nilai_huruf', $row->nilai_huruf),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Dosen';
            $data['assign_js'] = 'nilai/js/index.js';
            load_view('nilai/tb_nilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai', TRUE));
        } else {
            $data = array(
        		'id_krs' => $this->input->post('id_krs',TRUE),
        		'nilai_angka' => $this->input->post('nilai_angka',TRUE),
        		'nilai_index' => $this->input->post('nilai_index',TRUE),
        		'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
        	  );
            $this->Nilai_model->update($this->input->post('id_nilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai'));
        }
    }

    public function delete($id)
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $this->Nilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_krs', 'id krs', 'trim|required');
	$this->form_validation->set_rules('nilai_angka', 'nilai angka', 'trim|required');
	$this->form_validation->set_rules('nilai_index', 'nilai index', 'trim|required');
	$this->form_validation->set_rules('nilai_huruf', 'nilai huruf', 'trim|required');

	$this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_nilai.xls";
        $judul = "tb_nilai";
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
        xlsWriteLabel($tablehead, $kolomhead++, "NIM");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Mahasiswa");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Mata Kuliah");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Mata Kuliah");
        xlsWriteLabel($tablehead, $kolomhead++, "Periode");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Angka");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Index");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Huruf");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Prodi");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Prodi");


	foreach ($this->app_model->get_all_view_nilai() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nim);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_mhs);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_mk);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_mk);
            xlsWriteLabel($tablebody, $kolombody++, $data->ta);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_kelas);
            xlsWriteLabel($tablebody, $kolombody++, $data->nilai_angka);
            xlsWriteLabel($tablebody, $kolombody++, $data->nilai_index);
            xlsWriteLabel($tablebody, $kolombody++, $data->nilai_huruf);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_prodi);
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_prodi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_nilai.doc");

        $data = array(
            'tb_nilai_data' => $this->Nilai_model->get_all(),
            'start' => 0
        );

        load_view('nilai/tb_nilai_doc',$data);
    }

    public function get_data_krs($value='')
    {
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $data_krs = $this->app_model->get_query("SELECT * FROM v_data_krs")->result();
      }
      else {
        $data_krs = $this->app_model->get_limit_data_krs('v_data_krs',$page,0,$cari);
      }

      $temps = array();
      foreach ($data_krs as $key) {
        $temps[] = array(
          'id_data_krs' => $key->id_data_krs,
          'nim' => $key->nim,
          'nm_mhs' => $key->nm_mhs,
          'id_matkul' => $key->id_matkul,
          'nm_mk' => $key->nm_mk,
          'nm_kelas' => $key->nm_kelas,
          'ta' => $key->ta,
          'nm_prodi' => $key->nm_prodi
        );
      }
      echo json_encode($temps);
    }
    public function transkrip_nilai()
    {
      $this->load->library('fpdf_gen');
      $nim = $this->input->post('nim_tr');
      $data_nilai = $this->app_model->get_query("SELECT * FROM v_nilai WHERE nim='".$nim."'")->result();
      $data['nilai_data'] = $data_nilai;

      $data_mhs = $this->app_model->get_view_by_id('v_mhs_aktif','nim',$nim);
      $data['nim'] = $data_mhs->nim;
      $data['nm_mhs'] =$data_mhs->nm_mhs;
      $data['tpt_lhr'] =$data_mhs->tpt_lhr;
      $data['nm_prodi'] =$data_mhs->nm_prodi;
      //$data['tgl_lhr'] =$data_mhs->tgl_lhr;

      $data['assign_css'] = 'nilai/css/app.css';
      $data['assign_js'] = 'nilai/js/index.js';
      load_pdf('nilai/lap_transkrip_nilai', $data);

      $html = $this->output->get_output();
      $this->dompdf->set_paper('A4', 'potrait');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("testing.pdf",array('Attachment'=>0));
    }
}
