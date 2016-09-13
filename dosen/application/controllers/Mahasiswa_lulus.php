<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_lulus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'dosen'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Mahasiswa_lulus_model');
          $this->load->model('App_model','app_model');
          $this->load->model('Jenis_keluar_model','jenis_keluar');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $mahasiswa_lulus = $this->app_model->get_all_view("v_mhs_lulus");

        $data = array(
            'mahasiswa_lulus_data' => $mahasiswa_lulus
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mahasiswa Lulus';
        $data['assign_js'] = 'mahasiswa_lulus/js/index.js';
        load_view('mahasiswa_lulus/tb_mhs_lulus_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mahasiswa_lulus_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_mhs' => $row->id_mhs,
        		'id_jns_keluar' => $row->id_jns_keluar,
        		'tgl_keluar' => $row->tgl_keluar,
        		'jalur_skripsi' => $row->jalur_skripsi,
        		'judul_skripsi' => $row->judul_skripsi,
        		'bln_awal_bim' => $row->bln_awal_bim,
        		'bln_akhir_bim' => $row->bln_akhir_bim,
        		'sk_yudisium' => $row->sk_yudisium,
        		'tgl_yudisium' => $row->tgl_yudisium,
        		'IPK' => $row->IPK,
        		'no_ijazah' => $row->no_ijazah,
        		'ket' => $row->ket,
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mahasiswa Lulus';
            $data['assign_js'] = 'mahasiswa_lulus/js/index.js';
            load_view('mahasiswa_lulus/tb_mhs_lulus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_lulus'));
        }
    }

    public function create()
    {
        $jenis_keluar = $this->jenis_keluar->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa_lulus/create_action'),
      	    'id_mhs' => set_value('id_mhs'),
      	    'id_jns_keluar' => set_value('id_jns_keluar'),
      	    'tgl_keluar' => set_value('tgl_keluar'),
      	    'jalur_skripsi' => set_value('jalur_skripsi'),
      	    'judul_skripsi' => set_value('judul_skripsi'),
      	    'bln_awal_bim' => set_value('bln_awal_bim'),
      	    'bln_akhir_bim' => set_value('bln_akhir_bim'),
      	    'sk_yudisium' => set_value('sk_yudisium'),
      	    'tgl_yudisium' => set_value('tgl_yudisium'),
      	    'IPK' => set_value('IPK'),
      	    'no_ijazah' => set_value('no_ijazah'),
      	    'ket' => set_value('ket'),
      	);
        $data['jenis_keluar']=$jenis_keluar;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Mahasiswa Lulus';
        $data['assign_js'] = 'mahasiswa_lulus/js/index.js';
        load_view('mahasiswa_lulus/tb_mhs_lulus_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id_mhs' => $this->input->post('id_mhs',TRUE),
          		'id_jns_keluar' => $this->input->post('id_jns_keluar',TRUE),
          		'tgl_keluar' => $this->input->post('tgl_keluar',TRUE),
          		'jalur_skripsi' => $this->input->post('jalur_skripsi',TRUE),
          		'judul_skripsi' => $this->input->post('judul_skripsi',TRUE),
          		'bln_awal_bim' => $this->input->post('bln_awal_bim',TRUE),
          		'bln_akhir_bim' => $this->input->post('bln_akhir_bim',TRUE),
          		'sk_yudisium' => $this->input->post('sk_yudisium',TRUE),
          		'tgl_yudisium' => $this->input->post('tgl_yudisium',TRUE),
          		'IPK' => $this->input->post('IPK',TRUE),
          		'no_ijazah' => $this->input->post('no_ijazah',TRUE),
          		'ket' => $this->input->post('ket',TRUE),
          	);

            $this->mahasiswa->update($this->input->post('id_mhs',TRUE),$data_mhs);
            $data_mhs = array('status_mhs' => '3');
            $this->Mahasiswa_lulus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa_lulus'));
        }
    }

    public function update($id)
    {
        $row = $this->Mahasiswa_lulus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa_lulus/update_action'),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            		'tgl_keluar' => set_value('tgl_keluar', $row->tgl_keluar),
            		'jalur_skripsi' => set_value('jalur_skripsi', $row->jalur_skripsi),
            		'judul_skripsi' => set_value('judul_skripsi', $row->judul_skripsi),
            		'bln_awal_bim' => set_value('bln_awal_bim', $row->bln_awal_bim),
            		'bln_akhir_bim' => set_value('bln_akhir_bim', $row->bln_akhir_bim),
            		'sk_yudisium' => set_value('sk_yudisium', $row->sk_yudisium),
            		'tgl_yudisium' => set_value('tgl_yudisium', $row->tgl_yudisium),
            		'IPK' => set_value('IPK', $row->IPK),
            		'no_ijazah' => set_value('no_ijazah', $row->no_ijazah),
            		'ket' => set_value('ket', $row->ket),
        	  );
            $jenis_keluar = $this->jenis_keluar->get_all();
            $data['jenis_keluar']=$jenis_keluar;
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Mahasiswa Lulus';
            $data['assign_js'] = 'mahasiswa_lulus/js/index.js';
            load_view('mahasiswa_lulus/tb_mhs_lulus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_lulus'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mhs', TRUE));
        } else {
            $data = array(
          		'id_jns_keluar' => $this->input->post('id_jns_keluar',TRUE),
          		'tgl_keluar' => $this->input->post('tgl_keluar',TRUE),
          		'jalur_skripsi' => $this->input->post('jalur_skripsi',TRUE),
          		'judul_skripsi' => $this->input->post('judul_skripsi',TRUE),
          		'bln_awal_bim' => $this->input->post('bln_awal_bim',TRUE),
          		'bln_akhir_bim' => $this->input->post('bln_akhir_bim',TRUE),
          		'sk_yudisium' => $this->input->post('sk_yudisium',TRUE),
          		'tgl_yudisium' => $this->input->post('tgl_yudisium',TRUE),
          		'IPK' => $this->input->post('IPK',TRUE),
          		'no_ijazah' => $this->input->post('no_ijazah',TRUE),
          		'ket' => $this->input->post('ket',TRUE),
          	);

            $this->Mahasiswa_lulus_model->update($this->input->post('id_mhs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa_lulus'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mahasiswa_lulus_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_lulus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa_lulus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa_lulus'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('id_jns_keluar', 'id jns keluar', 'trim|required');
      	$this->form_validation->set_rules('tgl_keluar', 'tgl keluar', 'trim|required');
      	$this->form_validation->set_rules('jalur_skripsi', 'jalur skripsi', 'trim|required');
      	$this->form_validation->set_rules('judul_skripsi', 'judul skripsi', 'trim|required');
      	$this->form_validation->set_rules('bln_awal_bim', 'bln awal bim', 'trim');
      	$this->form_validation->set_rules('bln_akhir_bim', 'bln akhir bim', 'trim');
      	$this->form_validation->set_rules('sk_yudisium', 'sk yudisium', 'trim');
      	$this->form_validation->set_rules('tgl_yudisium', 'tgl yudisium', 'trim');
      	$this->form_validation->set_rules('IPK', 'ipk', 'trim|required');
      	$this->form_validation->set_rules('no_ijazah', 'no ijazah', 'trim|required');
      	$this->form_validation->set_rules('ket', 'ket', 'trim');

      	$this->form_validation->set_rules('id_mhs', 'id_mhs', 'trim|required');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mhs_lulus.xls";
        $judul = "tb_mhs_lulus";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Periode Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Keluar");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Keluar");
        xlsWriteLabel($tablehead, $kolomhead++, "Judul Skripsi");
        xlsWriteLabel($tablehead, $kolomhead++, "Bulan Awal Bimbingan");
        xlsWriteLabel($tablehead, $kolomhead++, "Bulan Akhir Bimbingan");
        xlsWriteLabel($tablehead, $kolomhead++, "SK Yudisium");
        xlsWriteLabel($tablehead, $kolomhead++, "IPK");
        xlsWriteLabel($tablehead, $kolomhead++, "No. Ijazah");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

      	foreach ($this->app_model->get_all_view("v_mhs_lulus") as $key) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $key->nim);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_mhs);
            xlsWriteLabel($tablebody, $kolombody++, $key->tpt_lhr);
            xlsWriteLabel($tablebody, $kolombody++, $key->tgl_lahir);
            xlsWriteLabel($tablebody, $kolombody++, $key->jenkel);
            xlsWriteLabel($tablebody, $kolombody++, $key->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $key->tgl_masuk);
            xlsWriteLabel($tablebody, $kolombody++, $key->smt_masuk);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_jenis_keluar);
            xlsWriteLabel($tablebody, $kolombody++, $key->tgl_keluar);
            xlsWriteLabel($tablebody, $kolombody++, $key->judul_skripsi);
            xlsWriteLabel($tablebody, $kolombody++, $key->bln_awal_bim);
            xlsWriteLabel($tablebody, $kolombody++, $key->bln_akhir_bim);
            xlsWriteLabel($tablebody, $kolombody++, $key->sk_yudisium);
            xlsWriteLabel($tablebody, $kolombody++, $key->IPK);
            xlsWriteLabel($tablebody, $kolombody++, $key->no_ijazah);
            xlsWriteLabel($tablebody, $kolombody++, $key->ket);
      	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mhs_lulus.doc");

        $data = array(
            'tb_mhs_lulus_data' => $this->Mahasiswa_lulus_model->get_all(),
            'start' => 0
        );

        load_view('mahasiswa_lulus/tb_mhs_lulus_doc',$data);
    }

}
