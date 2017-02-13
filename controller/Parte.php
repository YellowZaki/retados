<?php

class ParteIncidencia {

	/*
	 * Anota en Google Sheets un nuevo parte para que sea generado por AutoCrat usando la plantilla base
	 */
	public static function generarCarta($nombreAlumno, $motivos=[]){
		
		$now = new DateTime(null, new DateTimeZone('Europe/Madrid'));
		GoogleDrive::addContenidoCeldas(
			"1H_X5Dvo0pLDGy-MNhr8y9fsGyel_fZ7s5tY_lkUjvFM",
			"1022490561",
			[
				$now->format('Y/m/d H:i:s'),
				$nombreAlumno,	
				self::generarListadoMotivos($motivos)
			]);
	}

	/* Transforma el array de motivos en una cadena de textos que contiene un enumerado
	 * que puede ser visualizado correctamente en el Google Doc
	 */
	private static function generarListadoMotivos($motivos=[]){
		$rsdo="";
		foreach($motivos as $m){
			$rsdo=$rsdo."⚫  ".$m."\r\n";
		}
		return $rsdo;
	}
}

?>
