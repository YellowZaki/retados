<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
		Pregunta::sortear($numPreguntas);
		Cuestionario::toJSON($preguntas);
	}

	}
?>
