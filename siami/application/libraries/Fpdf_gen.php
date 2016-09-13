<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fPdf_gen {
	public function Fpdf_gen() {
		require_once APPPATH.'libraries/dompdf/dompdf_config.inc.php';
		$pdf = new DOMPDF();
		$CI =& get_instance();
		$CI->dompdf = $pdf;
	}
}

?>
