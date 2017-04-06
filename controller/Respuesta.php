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
	
	public static function listar($idPregunta){
		$app = \Slim\Slim::getInstance();
	    return AccesoDatos::listar($app->db, "RESPUESTAS", "*", "ID_PREGUNTA=$idPregunta");
	}

	
	public static function sortear($idPregunta){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::listar($app->db, "RESPUESTAS", "texto", "ID_PREGUNTA=$idPregunta order by random() limit (select count(*) from RESPUESTAS where ID_PREGUNTA=$idPregunta");
	}	
	
	public static function guardar($datos){
		$app = \Slim\Slim::getInstance();
		AccesoDatos::guardar($app->db, "RESPUESTAS",$datos);
	}			

}
?>
