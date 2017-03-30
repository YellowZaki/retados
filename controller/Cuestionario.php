<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
		Pregunta::sortear($numPreguntas);
		$p= Pregunta::sortear($numPreguntas);
		return Cuestionario::toJSON($preguntas);
	}
	}

?>

