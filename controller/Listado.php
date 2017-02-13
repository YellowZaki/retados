<?php 

use Dompdf\Dompdf;

// TODO hacer funcionar ficheros CSS con DomPDF

// [https://goo.gl/caqU5A] Documentación de DomPDF

class Listados {

	public static function generarPDF($html, $nombre="print") {
		
		set_time_limit(300);
		ini_set('memory_limit', '-1');

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper( 'A4' , 'portrait' );
		$dompdf->render();
		echo $dompdf->stream($nombre);
	}
}	
?>
