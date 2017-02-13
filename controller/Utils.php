<?php

// Documentación Swift_Message [http://goo.gl/Z12Bo]
	
class Utilidades {
	
	const ENTORNO_DESARROLLO = 'localhost';
	const ENTORNO_PRODUCCION = 'dictados.wesped.es';

	// Devuelve el entorno actual
	
    public static function getEntorno() {
		switch ($_SERVER['SERVER_NAME']) {
		  case self::ENTORNO_DESARROLLO:
			return self::ENTORNO_DESARROLLO;
			break;
		  case self::ENTORNO_PRODUCCION:
			return self::ENTORNO_PRODUCCION;
			break;
		  default:
			throw new Exception("Entorno de servidor desconocido. Compruebe que '".$_SERVER['SERVER_NAME']."' se encuentra entre los nombres de servidor indicados como entornos."); 
			break;
		}
	}
	
	// Indica si el array proporcionado es asociativo (key, value) o secuencial (values)
	private static function isAssoc($array){
		return count(array_filter(array_keys($array), 'is_string')) > 0;
	}
	
	// Pasa a mayúscula todas las entradas de un array
	// Si es un array asociativo, cambia las claves pero no los valores
	
	public static function array_ucase($array) {
		if(self::isAssoc($array))
			return array_change_key_case($array, CASE_UPPER);
		else
			return array_map("strtoupper", $array); 
	}
		
	// Devuelve un listado con los campos que ha enviado un formulario al controlador
	
	public static function getCamposFormulario($app, $ordenarCampos=false, $ucase=false) {
		$req = $app->request;
		$campos= array_keys($req->params());
		
		if($ordenarCampos) asort($campos,3);
		if($ucase) $campos=self::array_ucase($campos);
		
		return $campos;
	}
	
	public static function getDatosFormulario($app, $ordenarCampos=false, $ucase=false) {
		$req = $app->request;
		$campos= array_keys($req->params());
		
		if($ordenarCampos) asort($campos,3);
		foreach($campos as $c){
			$valores[($ucase?strtoupper($c):$c)]=$req->params($c);
		}
		
		return $valores;
	}
	
	// Indica si nos encontramos en el entorno que nos indican
	
	public static function isEntorno($entorno) {
		return self::getEntorno()==$entorno;
	}
	
	// Obtiene la url http[s] al servidor actual
	
	public static function getCurrentUrl($full = true) {
          return "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'];
    }
    
    // Obtiene el ID de la sesión actual
	
	public static function getSessionID() {
		return session_id();
	}
	
	public static function generateUUID() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
	
	// Lista los campos que sobran (o faltan) entre el formulario y la BD
	//
	// Útil a la hora de comprobar si nos hemos equivocado al escribir el nombre
	// de alguno de ellos (typos), se nos ha olvidado alguno o hemos puesto alguno de más
	
	public static function compararCorrespondenciaCampos($app, $nombreTabla){
		
		$valores_bd= AccesoDatos::getCamposTabla($app->db, $nombreTabla, true);
		$valores_form=Utilidades::getCamposFormulario($app,true,true);
		
		$valores_faltan=array_diff($valores_bd, $valores_form);
		$valores_sobran=array_diff( $valores_form,$valores_bd);
		
		$rsdo="<br>Faltan:";
		$rsdo=$rsdo.self::prettyPrintJSON($valores_faltan);
		$rsdo=$rsdo."<br>Sobran:";
		$rsdo=$rsdo.self::prettyPrintJSON($valores_sobran); 
	
		return $rsdo;
	}
	
	// Formatea un objeto JSON para que resulte más sencillo su lectura
	// Añade al String generado, las etiquetas "<pre>" de HTML para que se muestre correctamente en pantalla
	
	public static function prettyPrintJSON($json){
		return "<PRE>".json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."</PRE>";
	}
	
	// Intenta rellenar la lista de valores que espera la BD escribiendo los campos
	// con el uso de mayúsculas/minúsculas que se han usado en la tabla de la BD
	
	// Que el programador no tenga cuidado supone dos consultas a la BD por cada inserción (penaliza el rendimiento)
	
	public static function optimizarCorrespondenciaCampos($bd, $form){
		
		// Anotamos los que coinciden en ambos conjuntos
		
		$coinciden=array_intersect($bd, array_keys($form));
		
		foreach($coinciden as $c)
		{
			$rsdo[$c]=$form[$c];
		}
		
		// Buscamos los campos que faltan y que existen con un nombre escrito de otro modo
		
		$form_ucase=Utilidades::array_ucase(array_keys($form));
		
		foreach(array_diff($bd, array_keys($form)) as $c){
			echo strtoupper($c)."<br>";
			
			if(in_array(strtoupper($c), $form_ucase))
			{
				$pos_bd=array_search($c, $bd);
				$pos_fm=array_search(strtoupper($c),$form_ucase);
				
				$rsdo[$bd[$pos_bd]]=$form[array_keys($form)[$pos_fm]];
			}
		}
		
		return $rsdo;
	}
	
	public static function mostrarSessionID(){
		
		$app = \Slim\Slim::getInstance();
		global $twig;
		
		$valores=array(
				'id_sesion'=>self::getSessionID()
			);
		echo $twig->render('session.php',$valores);
	}
	
	public static function registrarAccion(){

		$app = \Slim\Slim::getInstance();
		$pdo=$app->db;

		$valores=array(
			'url'=>$app->request->getPathInfo());
			
	 	$sql = "INSERT INTO accion (ruta) VALUES (:url)";
		$pdo=$app->db;
		$q = $pdo->prepare($sql);
		$q->execute($valores);
	}
	
	public static function getLogger(){
		$dir=getcwd().'/logs';
		return new Katzgrau\KLogger\Logger($dir);
	}
	
}

?>
