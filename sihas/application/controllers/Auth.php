<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
			$this->form_validation->set_rules('username','Username Feeder','trim|required');
			$this->form_validation->set_rules('password','Password Feeder','required');

			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username', TRUE); //base64_encode();
				$password = $this->input->post('password', TRUE); // base64_encode();
				$ta = $this->input->post('ta', TRUE); // base64_encode();
				// $data = array(
				// 	'username' => $username,
				// 	'password' => $password
				// );

				$hasil = $this->app_model->get_query("SELECT * FROM z_login_mhs WHERE username='".$username."' AND password='".$password."' AND ta='".$ta."'");
				if ($hasil->num_rows() == 1) {
					$hasil = $hasil->row();
					$session_prodi = array('login' => TRUE,
										 'url' => base_url(),
									 'user' => $hasil->username,
									 'level' => $hasil->level,
									 'nim' => $hasil->nim,
									 'nm_mhs'=> $hasil->nm_mhs,
									 'cheking' => $hasil->status_cek,
									 'status_mhs' => $hasil->status_mhs,
									 'ta' => $hasil->ta,
									 'kode_prodi'=>$hasil->id_prodi
						);

						$this->session->sess_expiration = '1800'; //session timeout 15 minute
						$this->session->set_userdata($session_prodi);

						//cek validasi baak
						if($hasil->level == 'mhs' && $hasil->val_periode=='N' && $hasil->status_cek=='Y'){
							$data = array('val_periode' => "Y");
							$update = $this->app_model->update("login_mhs",'id_user',$hasil->id_user,$data);
							if ($update==true) {
								redirect('Index');
							}
							else {
								echo "Database bermasalah Hubungi Pihak Admin";
							}
						}
						else if ($hasil->level == 'mhs' && $hasil->val_periode=='Y' && $hasil->status_cek=='Y') {
							redirect('Index');
							//echo $this->session->userdata('ta');
						}
						else if ($hasil->level == 'mhs' && $hasil->val_periode=='N' && $hasil->status_cek=='Y') {
							echo "Segera Validasikan Pembayaran Anda Ke BAAK";
						}
						else{
							redirect('auth');
						}
				}
				else {
					echo "Anda Belum Terdaftar Pada Periode Ini Segera Selesaikan Administrasi Anda";
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
