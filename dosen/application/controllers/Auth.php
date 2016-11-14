<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $user;
	private $pass;
	private $level;
	private $nama;
	private $nidn;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model','app_model');

	}

	public function index()
	{
		//$this->login();
		if ($this->session->userdata('login')) {
				redirect('Index');
		}
		else {
			$data['site_title'] = 'Please Login';
			$this->load->view('tpl/login_view',$data);
		}
	}

	public function login()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('username','Username Anda','trim|required');
			$this->form_validation->set_rules('password','Password Anda','required');
			$this->form_validation->set_rules('nidn','nidn','trim|required');

			if ($this->form_validation->run() == TRUE) {
				$data = array('username' => $this->input->post('username', TRUE),'password' => $this->input->post('password', TRUE));
				//echo json_encode($data);
				//$temp_db = $this->input->post('db_ws',TRUE);
				$nidn = $this->input->post('nidn',TRUE);
				$hasil = $this->app_model->cek_user($data);
				$hasil_dosen = $this->app_model->get_dosen($nidn);
				if ($hasil->num_rows() == 1 && $hasil_dosen->num_rows()==1) {
					foreach ($hasil->result() as $sess){
						$this->user = $sess->username;
						$this->pass = $sess->password;
						$this->level = $sess->level;

					}
					foreach ($hasil_dosen->result() as $key) {
						$this->nidn = $key->nidn;
						$this->nama = $key->nm_dosen;
					}

					$session = array('login' => TRUE,
										'mode' => "on",
										 'url' => base_url(),
									 'user' => $this->user,
									 'level' => $this->level,
									 'nama' => $this->nama,
									 'nidn' => $this->nidn
						);

						$this->session->sess_expiration = '1800'; //session timeout 15 minute
						$this->session->set_userdata($session);

						if($this->level == 'dosen'){
							redirect('Index');
						}
						else {
							redirect('auth');
						}
				}
				else {
					echo "Not Macth";
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
