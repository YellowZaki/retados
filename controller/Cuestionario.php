<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
<<<<<<< HEAD
		Pregunta::sortear($numPreguntas);
		Cuestionario::toJSON($preguntas);
=======
		$p= Pregunta::sortear($numPreguntas);
		return Cuestionario::toJSON($p);
	}
>>>>>>> cd3c8f57aea3f7d55d597c2463c51522b100d98f
	}

	}
?>
