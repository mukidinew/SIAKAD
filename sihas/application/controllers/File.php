<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * WS Client Feeder File Module
 *
 * @author 		Yusuf Ayuba
 * @copyright   2015
 * @link        http://jago.link
 * @package     https://github.com/virbo/wsfeeder
 *
*/

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
		else if($this->session->userdata('level') != 'mhs'){
				redirect('auth/logout');
		}
		else {
			$this->path_temps = $this->config->item('path_temps');
			//$this->xml_file = 'wsclient.xml';
			$this->url_ws = $this->config->item('url_ws');
			$this->url_update = $this->config->item('url_update');
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
			redirect('welcome');
		}
	}

	public function check()
	{
		$test_ping = ping($this->url_ws,80);
		if ($test_ping) {
			$test_get = read_file($this->url_update.'check/'.$this->session->userdata('header'));
			echo $test_get;
		} else {
			echo "";
		}
	}


}
