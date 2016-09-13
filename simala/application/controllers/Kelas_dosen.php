<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_dosen extends CI_Controller
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
          $this->load->model('Kelas_dosen_model');
          $this->load->model('App_model');
          $this->load->model('Mata_kuliah_model','mata_kuliah');
          $this->load->model('kurikulum_model','kurikulum');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $kelas_dosen = $this->Kelas_dosen_model->get_all_view();
        $kurikulum_data = $this->kurikulum->get_all();
        $data = array(
            'kelas_dosen_data' => $kelas_dosen
        );
        $data['kurikulum_data'] = $kurikulum_data;
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Mengajar Dosen';
        $data['assign_js'] = 'kelas_dosen/js/index.js';
        load_view('kelas_dosen/tb_kelas_dosen_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kelas_dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_kelas_dosen' => $row->id_kelas_dosen,
          		'id_kelas_kuliah' => $row->id_kelas_kuliah,
          		'id_dosen' => $row->id_dosen,
          		'r_t_muka' => $row->r_t_muka,
          		't_muka' => $row->t_muka,
          	);
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Mengajar Dosen';
            $data['assign_js'] = 'kelas_dosen/js/index.js';
            load_view('kelas_dosen/tb_kelas_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_dosen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelas_dosen/create_action'),
      	    'id_kelas_dosen' => set_value('id_kelas_dosen'),
      	    'id_kelas_kuliah' => set_value('id_kelas_kuliah'),
      	    'id_dosen' => set_value('id_dosen'),
      	    'r_t_muka' => set_value('r_t_muka'),
      	    't_muka' => set_value('t_muka'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Data Mengajar Dosen';
        $data['assign_js'] = 'kelas_dosen/js/index.js';
        load_view('kelas_dosen/tb_kelas_dosen_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_kelas_kuliah' => $this->input->post('id_kelas_kuliah',TRUE),
        		'id_dosen' => $this->input->post('id_dosen',TRUE),
        		'r_t_muka' => $this->input->post('r_t_muka',TRUE),
        		't_muka' => $this->input->post('t_muka',TRUE),
        	  );

            $this->Kelas_dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelas_dosen'));
        }
    }

    public function update($id)
    {
        $row = $this->Kelas_dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelas_dosen/update_action'),
            		'id_kelas_dosen' => set_value('id_kelas_dosen', $row->id_kelas_dosen),
            		'id_kelas_kuliah' => set_value('id_kelas_kuliah', $row->id_kelas_kuliah),
            		'id_dosen' => set_value('id_dosen', $row->id_dosen),
            		'r_t_muka' => set_value('r_t_muka', $row->r_t_muka),
            		't_muka' => set_value('t_muka', $row->t_muka),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Data Mengajar Dosen';
            $data['assign_js'] = 'kelas_dosen/js/index.js';
            load_view('kelas_dosen/tb_kelas_dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_dosen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas_dosen', TRUE));
        } else {
            $data = array(
          		'id_kelas_kuliah' => $this->input->post('id_kelas_kuliah',TRUE),
          		'id_dosen' => $this->input->post('id_dosen',TRUE),
          		'r_t_muka' => $this->input->post('r_t_muka',TRUE),
          		't_muka' => $this->input->post('t_muka',TRUE),
              'validasi_baak'=>'N'
          	);

            $update = $this->Kelas_dosen_model->update($this->input->post('id_kelas_dosen', TRUE), $data);
            if ($update==true){
              $this->session->set_flashdata('message', 'Update Record Success');
              redirect(site_url('kelas_dosen'));
            } else {
              $this->session->set_flashdata('message', 'Update Record Not Success');
              redirect(site_url('kelas_dosen'));
            }
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_dosen_model->get_by_id($id);

        if ($row) {
            $this->Kelas_dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelas_dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_dosen'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_kelas_kuliah', 'id data krs', 'trim|required');
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('r_t_muka', 'r t muka', 'trim|required');
	$this->form_validation->set_rules('t_muka', 't muka', 'trim|required');

	$this->form_validation->set_rules('id_kelas_dosen', 'id_kelas_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kelas_dosen.xls";
        $judul = "tb_kelas_dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Data Krs");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "R T Muka");
	xlsWriteLabel($tablehead, $kolomhead++, "T Muka");

	foreach ($this->Kelas_dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas_kuliah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->r_t_muka);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_muka);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kelas_dosen.doc");

        $data = array(
            'tb_kelas_dosen_data' => $this->Kelas_dosen_model->get_all(),
            'start' => 0
        );

        load_view('kelas_dosen/tb_kelas_dosen_doc',$data);
    }

    public function getDosen()
    {
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $kelas_dosen = $this->Kelas_dosen_model->get_query("SELECT * FROM tb_dosen")->result();
      }
      else {
        $kelas_dosen = $this->Kelas_dosen_model->get_limit_query_dosen('tb_dosen',$page,0,$cari);
      }
      $temps = array();
      foreach ($kelas_dosen as $key) {
        $temps[] = array(
          'nidn' => $key->nidn,
          'nm_dosen' => $key->nm_dosen
        );
      }
      echo json_encode($temps);
    }

    public function getDataKelas(){
      $data_krs='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $data_kelas = $this->App_model->get_query("SELECT * FROM v_kelas_kuliah ORDER BY ta DESC")->result();
      }
      else {
        $data_kelas = $this->App_model->get_limit_query_kelas('v_kelas_kuliah',$page,0,$cari);
      }

      $temps = array();
      foreach ($data_kelas as $key) {
        $temps[] = array(
          'id_kelas' => $key->id_kelas,
          'ta' => $key->ta,
          'kode_mk' => $key->kode_mk,
          'nm_mk' => $key->nm_mk,
          'nm_prodi' => $key->nm_prodi,
          'nm_kelas' => $key->nm_kelas
        );
      }
      echo json_encode($temps);
    }

    public function get_all_kelas($nidn)
    {
      $kelas_dosen = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE nidn='".$nidn."' AND validasi_baak='Y'")->result();
      $data = array(
          'kelas_dosen_data' => $kelas_dosen
      );
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Olah Data Mengajar Dosen';
      $data['assign_js'] = 'kelas_dosen/js/index.js';
      load_view('kelas_dosen/tb_kelas_dosen_list_kelas', $data);
    }

    public function get_kelas($id_kur)
    {
      $kelas_kur = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE id_kurikulum='".$id_kur."' AND validasi_baak='Y' ORDER BY t_muka ASC")->result();
      $count_kelas_kur = $this->App_model->get_query("SELECT COUNT(*) AS belum_tatap_muka FROM v_kelas_dosen WHERE id_kurikulum='".$id_kur."' AND validasi_baak='Y' AND t_muka='0'")->row();
      $data['kelas_dosen_data']=$kelas_kur;
      $data['id_kurikulum']=$id_kur;
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Kelas Dosen Berdasarkan Kurikulum Dipilih || <b>'.$count_kelas_kur->belum_tatap_muka.' Kelas Belum Tatap Muka </b>';
      $data['assign_js'] = 'kurikulum/js/index.js';
      load_view('kelas_dosen/kelas_kurikulum', $data);
    }

    public function cetak_kelas($id_kur)
    {
      $kelas_kur = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE id_kurikulum='".$id_kur."' AND validasi_baak='Y'")->result();
      $data['kelas_dosen_data']=$kelas_kur;
      $data['id_kurikulum']=$id_kur;
      $data['assign_css'] = 'nilai/css/app.css';
      $data['assign_js'] = 'nilai/js/index.js';
      load_pdf('kelas_dosen/pengumuman_kelas_baak', $data);
      $this->load->library('fpdf_gen');
      $html = $this->output->get_output();
      $this->dompdf->set_paper('A4', 'landscape');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream(date('D-M-Y').$id_kur.".pdf",array('Attachment'=>0));
    }

    public function cetak_surat($id_dosen,$kelas_dosen)
    {
      $data_surat = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE nidn='".$id_dosen."' AND validasi_baak='Y' AND id_kelas_dosen='".$kelas_dosen."'");
      $data['lampiran_surat'] = $data_surat->result();
      $data['data_surat']= $data_surat->row();
      $data['assign_css'] = 'kelas_dosen/css/app.css';
      $data['assign_js'] = 'kelas_dosen/js/index.js';
      load_pdf('kelas_dosen/surat_kelas_baak', $data);

      $this->load->library('fpdf_gen');
      $html = $this->output->get_output();
      $this->dompdf->set_paper('A4', 'potrait');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream(date('D-M-Y').$id_kur."_surat_dosen_".$id_dosen.".pdf",array('Attachment'=>0));
    }
}
