<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller {
	
	public function getoptjb(){
		$id = $this->input->post("id");
		$where = array("status"=>$id);
		
		$this->load->model("model_webservice","mw");
		$data = $this->mw->ambildatajb($where)->result();
		
		echo "<option>-- Pilih Jenis Pembayaran --</option>";
		foreach($data as $d){
			echo "<option value='".$d->kode_jns_bayar."'>".$d->nama_jns_bayar."</option>";
		}
		
	}
	
	public function getangkatan(){
		$id = $this->input->post("id");
		$where = array("kode_jns_bayar"=>$id);
		$this->load->model("model_webservice","mw");
		$data = $this->mw->ambildataangkatan($where)->result();
		
		echo "<option>-- Pilih Jenis Pembayaran --</option>";
		
		foreach($data as $d){
			$blacklist[] = $d->angkatan;
		}
		
		for($i=date("Y"); $i>=2009; $i--){
			if(!in_array($i, $blacklist)){
				echo "<option value='".$i."'>".$i."</option>";
			}
		}
	}
	
}

?>
