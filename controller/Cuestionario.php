<?php 

class Cuestionario {
	
	public static function generar($numPreguntas){
		$app = \Slim\Slim::getInstance();
		$p= Pregunta::sortear($numPreguntas);
		return Cuestionario::toJSON($p);
	}
	
	public static function toJSON($preguntas){
		$rsdo="{";
		
	foreach ($preguntas as $p){
			$rsdo=$rsdo.Pregunta::guardar($p);
	}
	$rsdo=$rsdo."}"
	
	return $rsdo;
	
}


?>
