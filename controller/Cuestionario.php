<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
		$p= Pregunta::sortear($numPreguntas);
		return Cuestionario::toJSON($p);
	}
	}

?>

