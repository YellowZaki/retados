<?php 

class Respuesta {
	
<<<<<<< HEAD
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
		
=======
	public static function guardar($datos){
		$app = \Slim\Slim::getInstance();
		// TODO implementa tu código aquí
	}
	
	
>>>>>>> b8f50d8c8617b73429e81322dec03f1063d68ed5
}
?>
