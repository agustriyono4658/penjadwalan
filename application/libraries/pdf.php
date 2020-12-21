<?php
class pdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/fpdf181/fpdf.php';

        $pdf = new FPDF();
		$pdf->AddPage();
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
    }
}
?>