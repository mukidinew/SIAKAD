<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_penguji extends CI_Controller
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
          $this->load->model('Dosen_penguji_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }
    }
    public function index()
    {
        $mhs_proposal = $this->App_model->get_query("SELECT * FROM v_proposal_maju WHERE id_prodi='".$this->session->userdata('level_prodi')."'")->result();
        // $dosen_penguji = $this->Dosen_penguji_model->get_all();
        $data = array(
          // 'dosen_penguji_data' => $dosen_penguji
            'mhs_proposal' => $mhs_proposal
        );
        $data['site_title'] = 'SIPAD';
    		$data['title_page'] = 'Olah Data Dosen Penguji';
    		$data['assign_js'] = 'dosen_penguji/js/index.js';
        // load_view('dosen_penguji/tb_dosen_penguji_list', $data);
        load_view('dosen_penguji/mhs_proposal_list', $data);
    }

    public function get_penguji($id_maju,$nim,$nidn_1,$nidn_2)
    {
      $dosen_penguji = $this->App_model->get_query("SELECT * FROM v_dosen_penguji WHERE id_proposal_maju='".$id_maju."'")->result();
      $dosen = $this->App_model->get_query("SELECT * FROM tb_dosen")->result();
      if ($dosen_penguji==null) {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('dosen_penguji/create_action'),
      	    'id_proposal_maju' => set_value('id_proposal_maju'),
            'id_dosen_ketua' => set_value('id_dosen_ketua'),
            'id_dosen_sek' => set_value('id_dosen_sek'),
            'id_dosen_1' => set_value('id_dosen_1',$nidn_1),
      	    'id_dosen_2' => set_value('id_dosen_2',$nidn_2)
      	);

        $data['id_proposal_maju'] = $id_maju;
        $data['dosen'] = $dosen;
        $data['site_title'] = 'SIPAD';
        $data['nim']=$nim;
        $data['title_page'] = 'Tambah Penguji Mahasiswa | '.$nim;
        $data['assign_js'] = 'dosen_penguji/js/index.js';
        load_view('dosen_penguji/tb_dosen_penguji_form', $data);
      } else {
        $data['dosen_penguji_data'] = $dosen_penguji;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Dosen Penguji Mahasiswa | '.$nim;
        $data['assign_js'] = 'dosen_penguji/js/index.js';
        load_view('dosen_penguji/tb_dosen_penguji_list', $data);
      }
    }

    public function read($id)
    {
        $row = $this->Dosen_penguji_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_dosen_penguji' => $row->id_dosen_penguji,
          		'id_proposal_maju' => $row->id_proposal_maju,
          		'id_dosen' => $row->id_dosen,
          		'jabatan_penguji' => $row->jabatan_penguji,
          	);
            $data['site_title'] = 'SIPAD';
        		$data['title_page'] = 'Olah Data Dosen Penguji';
        		$data['assign_js'] = 'dosen_penguji/js/index.js';
            load_view('dosen_penguji/tb_dosen_penguji_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_penguji'));
        }
    }

    // public function create()
    // {
    //     $data = array(
    //         'button' => 'Create',
    //         'action' => site_url('dosen_penguji/create_action'),
    //   	    'id_dosen_penguji' => set_value('id_dosen_penguji'),
    //   	    'id_proposal_maju' => set_value('id_proposal_maju'),
    //   	    'id_dosen' => set_value('id_dosen'),
    //   	    'jabatan_penguji' => set_value('jabatan_penguji'),
    //   	);
    //     $data['site_title'] = 'SIPAD';
    // 		$data['title_page'] = 'Olah Data Dosen Penguji';
    // 		$data['assign_js'] = 'dosen_penguji/js/index.js';
    //     load_view('dosen_penguji/tb_dosen_penguji_form', $data);
    // }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->get_penguji($this->input->post('id_proposal_maju',TRUE),$this->input->post('nim',TRUE));
        } else {
          $id_proposal_maju=$this->input->post('id_proposal_maju',TRUE);

          $ketua = $this->input->post('id_dosen_ketua',TRUE);
          $jabatan_penguji_ketua=$this->input->post('jabatan_penguji_ketua',TRUE);

          $sek = $this->input->post('id_dosen_sek',TRUE);
          $jabatan_penguji_sek=$this->input->post('jabatan_penguji_sek',TRUE);

          $penguji_1 = $this->input->post('id_dosen_1',TRUE);
          $jabatan_penguji_1=$this->input->post('jabatan_penguji_1',TRUE);

          $penguji_2 = $this->input->post('id_dosen_2',TRUE);
          $jabatan_penguji_2=$this->input->post('jabatan_penguji_2',TRUE);

          $penguji_3 = $this->input->post('id_dosen_3',TRUE);
          $jabatan_penguji_3=$this->input->post('jabatan_penguji_3',TRUE);

          $ketua_arr = array(
            'id_proposal_maju' => $id_proposal_maju,
            'id_dosen' => $ketua,
            'jabatan_penguji'=>$jabatan_penguji_ketua
          );

          $sek_arr = array(
            'id_proposal_maju' => $id_proposal_maju,
            'id_dosen' => $sek,
            'jabatan_penguji'=>$jabatan_penguji_sek
          );

          $penguji_1_arr = array(
            'id_proposal_maju' => $id_proposal_maju,
            'id_dosen' => $penguji_1,
            'jabatan_penguji'=>$jabatan_penguji_1
          );

          $penguji_2_arr = array(
            'id_proposal_maju' => $id_proposal_maju,
            'id_dosen' => $penguji_2,
            'jabatan_penguji'=>$jabatan_penguji_2
          );

          $penguji_3_arr = array(
            'id_proposal_maju' => $id_proposal_maju,
            'id_dosen' => $penguji_3,
            'jabatan_penguji'=>$jabatan_penguji_3
          );

          $this->Dosen_penguji_model->insert($ketua_arr);
          $this->Dosen_penguji_model->insert($sek_arr);
          $this->Dosen_penguji_model->insert($penguji_1_arr);
          $this->Dosen_penguji_model->insert($penguji_2_arr);
          $this->Dosen_penguji_model->insert($penguji_3_arr);

          $this->session->set_flashdata('message', 'Create Record Success');
          redirect(site_url('dosen_penguji'));
        }
    }

    public function update($id)
    {
        $row = $this->Dosen_penguji_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen_penguji/update_action'),
            		'id_dosen_penguji' => set_value('id_dosen_penguji', $row->id_dosen_penguji),
            		'id_proposal_maju' => set_value('id_proposal_maju', $row->id_proposal_maju),
            		'id_dosen' => set_value('id_dosen', $row->id_dosen),
            		'jabatan_penguji' => set_value('jabatan_penguji', $row->jabatan_penguji),
            );
            $data['site_title'] = 'SIPAD';
        		$data['title_page'] = 'Olah Data Dosen Penguji';
        		$data['assign_js'] = 'dosen_penguji/js/index.js';
            load_view('dosen_penguji/tb_dosen_penguji_form', $data);
        }
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_penguji'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen_penguji', TRUE));
        } else {
            $data = array(
          		'id_proposal_maju' => $this->input->post('id_proposal_maju',TRUE),
          		'id_dosen' => $this->input->post('id_dosen',TRUE),
          		'jabatan_penguji' => $this->input->post('jabatan_penguji',TRUE),
          	);
            $this->Dosen_penguji_model->update($this->input->post('id_dosen_penguji', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen_penguji'));
        }
    }

    public function delete($id)
    {
        $row = $this->Dosen_penguji_model->get_by_id($id);

        if ($row) {
            $this->Dosen_penguji_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen_penguji'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen_penguji'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_proposal_maju', 'id proposal maju', 'trim|required');
      $this->form_validation->set_rules('id_dosen_ketua', 'id dosen', 'trim|required');
      $this->form_validation->set_rules('id_dosen_sek', 'id dosen', 'trim|required');
      $this->form_validation->set_rules('id_dosen_2', 'id dosen', 'trim|required');
    	$this->form_validation->set_rules('id_dosen_1', 'id dosen', 'trim|required');

    	$this->form_validation->set_rules('id_dosen_penguji', 'id_dosen_penguji', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_dosen_penguji.xls";
        $judul = "tb_dosen_penguji";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Id Proposal Maju");
      	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
      	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan Penguji");

	foreach ($this->Dosen_penguji_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_proposal_maju);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_penguji);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
