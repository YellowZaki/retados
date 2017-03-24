<?php 

class Pregunta {
	
	public static function cargar($id){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::recuperar($app->db, "PREGUNTAS", $id);
	}
	
	public static function eliminar($id){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::borrar($app->db,"PREGUNTAS", $id);
	}

	public static function guardar($guardar){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::guardar($app->db,"PREGUNTAS", $guardar);
	}
	private static function guardarRespuestas($respuestas){
		$app = \Slim\Slim::getInstance();
		
		
		foreach ($r as $respuestas){
			Respuesta::guardar($r);
		}
	}
}
?>
