<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
		$p= Pregunta::sortear($numPreguntas);
		return Cuestionario::toJSON($p);
	}
	
	public static function toJSON($preguntas){
	    $p Pregunta::generar (4)
		echo json_encode($p)
}


?>
