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
		
	public static function guardar($datos){
		$app = \Slim\Slim::getInstance();
		// TODO implementa tu código aquí
	}
	
	public static function listaraleatorio($id){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::listarrandom($app->db, "RESPUESTAS", "texto", "where ID_pregunta = 2 order by random() limit 4");
	}
	
	
}
?>
