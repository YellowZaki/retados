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
	$r=AccesoDatos::listar($app->db, "RESPUESTAS", "*");
		$valores=array('respuestas'=>$r);
}
?>
