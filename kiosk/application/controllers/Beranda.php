<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function index()
	{
		$data['breadcrumb']='Halaman Utama';
		$data['title']='WELCOME TO STMIK ADHI GUNA';
		$data['assign_js'] = 'beranda/js/index.js';
		load_view('beranda/beranda',$data);
	}
}
