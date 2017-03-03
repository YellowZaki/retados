<?php 

class Pregunta {
	
	public static function cargarPregunta($id){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::recuperar($app->db, "PREGUNTAS", $id);
	}

}
?>
