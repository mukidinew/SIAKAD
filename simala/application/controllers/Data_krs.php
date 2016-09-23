<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_krs extends CI_Controller
{
    private $template;
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
          $this->load->model('Data_krs_model');
          $this->load->model('App_model');
          $this->load->library('excel');
          $this->template = './template/krs_khs_template.xlsx';
          // $this->load->model('Kelas_kuliah_model','kelas');
          $this->load->model('mhs_krs_model','mhs_krs');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $data_krs = $this->Data_krs_model->get_all_view();
        $data_mhs_krs = $this->mhs_krs->get_all_view();
        $data = array(
          'data_krs_data' => $data_krs,
          'data_mhs_krs' => $data_mhs_krs
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
        $data['assign_js'] = 'data_krs/js/index.js';
        load_view('data_krs/tb_mhs_data_krs_list', $data);
    }

    public function getKelas(){
      $kelas='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $kelas = $this->Data_krs_model->get_query("SELECT * FROM v_kelas_kuliah")->result();
      }
      else {
        $kelas = $this->Data_krs_model->get_limit_query_kls('v_kelas_kuliah',$page,0,$cari);
      }
      $temps = array();
      foreach ($kelas as $key) {
        $temps[] = array(
          'id_kelas' => $key->id_kelas,
          'nm_kelas' => $key->nm_kelas,
          'id_matkul' => $key->kode_mk,
          'nm_mk' => $key->nm_mk,
          'ta'=> $key->ta,
          'nm_prodi' => $key->nm_prodi
        );
      }
      echo json_encode($temps);
    }

    public function getMhsKrs(){
      $mhs_krs='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $mhs_krs = $this->Data_krs_model->get_query("SELECT * FROM v_mhs_krs")->result();
      }
      else {
        $mhs_krs = $this->Data_krs_model->get_limit_query('v_mhs_krs',$page,0,$cari);
      }
      $temps = array();
      foreach ($mhs_krs as $key) {
        $temps[] = array(
          'id_krs' => $key->id_krs,
          'id_mhs' => $key->nim,
          'nm_mhs' => $key->nama,
          'ta' => $key->ta,
        );
      }
      echo json_encode($temps);
    }

    public function read($id)
    {
        $row = $this->Data_krs_model->get_by_id_view($id)->result();;
        if ($row) {
            $data['data_krs'] = $row;
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
            $data['assign_js'] = 'data_krs/js/index.js';
            load_view('data_krs/tb_mhs_data_krs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_krs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_krs/create_action'),
      	    'id_data_krs' => set_value('id_data_krs'),
      	    'id_krs' => set_value('id_krs'),
      	    'id_kelas' => set_value('id_kelas'),
      	);
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
        $data['assign_js'] = 'data_krs/js/index.js';
        load_view('data_krs/tb_mhs_data_krs_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_krs' => $this->input->post('id_krs',TRUE),
        		'id_kelas' => $this->input->post('id_kelas',TRUE),
        	  );
            $this->Data_krs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_krs'));
        }
    }

    public function update($id)
    {
        $row = $this->Data_krs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_krs/update_action'),
            		'id_data_krs' => set_value('id_data_krs', $row->id_data_krs),
            		'id_krs' => set_value('id_krs', $row->id_krs),
            		'id_kelas' => set_value('id_kelas', $row->id_kelas),
            );
            $data['site_title'] = 'SIMALA';
            $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
            $data['assign_js'] = 'data_krs/js/index.js';
            load_view('data_krs/tb_mhs_data_krs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_krs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_data_krs', TRUE));
        } else {
            $data = array(
        		'id_krs' => $this->input->post('id_krs',TRUE),
        		'id_kelas' => $this->input->post('id_kelas',TRUE),
        	  );

            $this->Data_krs_model->update($this->input->post('id_data_krs', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_krs'));
        }
    }

    public function delete($id)
    {
        $row = $this->Data_krs_model->get_by_id($id);

        if ($row) {
            $this->Data_krs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_krs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_krs'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('id_krs', 'id krs', 'trim|required');
      	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');

      	$this->form_validation->set_rules('id_data_krs', 'id_data_krs', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_mhs_data_krs.xls";
        $judul = "tb_mhs_data_krs";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
        xlsWriteLabel($tablehead, $kolomhead++, "Periode Semester");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Program Studi");
      	xlsWriteLabel($tablehead, $kolomhead++, "Nama Program Studi");

      	foreach ($this->Data_krs_model->get_all_view() as $key) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
      	    xlsWriteLabel($tablebody, $kolombody++, $key->nim);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_mhs);
            xlsWriteLabel($tablebody, $kolombody++, $key->id_matkul);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_mk);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_kelas);
            xlsWriteLabel($tablebody, $kolombody++, $key->ta);
            xlsWriteLabel($tablebody, $kolombody++, $key->id_prodi);
            xlsWriteLabel($tablebody, $kolombody++, $key->nm_prodi);

      	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_mhs_data_krs.doc");

        $data = array(
            'tb_mhs_data_krs_data' => $this->Data_krs_model->get_all(),
            'start' => 0
        );
        $data['site_title'] = 'SIMALA';
        $data['title_page'] = 'Olah Kartu Rencana Studi Mahasiswa';
        $data['assign_js'] = 'data_krs/js/index.js';
        load_view('data_krs/tb_mhs_data_krs_doc',$data);
    }

    public function proses_krs($nim,$ta)
    {
      $beli_mk = $this->Data_krs_model->get_query("SELECT * FROM v_data_krs WHERE nim='".$nim."' AND ta='".$ta."'")->result();
      $data['data_krs_data']= $beli_mk;
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Pembelian Mata Kuliah Mahasiswa Bersangkutan';
      $data['assign_js'] = 'data_krs/js/index.js';
      load_view('data_krs/tb_mhs_data_krs_proses',$data);
    }

    public function cetak_krs($nim,$ta,$id_krs){

      $this->benchmark->mark('mulai');
      $data_mhs = $this->App_model->get_query("SELECT * FROM tb_mhs WHERE nim='".$nim."'")->row();
      $data_krs = $this->App_model->get_query("SELECT * FROM v_mhs_krs WHERE nim='".$nim."' AND id_krs='".$id_krs."'")->row();
      //var_dump($temp_data);
      $objPHPExcel = PHPExcel_IOFactory::load($this->template);

      //SET SHEET KRS
      $objPHPExcel->setActiveSheetIndex(0);
      $objPHPExcel->getActiveSheet()->setCellValue('D6', $ta);
      $objPHPExcel->getActiveSheet()->setCellValue('D7', 'S1 '.$data_krs->nm_prodi);
      $objPHPExcel->getActiveSheet()->setCellValue('H6', $data_krs->nim);
      $objPHPExcel->getActiveSheet()->setCellValue('H7', $data_krs->nama);
      $objPHPExcel->getActiveSheet()->setCellValue('D8', '......');

      $baseRow = 13;
      $temp_data = $this->App_model->get_query("SELECT * FROM v_data_krs WHERE id_krs='".$id_krs."'")->result();
      $temp_row=0;
      $ttd_row=0;
      foreach($temp_data as $r => $dataRow) {
        $row = $baseRow + $r;
        $objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r+1)
                  ->setCellValue('B'.$row, $dataRow->id_matkul)
                  ->setCellValue('C'.$row, $dataRow->nm_mk)
                  ->setCellValue('F'.$row, 'A / U')
                  ->setCellValue('G'.$row, $dataRow->sks)
                  ->setCellValue('I'.$row, $dataRow->nm_dosen);
        $temp_row = 1+$row;
        $ttd_row = 5+$temp_row;
      }

      $objPHPExcel->getActiveSheet()->setCellValue('H'.$temp_row, date('d F Y'));
      $objPHPExcel->getActiveSheet()->setCellValue('G'. $ttd_row, $data_mhs->nm_mhs);
      $objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

      $nimd = $string = preg_replace('/\s+/', '', $nim);
      $filename = $nimd."-".time().'-krs.xlsx';

      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      //$objWriter->save('php://output');
      $temp_tulis = $objWriter->save('temps/'.$filename);
      $this->benchmark->mark('selesai');
      $time_eks = $this->benchmark->elapsed_time('mulai', 'selesai');
      if ($temp_tulis==NULL) {
          $this->session->set_flashdata('message', "<div class=\"bs-callout bs-callout-success\">
              File berhasil digenerate dalam waktu <strong>".$time_eks." detik</strong>. <br />Klik <a href=\"".base_url()."index.php/file/download/".$filename."\">disini</a> untuk download file
            </div>");
          redirect(site_url('data_krs'));
      } else {
          $this->session->set_flashdata('message',"<div class=\"bs-callout bs-callout-danger\">
              <h4>Error</h4>File tidak bisa digenerate. Folder 'temps' tidak ada atau tidak bisa ditulisi.
            </div>" );
      }
    }

}
