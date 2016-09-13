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
        else if($this->session->userdata('level') != 'dosen'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('Kelas_dosen_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $kelas_dosen = $this->App_model->get_view_by_id("v_kelas_dosen","nidn",$this->session->userdata('nidn'));
        $data = array(
            'kelas_dosen_data' => $kelas_dosen
        );

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
	    );

            $this->Kelas_dosen_model->update($this->input->post('id_kelas_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelas_dosen'));
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
        $data_kelas = $this->Kelas_dosen_model->get_query("SELECT * FROM v_kelas_kuliah")->result();
      }
      else {
        $data_kelas = $this->Kelas_dosen_model->get_limit_query_kelas('v_kelas_kuliah',$page,0,$cari);
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

    public function view_data_krs($id_kelas)
    {
      $data_krs = $this->App_model->get_view_by_id("v_data_krs","id_kelas",$id_kelas);
      $data = array(
          'data_krs' => $data_krs
      );
      $data['data_kelas']= $id_kelas;
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Kelas Mengajar Anda';
      $data['assign_js'] = 'kelas_dosen/js/index.js';
      load_view('kelas_dosen/tb_kelas_dosen_list_krs', $data);
    }

    public function rules_nilai()
    {
      $this->form_validation->set_rules('nilai_angka', 'nilai_angka', 'trim');
      // $this->form_validation->set_rules('nilai_huruf', 'nilai_huruf', 'trim|required');
    	// $this->form_validation->set_rules('nilai_index', 'nilai_index', 'trim|required');
      $this->form_validation->set_rules('id_data_krs', 'id_data_krs', 'trim');
      $this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function add_nilai()
    {
      $id_kelas = $this->input->post('id_kelas');
      $id_data_krs = $this->input->post('id_data_krs');
       echo $nilai_angka = $this->input->post('nilai_angka');
      $this->rules_nilai();
      if ($this->form_validation->run() == FALSE) {
          $this->view_data_krs($id_kelas);
      }
      else {

        $nilai_huruf = '';
        $nilai_index = '';

        if ($nilai_angka == null) {
          $this->session->set_flashdata('message', 'Nilai Harus Disi || Isikan Nilai mulai nilai 0 hingga 100');
          redirect(site_url('kelas_dosen/view_data_krs/'.$id_kelas));
        }
        else {
          if ($nilai_angka >= 85 && $nilai_angka <= 100) {
            $nilai_huruf = 'A';
            $nilai_index= '4';
          } else if ($nilai_angka >= 75 && $nilai_angka <= 84) {
            $nilai_huruf = 'B';
            $nilai_index= '3';
          }
          else if ($nilai_angka >= 65 && $nilai_angka <= 74) {
            $nilai_huruf = 'C';
            $nilai_index= '2';
          }
          else if ($nilai_angka >= 45 && $nilai_angka <= 64) {
            $nilai_huruf = 'D';
            $nilai_index= '1';
          }
          else if ($nilai_angka >= 0 && $nilai_angka <= 44) {
            $nilai_huruf = 'E';
            $nilai_index= '0';
          }
          else {
            $nilai_huruf = 'T';
            $nilai_index= '0';
          }

          $data_nilai = array(
            'id_krs' => $id_data_krs,
            'nilai_angka' => $nilai_angka,
            'nilai_index' => $nilai_index,
            'nilai_huruf' => $nilai_huruf,
            'status_upload' =>'N'
          );
          $insert = $this->App_model->insertRecord("tb_nilai",$data_nilai);
          if ($insert==true) {
            $krs = array(
              'status_nilai' => "Y"
            );
            $update = $this->App_model->update('tb_mhs_data_krs',"id_data_krs",$id_data_krs,$krs);
            if ($update==true) {
              $this->session->set_flashdata('message', 'Nilai Berhasil Dimasukan');
              redirect(site_url('kelas_dosen/view_data_krs/'.$id_kelas));
            } else {
              echo "Tidak Dapat Update Krs";
            }

          } else {
            echo "Nilai Nda Masuk";
          }
        }
      }
    }

    public function cetak_dpna($id_kelas)
    {
      $kelas = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE id_kelas_kuliah='".$id_kelas."'");
      $data_kelas = $kelas->row();
      $data_krs = $this->App_model->get_view_by_id("v_nilai","nm_kelas",$data_kelas->nm_kelas);
      //echo json_encode($data_krs);
      $data = array(
          'data_krs' => $data_krs
      );
      $data['jur'] = $data_kelas->nm_prodi;
      $data['mata_kuliah'] = $data_kelas->nm_mk;
      $data['nm_dosen'] = $data_kelas->nm_dosen;
      $data['kelas'] = $data_kelas->nm_kelas;

      $data['assign_css'] = 'kelas_dosen/css/app.css';
      $data['assign_js'] = 'kelas_dosen/js/index.js';
      load_pdf('kelas_dosen/laporan_dpna', $data);

      $this->load->library('fpdf_gen');
      $html = $this->output->get_output();
      $this->dompdf->set_paper('legal', 'potrait');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("dpna_".$id_kelas.".pdf",array('Attachment'=>0));
    }

    public function cetak_bap_edit($id_kelas,$nim)
    {
      $kelas = $this->App_model->get_query("SELECT * FROM v_kelas_dosen WHERE id_kelas_kuliah='".$id_kelas."'");
      $data_kelas = $kelas->row();
      $data_mhs = $this->App_model->get_query("SELECT * FROM v_nilai WHERE nm_kelas='".$data_kelas->nm_kelas."' AND nim='".$nim."'")->row();

      $data['jur'] = $data_kelas->nm_prodi;
      $data['mata_kuliah'] = $data_kelas->nm_mk;
      $data['nm_dosen'] = $data_kelas->nm_dosen;
      $data['kelas'] = $data_kelas->nm_kelas;
      $data['nm_mhs']=$data_mhs->nm_mhs;
      $data['nim']=$data_mhs->nim;
      $data['nilai_awal']=$data_mhs->nilai_angka;
      $data['index_awal']=$data_mhs->nilai_huruf;
      $data['assign_css'] = 'kelas_dosen/css/app.css';
      $data['assign_js'] = 'kelas_dosen/js/index.js';
      load_pdf('kelas_dosen/laporan_bap', $data);

      $this->load->library('fpdf_gen');
      $html = $this->output->get_output();
      $this->dompdf->set_paper('A4', 'potrait');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("bap_nilai".$nim.".pdf",array('Attachment'=>0));
    }
}
