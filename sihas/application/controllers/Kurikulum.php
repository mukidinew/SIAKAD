<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kurikulum extends CI_Controller
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
          $this->load->model('Kurikulum_model');
          $this->load->model('App_model','app_model');
          $this->load->library('form_validation');
        }

    }

    public function index()
    {
        $kurikulum = $this->Kurikulum_model->get_all();
        $mata_kuliah_kurikulum = $this->app_model->get_all_view_mk_kur();
        $data = array(
            'kurikulum_data' => $kurikulum
        );
        $data['mata_kuliah_kurikulum_data'] = $mata_kuliah_kurikulum;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Kurikulum';
        $data['assign_js'] = 'kurikulum/js/index.js';
        load_view('kurikulum/tb_kurikulum_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kurikulum_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_kurikulum' => $row->id_kurikulum,
        		'nm_kurikulum' => $row->nm_kurikulum,
        		'ta' => $row->ta,
        		'kd_prodi' => $row->kd_prodi,
        		'status' => $row->status,
        	  );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Kurikulum';
            $data['assign_js'] = 'kurikulum/js/index.js';
            load_view('kurikulum/tb_kurikulum_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kurikulum'));
        }
    }

    public function getProdi(){
      $prodi='';
      $cari = $this->input->post('q');
      $temp_cari = $cari==''?'':$cari;
      $page = $this->input->post('page');
      if ($page=='') {
        $prodi = $this->app_model->get_query("SELECT * FROM tb_prodi")->result();
      }
      else {
        $prodi = $this->app_model->get_limit_prodi('tb_prodi',$page,0,$cari);
      }

      $temps = array();
      foreach ($prodi as $key) {
        $temps[] = array(
          'id_prodi' => $key->id_prodi,
          'nm_prodi' => $key->nm_prodi,
          'nm_ketua' => $key->nm_ketua
        );
      }
      echo json_encode($temps);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kurikulum/create_action'),
      	    'id_kurikulum' => set_value('id_kurikulum'),
      	    'nm_kurikulum' => set_value('nm_kurikulum'),
      	    'ta' => set_value('ta'),
      	    'kd_prodi' => set_value('kd_prodi'),
      	    'status' => set_value('status'),
      	);
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Kurikulum';
        $data['assign_js'] = 'kurikulum/js/index.js';
        load_view('kurikulum/tb_kurikulum_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nm_kurikulum' => $this->input->post('nm_kurikulum',TRUE),
        		'ta' => $this->input->post('ta',TRUE),
        		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
        		'status' => $this->input->post('status',TRUE),
        	  );

            $this->Kurikulum_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kurikulum'));
        }
    }

    public function update($id)
    {
        $row = $this->Kurikulum_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kurikulum/update_action'),
            		'id_kurikulum' => set_value('id_kurikulum', $row->id_kurikulum),
            		'nm_kurikulum' => set_value('nm_kurikulum', $row->nm_kurikulum),
            		'ta' => set_value('ta', $row->ta),
            		'kd_prodi' => set_value('kd_prodi', $row->kd_prodi),
            		'status' => set_value('status', $row->status),
            );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Kurikulum';
            $data['assign_js'] = 'kurikulum/js/index.js';
            load_view('kurikulum/tb_kurikulum_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kurikulum'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kurikulum', TRUE));
        } else {
            $data = array(
        		'nm_kurikulum' => $this->input->post('nm_kurikulum',TRUE),
        		'ta' => $this->input->post('ta',TRUE),
        		'kd_prodi' => $this->input->post('kd_prodi',TRUE),
        		'status' => $this->input->post('status',TRUE),
        	  );

            $this->Kurikulum_model->update($this->input->post('id_kurikulum', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kurikulum'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kurikulum_model->get_by_id($id);

        if ($row) {
            $this->Kurikulum_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kurikulum'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kurikulum'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nm_kurikulum', 'nm kurikulum', 'trim|required');
    	$this->form_validation->set_rules('ta', 'ta', 'trim|required');
    	$this->form_validation->set_rules('kd_prodi', 'kd prodi', 'trim|required');
    	$this->form_validation->set_rules('status', 'status', 'trim|required');

    	$this->form_validation->set_rules('id_kurikulum', 'id_kurikulum', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kurikulum.xls";
        $judul = "tb_kurikulum";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Nm Kurikulum");
      	xlsWriteLabel($tablehead, $kolomhead++, "Ta");
      	xlsWriteLabel($tablehead, $kolomhead++, "Kd Prodi");
      	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Kurikulum_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_kurikulum);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ta);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kd_prodi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kurikulum.doc");

        $data = array(
            'tb_kurikulum_data' => $this->Kurikulum_model->get_all(),
            'start' => 0
        );

        load_view('kurikulum/tb_kurikulum_doc',$data);
    }

    public function cek_matkul($id_kur)
    {
      $mk_kur = $this->Kurikulum_model->get_query("SELECT * FROM v_mk_kurikulum WHERE id_kurikulum='".$id_kur."'")->result();
      $data['mata_kuliah_kurikulum_data']=$mk_kur;
      $data['site_title'] = 'SIPAD';
      $data['title_page'] = 'Olah Data Mata Kuliah Kurikulum';
      $data['assign_js'] = 'kurikulum/js/index.js';
      load_view('kurikulum/tb_mk_kurikulum_sort', $data);
    }

    public function duplikasi_matkul()
    {
      $a=0;
      $b=0;
      $c=false;
      $id_kurikulum = $this->input->post('id_kurikulum');
      $id_kurikulum_t = $this->input->post('id_kurikulum_t');
      $mk_kur = $this->Kurikulum_model->get_query("SELECT * FROM v_mk_kurikulum WHERE id_kurikulum='".$id_kurikulum."'");
      if ($mk_kur->num_rows() != 1) {
        $c=false;
        foreach ($mk_kur->result() as $key) {
          $temps_mk_kur = array(
            'kode_mk' => $key->kode_mk,
            'id_kurikulum' => $id_kurikulum_t,
            'status_upload' => 'N'
          );
          $insert_cek = $this->app_model->insertRecord("tb_mk_kurikulum",$temps_mk_kur);
          if ($insert_cek==true) {
            $a++;
          } else {
            $b++;
          }
        }
      }
      else {
        $c=true;
      }
      $lapor = array(
        'berhasil' => $a,
        'gagal' =>$b,
        'cek_kurikulum'=>$c
      );
      echo json_encode($lapor);
    }
}
