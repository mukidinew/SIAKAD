<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	//private $data;
	private $path_temps;
	private $xml_file;
	private $url_ws;
	private $url_update;

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect('auth');
		}
		else if($this->session->userdata('level') != 'baak'){
				redirect('auth/logout');
		}
		else {
			$this->path_temps = $this->config->item('path_temps');
		}
	}

	public function download($file)
	{
		if ($file!='') {
			$filename = $this->path_temps.$file;
			//delete_files($filename);
			force_download($filename, NULL);
			unlink($filename);
		} else {
			redirect('data_krs');
		}
	}
}
