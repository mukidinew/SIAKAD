<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function index()
	{
		$data['breadcrumb']='Halaman Utama';
		$data['title']='Halaman Utama';
		load_view('beranda/beranda',$data);
	}
}
