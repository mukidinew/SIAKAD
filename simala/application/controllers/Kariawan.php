<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kariawan extends CI_Controller
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
          $this->load->model('Kariawan_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $kariawan = $this->Kariawan_model->get_all();
        $data = array(
            'kariawan_data' => $kariawan
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Kariawan';
        $data['assign_js'] = 'kariawan/js/index.js';
        load_view('kariawan/tb_kariawan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'nik' => $row->nik,
          		'nama' => $row->nama,
          		'jen_kel' => $row->jen_kel,
          		'tmp_lahir' => $row->tmp_lahir,
          		'tgl_lahir' => $row->tgl_lahir,
          		'agama' => $row->agama,
          		'jabatan' => $row->jabatan,
          		'alamat' => $row->alamat,
          		'no_hp' => $row->no_hp,
          		'email' => $row->email,
          		's1_nm_sklh' => $row->s1_nm_sklh,
          		's1_jur' => $row->s1_jur,
          		's1_thn_lulus' => $row->s1_thn_lulus,
          		's1_kota' => $row->s1_kota,
          		's2_nm_sklh' => $row->s2_nm_sklh,
          		's2_jur' => $row->s2_jur,
          		's2_thn_lulus' => $row->s2_thn_lulus,
          		's2_kota' => $row->s2_kota,
          		's3_nm_sklh' => $row->s3_nm_sklh,
          		's3_jur' => $row->s3_jur,
          		's3_thn_lulus' => $row->s3_thn_lulus,
          		's3_kota' => $row->s3_kota
      	    );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Kariawan';
            $data['assign_js'] = 'kariawan/js/index.js';
            load_view('kariawan/tb_kariawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kariawan/create_action'),
      	    'nik' => set_value('nik'),
      	    'nama' => set_value('nama'),
      	    'jen_kel' => set_value('jen_kel'),
      	    'tmp_lahir' => set_value('tmp_lahir'),
      	    'tgl_lahir' => set_value('tgl_lahir'),
      	    'agama' => set_value('agama'),
      	    'jabatan' => set_value('jabatan'),
      	    'alamat' => set_value('alamat'),
      	    'no_hp' => set_value('no_hp'),
      	    'email' => set_value('email'),
      	    's1_nm_sklh' => set_value('s1_nm_sklh'),
      	    's1_jur' => set_value('s1_jur'),
      	    's1_thn_lulus' => set_value('s1_thn_lulus'),
      	    's1_kota' => set_value('s1_kota'),
      	    's2_nm_sklh' => set_value('s2_nm_sklh'),
      	    's2_jur' => set_value('s2_jur'),
      	    's2_thn_lulus' => set_value('s2_thn_lulus'),
      	    's2_kota' => set_value('s2_kota'),
      	    's3_nm_sklh' => set_value('s3_nm_sklh'),
      	    's3_jur' => set_value('s3_jur'),
      	    's3_thn_lulus' => set_value('s3_thn_lulus'),
      	    's3_kota' => set_value('s3_kota'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Kariawan';
        $data['assign_js'] = 'kariawan/js/index.js';
        load_view('kariawan/tb_kariawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'nama' => $this->input->post('nama',TRUE),
          		'jen_kel' => $this->input->post('jen_kel',TRUE),
          		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
          		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
          		'agama' => $this->input->post('agama',TRUE),
          		'jabatan' => $this->input->post('jabatan',TRUE),
          		'alamat' => $this->input->post('alamat',TRUE),
          		'no_hp' => $this->input->post('no_hp',TRUE),
          		'email' => $this->input->post('email',TRUE),
          		's1_nm_sklh' => $this->input->post('s1_nm_sklh',TRUE),
          		's1_jur' => $this->input->post('s1_jur',TRUE),
          		's1_thn_lulus' => $this->input->post('s1_thn_lulus',TRUE),
          		's1_kota' => $this->input->post('s1_kota',TRUE),
          		's2_nm_sklh' => $this->input->post('s2_nm_sklh',TRUE),
          		's2_jur' => $this->input->post('s2_jur',TRUE),
          		's2_thn_lulus' => $this->input->post('s2_thn_lulus',TRUE),
          		's2_kota' => $this->input->post('s2_kota',TRUE),
          		's3_nm_sklh' => $this->input->post('s3_nm_sklh',TRUE),
          		's3_jur' => $this->input->post('s3_jur',TRUE),
          		's3_thn_lulus' => $this->input->post('s3_thn_lulus',TRUE),
          		's3_kota' => $this->input->post('s3_kota',TRUE)
        	  );

            $this->Kariawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kariawan'));
        }
    }

    public function update($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kariawan/update_action'),
            		'nik' => set_value('nik', $row->nik),
            		'nama' => set_value('nama', $row->nama),
            		'jen_kel' => set_value('jen_kel', $row->jen_kel),
            		'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
            		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
            		'agama' => set_value('agama', $row->agama),
            		'jabatan' => set_value('jabatan', $row->jabatan),
            		'alamat' => set_value('alamat', $row->alamat),
            		'no_hp' => set_value('no_hp', $row->no_hp),
            		'email' => set_value('email', $row->email),
            		's1_nm_sklh' => set_value('s1_nm_sklh', $row->s1_nm_sklh),
            		's1_jur' => set_value('s1_jur', $row->s1_jur),
            		's1_thn_lulus' => set_value('s1_thn_lulus', $row->s1_thn_lulus),
            		's1_kota' => set_value('s1_kota', $row->s1_kota),
            		's2_nm_sklh' => set_value('s2_nm_sklh', $row->s2_nm_sklh),
            		's2_jur' => set_value('s2_jur', $row->s2_jur),
            		's2_thn_lulus' => set_value('s2_thn_lulus', $row->s2_thn_lulus),
            		's2_kota' => set_value('s2_kota', $row->s2_kota),
            		's3_nm_sklh' => set_value('s3_nm_sklh', $row->s3_nm_sklh),
            		's3_jur' => set_value('s3_jur', $row->s3_jur),
            		's3_thn_lulus' => set_value('s3_thn_lulus', $row->s3_thn_lulus),
            		's3_kota' => set_value('s3_kota', $row->s3_kota)
            	  );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Kariawan';
            $data['assign_js'] = 'kariawan/js/index.js';
            load_view('kariawan/tb_kariawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik', TRUE));
        } else {
            $data = array(
          		'nama' => $this->input->post('nama',TRUE),
          		'jen_kel' => $this->input->post('jen_kel',TRUE),
          		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
          		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
          		'agama' => $this->input->post('agama',TRUE),
          		'jabatan' => $this->input->post('jabatan',TRUE),
          		'alamat' => $this->input->post('alamat',TRUE),
          		'no_hp' => $this->input->post('no_hp',TRUE),
          		'email' => $this->input->post('email',TRUE),
          		's1_nm_sklh' => $this->input->post('s1_nm_sklh',TRUE),
          		's1_jur' => $this->input->post('s1_jur',TRUE),
          		's1_thn_lulus' => $this->input->post('s1_thn_lulus',TRUE),
          		's1_kota' => $this->input->post('s1_kota',TRUE),
          		's2_nm_sklh' => $this->input->post('s2_nm_sklh',TRUE),
          		's2_jur' => $this->input->post('s2_jur',TRUE),
          		's2_thn_lulus' => $this->input->post('s2_thn_lulus',TRUE),
          		's2_kota' => $this->input->post('s2_kota',TRUE),
          		's3_nm_sklh' => $this->input->post('s3_nm_sklh',TRUE),
          		's3_jur' => $this->input->post('s3_jur',TRUE),
          		's3_thn_lulus' => $this->input->post('s3_thn_lulus',TRUE),
          		's3_kota' => $this->input->post('s3_kota',TRUE),
          	);

            $this->Kariawan_model->update($this->input->post('nik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kariawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kariawan_model->get_by_id($id);

        if ($row) {
            $this->Kariawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kariawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kariawan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('jen_kel', 'jen kel', 'trim|required');
    	$this->form_validation->set_rules('tmp_lahir', 'tmp lahir', 'trim|required');
    	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
    	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
    	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
    	$this->form_validation->set_rules('email', 'email', 'trim|required');
    	$this->form_validation->set_rules('s1_nm_sklh', 's1 nm sklh', 'trim|required');
    	$this->form_validation->set_rules('s1_jur', 's1 jur', 'trim|required');
    	$this->form_validation->set_rules('s1_thn_lulus', 's1 thn lulus', 'trim|required');
    	$this->form_validation->set_rules('s1_kota', 's1 kota', 'trim|required');
    	$this->form_validation->set_rules('s2_nm_sklh', 's2 nm sklh', 'trim|required');
    	$this->form_validation->set_rules('s2_jur', 's2 jur', 'trim|required');
    	$this->form_validation->set_rules('s2_thn_lulus', 's2 thn lulus', 'trim|required');
    	$this->form_validation->set_rules('s2_kota', 's2 kota', 'trim|required');
    	$this->form_validation->set_rules('s3_nm_sklh', 's3 nm sklh', 'trim|required');
    	$this->form_validation->set_rules('s3_jur', 's3 jur', 'trim|required');
    	$this->form_validation->set_rules('s3_thn_lulus', 's3 thn lulus', 'trim|required');
    	$this->form_validation->set_rules('s3_kota', 's3 kota', 'trim|required');

    	$this->form_validation->set_rules('nik', 'nik', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kariawan.xls";
        $judul = "tb_kariawan";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
      	xlsWriteLabel($tablehead, $kolomhead++, "Jen Kel");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Lahir");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
      	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
      	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
      	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
      	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
      	xlsWriteLabel($tablehead, $kolomhead++, "Email");
      	xlsWriteLabel($tablehead, $kolomhead++, "S1 Nm Sklh");
      	xlsWriteLabel($tablehead, $kolomhead++, "S1 Jur");
      	xlsWriteLabel($tablehead, $kolomhead++, "S1 Thn Lulus");
      	xlsWriteLabel($tablehead, $kolomhead++, "S1 Kota");
      	xlsWriteLabel($tablehead, $kolomhead++, "S2 Nm Sklh");
      	xlsWriteLabel($tablehead, $kolomhead++, "S2 Jur");
      	xlsWriteLabel($tablehead, $kolomhead++, "S2 Thn Lulus");
      	xlsWriteLabel($tablehead, $kolomhead++, "S2 Kota");
      	xlsWriteLabel($tablehead, $kolomhead++, "S3 Nm Sklh");
      	xlsWriteLabel($tablehead, $kolomhead++, "S3 Jur");
      	xlsWriteLabel($tablehead, $kolomhead++, "S3 Thn Lulus");
      	xlsWriteLabel($tablehead, $kolomhead++, "S3 Kota");

      	foreach ($this->Kariawan_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->jen_kel);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_lahir);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
          	    xlsWriteNumber($tablebody, $kolombody++, $data->agama);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s1_nm_sklh);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s1_jur);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s1_thn_lulus);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s1_kota);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s2_nm_sklh);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s2_jur);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s2_thn_lulus);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s2_kota);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s3_nm_sklh);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s3_jur);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s3_thn_lulus);
          	    xlsWriteLabel($tablebody, $kolombody++, $data->s3_kota);
          	    $tablebody++;
                $nourut++;
          }
          xlsEOF();
          exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kariawan.doc");
        $data = array(
            'tb_kariawan_data' => $this->Kariawan_model->get_all(),
            'start' => 0
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Kariawan';
        $data['assign_js'] = 'kariawan/js/index.js';
        load_view('kariawan/tb_kariawan_doc',$data);
    }

}

/* End of file Kariawan.php */
/* Location: ./application/controllers/Kariawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-09 21:38:35 */
/* http://harviacode.com */
