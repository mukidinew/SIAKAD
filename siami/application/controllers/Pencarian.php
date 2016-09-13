
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {
	
	public function index(){
		$data['data'] = $this->load->view('view_pencarian',null,true);
		$data['active'] = 'home';
		
		$this->load->view('view_home',$data);
	}
	
	
}

?>




