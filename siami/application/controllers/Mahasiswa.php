<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("model_mahasiswa");
	}
	
	public function index(){
		$data['data'] = $this->load->view('view_mahasiswa',null,true);
		$data['active'] = 'mahasiswa';
		
		$this->load->view('view_home',$data);
	}
	
	public function c($src){
		
		if(!empty($src)){
			$x['src'] = $src;
			$x['datamahasiswa'] = $this->model_mahasiswa->caridatamahasiswa($src)->result();
			$x['jml'] = $this->model_mahasiswa->caridatamahasiswa($src)->num_rows();
			
		}
		$data['data'] = $this->load->view('view_mahasiswa',$x,true);
		$data['active'] = 'mahasiswa';
		
		$this->load->view('view_home',$data);
	}
	
	public function d($uri){
		$this->load->model("model_transaksi");
		if(!empty($uri)){
			$x['nim'] = base64_decode($uri);
			$x['datamahasiswa'] = $this->model_mahasiswa->getdatamahasiswa($x['nim'])->result();
			$x['jml'] = $this->model_mahasiswa->getdatamahasiswa($x['nim'])->num_rows();
			$x['datatransaksi'] = $this->model_transaksi->gettransaksi($x['nim'])->result();
			$x['jmltransaksi'] = $this->model_transaksi->gettransaksi($x['nim'])->num_rows();
		}
		$data['data'] = $this->load->view('view_mahasiswa_detail', $x, true);
		$data['active'] = 'mahasiswa';
		
		$this->load->view('view_home',$data);
	}
	
}

?>



