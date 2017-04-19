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
	
	private static function eliminarRespuestas($idPregunta){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::eliminarRespuestas($app->db,"PREGUNTAS",$idPregunta);
	}

	public static function guardar($guardar){
		
		error_log(">>>>>".json_encode($guardar));
		
		// Guardamos los datos de la PREGUNTA
		
		$app = \Slim\Slim::getInstance();
		
		$valorespregunta=array(
			"ID"=>$guardar['id'],
			"TEXTO"=>$guardar['pregunta']
		);
		AccesoDatos::guardar($app->db,"PREGUNTAS", $valorespregunta);
		
		// Guardamos las respuestas de la PREGUNTA
		
		unset($guardar['id']);
		unset($guardar['pregunta']);
		
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
