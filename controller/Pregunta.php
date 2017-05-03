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
		$p=AccesoDatos::recuperar($app->db, "PREGUNTAS", $id);
		$p["RESPUESTAS"]=Respuesta::listar($id);
		error_log("Pregunta: ".json_encode($p));
		return $p;
	}
    	
	public static function eliminar($id){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::borrar($app->db,"PREGUNTAS", $id);
	} 
	
	private static function eliminarRespuestas($idPregunta){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::eliminar($app->db,"RESPUESTAS","ID_PREGUNTA=$idPregunta");
		
	}

	public static function guardar($guardar){
		
		error_log(">>>>>".json_encode($guardar));
		
		// Guardamos los datos de la PREGUNTA
		
		$app = \Slim\Slim::getInstance();
		
		$valorespregunta=array(
			"ID"=>$guardar['id'],
			"TEXTO"=>$guardar['texto'],
			"ETIQUETAS"=>$guardar['etiquetas']
		);
		
		AccesoDatos::guardar($app->db,"PREGUNTAS", $valorespregunta);
		
		// Guardamos las respuestas de la PREGUNTA
		
		unset($guardar['id']);
		unset($guardar['texto']);
		unset($guardar['etiquetas']);
		
		self::guardarRespuestas($guardar);
	}
	
	
	private static function guardarRespuestas($idPregunta, $respuestaCorrecta, $respuestas){
		$app = \Slim\Slim::getInstance();
		
		error_log("Los valores que me llegan son: ".json_encode($respuestas));
		
		foreach ($respuestas as $r){
			
			Respuesta::guardar($r);
		}
	}
}
?>
