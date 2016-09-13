<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_act extends CI_Controller {
	private $pdf;
	function __construct() {
			parent::__construct();
			if (!$this->session->userdata('login')) {
				redirect('auth');
			}
			else if($this->session->userdata('level') != 'baak'){
					redirect('auth/logout');
			}
			else {
				$this->load->library('fpdf_gen');
			}
	}
	public function index() {
		 $html = "TES";
		 // Convert to PDF
		 $this->dompdf->load_html($html);
		 $this->dompdf->render();
		 $this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
	}
}
