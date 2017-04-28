<?php 

class Pregunta {

	public static function sortear($numPreguntas){
		$app = \Slim\Slim::getInstance();
		$preguntas=AccesoDatos::listar($app->db, "PREGUNTAS", "id, texto", "1=1 order by random() limit $numPreguntas");
		error_log("Hasta aquí vamos bien");
		foreach($preguntas as $p){
			error_log("Pregunta: ".json_encode($p));
			error_log("Debemos recuperar las respuestas de la pregunta ID=".$p["ID"]);
			$resp= Respuesta::sortear($p["ID"]); //["ID"];
			error_log("Las respuestas de la pregunta ".$p["ID"]." son: ".json_encode($resp));
		}
		
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
		
		error_log(">>>>>".json_encode($guardar));
		
		// Guardamos los datos de la PREGUNTA
		
		$app = \Slim\Slim::getInstance();
		
		$valorespregunta=array(
			"id"=>$guardar['id'],
			"texto"=>$guardar['pregunta']
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
