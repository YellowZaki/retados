<?php 

class Respuesta {
	
	public static function cargar($id){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::recuperar($app->db, "RESPUESTAS", $id);
	}
	
	public static function eliminar($id){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::borrar($app->db,"RESPUESTAS", $id);
	}
	
	public static function listar($id){
		$app = \Slim\Slim::getInstance();
	    return AccesoDatos::listar($app->db, "RESPUESTAS", "*");
	}

	
	public static function sortear($idPregunta,$numRespuestas){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::listar($app->db, "RESPUESTAS", "texto", "ID_PREGUNTA=$idPregunta order by random() limit $numRespuestas");
	}	
	
	public static function guardar($datos){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::guardar($app->db, "RESPUESTAS",$datos);
	}			

}
?>
