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

	    $r=AccesoDatos::listar($app->db, "RESPUESTAS", "*", "ID_PREGUNTA=$idPregunta");
	    if(!$r)
			$r=self::getRespuestasVacias(4);

		return $r;
	}
	
	/* Genera un array de RESPUESTAS vacías para que la edición de PREGUNTA	
	 * tenga datos que mostrar y el usuario pueda rellenarlo 
	 */
	 
	 // IDEA obtener la estructura de la tabla lanzando SQL evitaría tener
	 // que cambiar este fragmento de código si decidimos cambiar la estructura
	 // de la tabla RESPUESTA en algún momento
	 
	private static function getRespuestasVacias($numRespuestas){
		
		$r=array();
		
		for ($i = 0; $i < $numRespuestas; $i++) {
			// Por defecto suponemos que la respuesta es INCORRECTA
			$r=array_merge($r, array(array("ID"=>"", "ID_PREGUNTA"=>"", "TEXTO"=>"","CORRECTA"=>"0")));
			//$r[i]=array("p"=>$i);
		}
		
		return $r;
	
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
