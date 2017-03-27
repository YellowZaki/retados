<?php 

class Pregunta {

	public static function sortear($num){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::listar($app->db, "PREGUNTAS", "texto", "1=1 order by random() limit $num");
	}
	
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
		
		
		foreach ($respuestas as $r){
			Respuesta::guardar($r);
		}
	}
}
?>
