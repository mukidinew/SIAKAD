<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
          $this->load->model('Mahasiswa_model');
          $this->load->model('Agama_model','agama');
          $this->load->model('Prodi_model','prodi');
          $this->load->model('Status_mhs_model','status');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $mahasiswa = $this->Mahasiswa_model->get_all();
        $data['mahasiswa_data'] = $mahasiswa;
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Mahasiswa';
    		$data['assign_js'] = 'mahasiswa/js/index.js';
        load_view('mahasiswa/tb_mhs_list', $data);
    }

    public function read($id){
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
          $data = array(
          		'nim' => $row->nim,
          		'nm_mhs' => $row->nm_mhs,
          		'tpt_lhr' => $row->tpt_lhr,
          		'tgl_lahir' => $row->tgl_lahir,
          		'jenkel' => $row->jenkel,
          		'agama' => $row->agama,
          		'kelurahan' => $row->kelurahan,
          		'wilayah' => $row->wilayah,
          		'nm_ibu' => $row->nm_ibu,
          		'kd_prodi' => $row->kd_prodi,
          		'tgl_masuk' => $row->tgl_masuk,
          		'smt_masuk' => $row->smt_masuk,
          		'status_mhs' => $row->status_mhs,
          		'status_awal' => $row->status_awal,
          		'email' => $row->email,
        	);
          $data['site_title'] = 'SIMALA';
      		$data['title_page'] = 'Olah Data Mahasiswa';
      		$data['assign_js'] = 'mahasiswa/js/index.js';
          load_view('mahasiswa/tb_mhs_read', $data);
        }
        else{
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
      	    'nim' => set_value('nim'),
      	    'nm_mhs' => set_value('nm_mhs'),
      	    'tpt_lhr' => set_value('tpt_lhr'),
      	    'tgl_lahir' => set_value('tgl_lahir'),
      	    'jenkel' => set_value('jenkel'),
      	    'agama' => set_value('agama'),
      	    'kelurahan' => set_value('kelurahan'),
      	    'wilayah' => set_value('wilayah'),
      	    'nm_ibu' => set_value('nm_ibu'),
      	    'kd_prodi' => set_value('kd_prodi'),
      	    'tgl_masuk' => set_value('tgl_masuk'),
      	    'smt_masuk' => set_value('smt_masuk'),
      	    'status_mhs' => set_value('status_mhs'),
      	    'status_awal' => set_value('status_awal'),
      	    'email' => set_value('email'),
      	);

        $agama = $this->agama->get_all();
        $prodi = $this->prodi->get_all();
        $status_mhs = $this->status->get_all();
        $data['agama'] = $agama;
        $data['prodi'] = $prodi;
        $data['status_mahasiswa'] = $status_mhs;
        $data['site_title'] = 'SIMALA';
    		$data['title_page'] = 'Olah Data Mahasiswa';
    		$data['assign_js'] = 'mahasiswa/js/index.js';
        load_view('mahasiswa/tb_mhs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nim' => $this->input->post('nim',TRUE),
        		'nm_mhs' => $this->input->post('nm_mhs',TRUE),
        		'tpt_lhr' => $this->input->post('tpt_lhr',TRUE),
        		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
        		'jenkel' => $this->input->post('jenkel',TRUE),
        		'agama' => $this->input->post('agama',TRUE),
        		'kelurahan' => $this->input->post('kelurahan',TRUE),
        		'wilayah' => $this->input->post('wilayah',TRUE),
        		'nm_ibu' => $this->input->post('nm_ibu',TRUE),
        		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
        		'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
        		'smt_masuk' => $this->input->post('smt_masuk',TRUE),
        		'status_mhs' => $this->input->post('status_mhs',TRUE),
        		'status_awal' => $this->input->post('status_awal',TRUE),
        		'email' => $this->input->post('email',TRUE),
        	  );

            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }

    public function update($id)
    {
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('mahasiswa/update_action'),
        		'nim' => set_value('nim', $row->nim),
        		'nm_mhs' => set_value('nm_mhs', $row->nm_mhs),
        		'tpt_lhr' => set_value('tpt_lhr', $row->tpt_lhr),
        		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
        		'jenkel' => set_value('jenkel', $row->jenkel),
        		'agama' => set_value('agama', $row->agama),
        		'kelurahan' => set_value('kelurahan', $row->kelurahan),
        		'wilayah' => set_value('wilayah', $row->wilayah),
        		'nm_ibu' => set_value('nm_ibu', $row->nm_ibu),
        		'kd_prodi' => set_value('kd_prodi', $row->kd_prodi),
        		'tgl_masuk' => set_value('tgl_masuk', $row->tgl_masuk),
        		'smt_masuk' => set_value('smt_masuk', $row->smt_masuk),
        		'status_mhs' => set_value('status_mhs', $row->status_mhs),
        		'status_awal' => set_value('status_awal', $row->status_awal),
        		'email' => set_value('email', $row->email),
        	  );
            $agama = $this->agama->get_all();
            $prodi = $this->prodi->get_all();
            $status_mhs = $this->status->get_all();
            $data['agama'] = $agama;
            $data['prodi'] = $prodi;
            $data['status_mahasiswa'] = $status_mhs;

            $data['site_title'] = 'SIMALA';
        		$data['title_page'] = 'Olah Data Mahasiswa';
        		$data['assign_js'] = 'mahasiswa/js/index.js';
            load_view('mahasiswa/tb_mhs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nim', TRUE));
        } else {
            $data = array(
            'nm_mhs' => $this->input->post('nm_mhs',TRUE),
            'tpt_lhr' => $this->input->post('tpt_lhr',TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
            'jenkel' => $this->input->post('jenkel',TRUE),
            'agama' => $this->input->post('agama',TRUE),
            'kelurahan' => $this->input->post('kelurahan',TRUE),
            'wilayah' => $this->input->post('wilayah',TRUE),
            'nm_ibu' => $this->input->post('nm_ibu',TRUE),
            'kd_prodi' => $this->input->post('kd_prodi',TRUE),
            'tgl_masuk' => $this->input->post('tgl_masuk',TRUE),
            'smt_masuk' => $this->input->post('smt_masuk',TRUE),
            'status_mhs' => $this->input->post('status_mhs',TRUE),
            'status_awal' => $this->input->post('status_awal',TRUE),
            'email' => $this->input->post('email',TRUE),
            );

            $this->Mahasiswa_model->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_mhs', 'nm mhs', 'trim|required');
    	$this->form_validation->set_rules('tpt_lhr', 'tpt lhr', 'trim|required');
    	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
    	$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
    	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
    	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    	$this->form_validation->set_rules('wilayah', 'wilayah', 'trim|required');
    	$this->form_validation->set_rules('nm_ibu', 'nm ibu', 'trim|required');
    	$this->form_validation->set_rules('kd_prodi', 'kd prodi', 'trim|required');
    	$this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
    	$this->form_validation->set_rules('smt_masuk', 'smt masuk', 'trim|required');
    	$this->form_validation->set_rules('status_mhs', 'status mhs', 'trim|required');
    	$this->form_validation->set_rules('status_awal', 'status awal', 'trim|required');
    	$this->form_validation->set_rules('email', 'email', 'trim|required');
    	$this->form_validation->set_rules('nim', 'nim', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mhs.xls";
        $judul = "tb_mhs";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Agama");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Wilayah");
        xlsWriteLabel($tablehead, $kolomhead++, "Program Studi");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Semester Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Status Mahasiswa");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

      	foreach ($this->app_model->get_all_view("v_mhs_aktif") as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nim);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_mhs);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->tpt_lhr);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->jenkel);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->wilayah);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_prodi);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_masuk);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->smt_masuk);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_status);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
      	    $tablebody++;
            $nourut++;
        }

      xlsEOF();
      exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mhs.doc");

        $data = array(
            'tb_mhs_data' => $this->Mahasiswa_model->get_all(),
            'start' => 0
        );

        load_view('mahasiswa/tb_mhs_doc',$data);
    }

}
