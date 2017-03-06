<?php 

class Pregunta {
	
	public static function cargar($id){
		$app = \Slim\Slim::getInstance();
		return AccesoDatos::recuperar($app->db, "PREGUNTAS", $id);
	}

}
?>
