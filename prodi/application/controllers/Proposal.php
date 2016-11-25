<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Proposal extends CI_Controller
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
          $this->load->model('Proposal_model');
          $this->load->model('App_model');
          $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $proposal = $this->App_model->get_query("SELECT * FROM v_proposal")->result();

        $data = array(
            'proposal_data' => $proposal
        );
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Proposal Mahasiswa';
        $data['assign_js'] = 'proposal/js/index.js';
        load_view('proposal/tb_proposal_list', $data);
    }

    public function read($id)
    {
        $row = $this->Proposal_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'id_mhs_proposal' => $row->id_mhs_proposal,
          		'id_mhs' => $row->id_mhs,
          		'judul' => $row->judul,
          		'id_pembimbing_1' => $row->id_pembimbing_1,
          		'id_pembimbing_2' => $row->id_pembimbing_2,
          		'tgl_daftar' => $row->tgl_daftar,
          		'tgl_kadaluarsa' => $row->tgl_kadaluarsa,
          	);
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Proposal Mahasiswa';
            $data['assign_js'] = 'proposal/js/index.js';
            load_view('proposal/tb_proposal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function create()
    {
        $dos_pem1= $this->App_model->get_query("SELECT * FROM v_dosen_pembimbing WHERE status='1'")->result();
        $dos_pem2= $this->App_model->get_query("SELECT * FROM v_dosen_pembimbing WHERE status='2'")->result();
        $data = array(
            'button' => 'Create',
            'action' => site_url('proposal/create_action'),
      	    'id_mhs_proposal' => set_value('id_mhs_proposal'),
      	    'id_mhs' => set_value('id_mhs'),
      	    'judul' => set_value('judul'),
      	    'id_pembimbing_1' => set_value('id_pembimbing_1'),
      	    'id_pembimbing_2' => set_value('id_pembimbing_2'),
      	    'tgl_daftar' => set_value('tgl_daftar'),
      	    'tgl_kadaluarsa' => set_value('tgl_kadaluarsa'),
      	);
        $data['dos_pem1'] = $dos_pem1;
        $data['dos_pem2'] = $dos_pem2;
        $data['site_title'] = 'SIPAD';
        $data['title_page'] = 'Olah Data Proposal Mahasiswa';
        $data['assign_js'] = 'proposal/js/index.js';
        load_view('proposal/tb_proposal_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'id_mhs' => $this->input->post('id_mhs',TRUE),
          		'judul' => $this->input->post('judul',TRUE),
          		'id_pembimbing_1' => $this->input->post('id_pembimbing_1',TRUE),
          		'id_pembimbing_2' => $this->input->post('id_pembimbing_2',TRUE),
          		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
          		'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa',TRUE),
        	  );
            $this->Proposal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proposal'));
        }
    }

    public function update($id)
    {
        $row = $this->Proposal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proposal/update_action'),
            		'id_mhs_proposal' => set_value('id_mhs_proposal', $row->id_mhs_proposal),
            		'id_mhs' => set_value('id_mhs', $row->id_mhs),
            		'judul' => set_value('judul', $row->judul),
            		'id_pembimbing_1' => set_value('id_pembimbing_1', $row->id_pembimbing_1),
            		'id_pembimbing_2' => set_value('id_pembimbing_2', $row->id_pembimbing_2),
            		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
            		'tgl_kadaluarsa' => set_value('tgl_kadaluarsa', $row->tgl_kadaluarsa),
      	    );
            $data['site_title'] = 'SIPAD';
            $data['title_page'] = 'Olah Data Proposal Mahasiswa';
            $data['assign_js'] = 'proposal/js/index.js';
            load_view('proposal/tb_proposal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mhs_proposal', TRUE));
        } else {
            $data = array(
          		'id_mhs' => $this->input->post('id_mhs',TRUE),
          		'judul' => $this->input->post('judul',TRUE),
          		'id_pembimbing_1' => $this->input->post('id_pembimbing_1',TRUE),
          		'id_pembimbing_2' => $this->input->post('id_pembimbing_2',TRUE),
          		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
          		'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa',TRUE),
        	  );
            $this->Proposal_model->update($this->input->post('id_mhs_proposal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $this->Proposal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proposal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_mhs', 'id mhs', 'trim|required');
    	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
    	$this->form_validation->set_rules('id_pembimbing_1', 'id pembimbing 1', 'trim|required');
    	$this->form_validation->set_rules('id_pembimbing_2', 'id pembimbing 2', 'trim|required');
    	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');
    	$this->form_validation->set_rules('tgl_kadaluarsa', 'tgl kadaluarsa', 'trim|required');

    	$this->form_validation->set_rules('id_mhs_proposal', 'id_mhs_proposal', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_proposal.xls";
        $judul = "tb_proposal";
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
      	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
      	xlsWriteLabel($tablehead, $kolomhead++, "Pembimbing 1");
      	xlsWriteLabel($tablehead, $kolomhead++, "Pembimbing 2");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Setor Judul");
      	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kadaluarsa");

	      foreach ($this->App_model->get_query("SELECT * FROM v_proposal")->result() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->nim);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->pembimbing_1);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->pembimbing_2);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->setor_judul);
      	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kadaluarsa);

      	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
