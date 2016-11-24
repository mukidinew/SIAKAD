<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
          $this->load->model('App_model');
          $this->load->model('Jadwal_model');
          $this->load->model('kurikulum_model','kurikulum');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $jadwal = $this->App_model->get_query("SELECT * FROM v_jadwal")->result();
        $kurikulum_data = $this->kurikulum->get_all($this->session->userdata('level_prodi'));

        $data = array(
            'jadwal_data' => $jadwal
        );
        $data['kurikulum_data'] = $kurikulum_data;
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Jadwal Perkuliahan';
        $data['assign_js'] = 'jadwal/js/index.js';
        load_view('jadwal/tb_jadwal_list', $data);
    }

    public function read($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_jadwal' => $row->id_jadwal,
              'id_kelas_dosen' => $row->id_kelas_dosen,
          		'id_kurikulum' => $row->id_kurikulum,
          		'id_ruang' => $row->id_ruang,
          		'nm_jam' => $row->nm_jam,
          		'nm_hari' => $row->nm_hari,
      	    );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Jadwal Perkuliahan';
            $data['assign_js'] = 'jadwal/js/index.js';
            load_view('jadwal/tb_jadwal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jadwal/create_action'),
      	    'id_jadwal' => set_value('id_jadwal'),
            'id_kurikulum' => set_value('id_kurikulum'),
      	    'id_kelas_dosen' => set_value('id_kelas_dosen'),
      	    'id_ruang' => set_value('id_ruang'),
      	    'nm_jam' => set_value('nm_jam'),
      	    'nm_hari' => set_value('nm_hari'),
	      );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Jadwal Perkuliahan';
        $data['assign_js'] = 'jadwal/js/index.js';
        load_view('jadwal/tb_jadwal_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
          		'id_kelas_dosen' => $this->input->post('id_kelas_dosen',TRUE),
              'id_ruang' => $this->input->post('id_ruang',TRUE),
          		'nm_jam' => $this->input->post('nm_jam',TRUE),
          		'nm_hari' => $this->input->post('nm_hari',TRUE),
        	  );

            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function update($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
              'button' => 'Update',
              'action' => site_url('jadwal/update_action'),
          		'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
              'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
          		'id_kelas_dosen' => set_value('id_kelas_dosen', $row->id_kelas_dosen),
              'id_ruang' => set_value('id_ruang', $row->id_ruang),
          		'nm_jam' => set_value('nm_jam', $row->nm_jam),
          		'nm_hari' => set_value('nm_hari', $row->nm_hari),
        	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Jadwal Perkuliahan';
            $data['assign_js'] = 'jadwal/js/index.js';
            load_view('jadwal/tb_jadwal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } else {
            $data = array(
              'id_kurikulum' => $this->input->post('id_kurikulum',TRUE),
          		'id_kelas_dosen' => $this->input->post('id_kelas_dosen',TRUE),
              'id_ruang' => $this->input->post('id_ruang',TRUE),
          		'nm_jam' => $this->input->post('nm_jam',TRUE),
          		'nm_hari' => $this->input->post('nm_hari',TRUE),
        	  );

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jadwal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jadwal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_kelas_dosen', 'id kelas dosen', 'trim|required');
      $this->form_validation->set_rules('id_ruang', 'id ruang', 'trim|required');
    	$this->form_validation->set_rules('id_kurikulum', 'id Kurikulum', 'trim|required');
    	$this->form_validation->set_rules('nm_jam', 'nm jam', 'trim|required');
    	$this->form_validation->set_rules('nm_hari', 'nm hari', 'trim|required');

    	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel($a='')
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_jadwal.xls";
        $judul = "v_jadwal";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Hari");
      	xlsWriteLabel($tablehead, $kolomhead++, "Jam");
      	xlsWriteLabel($tablehead, $kolomhead++, "Kode Mata Kuliah");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mata Kuliah");
        xlsWriteLabel($tablehead, $kolomhead++, "SKS");
        xlsWriteLabel($tablehead, $kolomhead++, "PS/SMT");
        xlsWriteLabel($tablehead, $kolomhead++, "Dosen Penanggung Jawab");
      	xlsWriteLabel($tablehead, $kolomhead++, "Ruangan");

        $data_excel = $this->App_model->get_query("SELECT * FROM v_jadwal WHERE id_kurikulum='".$a."'")->result();
      	foreach ($data_excel as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteLabel($tablebody, $kolombody++, $data->nm_hari);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_jam);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_mk);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_mk);
            xlsWriteNumber($tablebody, $kolombody++, $data->sks);
            xlsWritelabel($tablebody, $kolombody++, $data->nm_kelas);
            xlsWritelabel($tablebody, $kolombody++, $data->nm_dosen);
      	    xlsWritelabel($tablebody, $kolombody++, $data->nm_ruangan);

	          $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function get_jadwal($a='')
    {
      $data_jadwal_kur = $this->App_model->get_query("SELECT * FROM v_jadwal WHERE id_kurikulum='".$a."' AND kd_prodi='".$this->session->userdata('level_prodi')."'")->result();
      $data['jadwal_data'] = $data_jadwal_kur;
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Olah Data Jadwal Perkuliahan';
      $data['assign_js'] = 'jadwal/js/index.js';
      load_view('jadwal/tb_jadwal_list_result', $data);
    }
}
