<?php 

class Cuestionario {
	
	public static function generar(){
		$app = \Slim\Slim::getInstance();
		Pregunta::sortear();
		Cuestionario::toJSON();
	}

	}
?>
