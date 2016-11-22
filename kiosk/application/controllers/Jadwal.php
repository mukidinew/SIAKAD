<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function index()
	{
		$data['breadcrumb']='Halaman Utama';
		$data['title']='Jadwal Mata Kuliah';
		$data['assign_js'] = 'jadwal/js/index.js';
		load_view('jadwal/jadwal',$data);
	}
}
