<?php 

class Pregunta {

	public static function sortear($numPreguntas){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::listar($app->db, "PREGUNTAS", "texto", "1=1 order by random() limit $numPreguntas");
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
		error_log(">>>>>".json_encode($guardar));
		$valorespregunta=array(
			"id"=>$guardar['id'],
			"texto"=>$guardar['texto']
		);
		AccesoDatos::guardar($app->db,"PREGUNTAS", $valorespregunta);
		unset($guardar['id']);
		unset($guardar['texto']);
		self::guardarRespuestas($guardar);
	}
	
	
	private static function guardarRespuestas($respuestas){
		$app = \Slim\Slim::getInstance();
		
		foreach ($respuestas as $r){
			Respuesta::guardar($r);
		}
	}
	
}
?>
