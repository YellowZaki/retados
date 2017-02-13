<?php

// [http://goo.gl/KHe0K0] Código base

# TODO incluir logger

abstract class TipoComentario
{
    const Error = -1;
    const HuellaConocida = 1;
    const HuellaNueva = 2;
}

abstract class TipoAccion
{
    const Comentar = 1;			// Mostrar algún aviso en el cliente
    const Mostrar = 2;			// Acceder a los datos de la persona cuya huella se ha identificado
    const Identificar = 3;		// Preguntar al usuario a quién pertenece una huella
}

class Upload {

	const DIR_HUELLAS_TEMP = 'resources/bd_temp/';
	const DIR_HUELLAS_CONOCIDAS = 'resources/bd/';
	
	/* Devuelve el minutiae mejor puntuado */
	public static function getMinutiaeCandidato ($minutiaes) {
		
		$rsdo=[];
		$valor=1;
		
		foreach($minutiaes as $m){
			$lin=explode(" ",$m);
			if($lin[0]>$valor){
				$rsdo=$lin;
				$valor=$lin[0];
			}
		}
		return $rsdo;
	}
	
	/* Obtiene el ID de la huella digital más probable de ser la correcta */
	
	public static function identificarHuella ($fichHuella) {
		
		$datos=self::getMinutiae($fichHuella);
		
		if (count($datos)<2){
			error_log("sin datos suficientes en la huella recibida");
			return;
		}
		
		$m=self::getMinutiaeCandidato($datos);
		error_log("El minutiae más parecido es ".json_encode($m));
		return strstr(substr(strrchr(implode(array_slice($m,2,4000)," "), "/"), 1), '.', true);
	}
	
	/*
	 * Comprueba si hay algún comentario sobre la última huella subida
	 */ 

	public static function existeComentarioHuella ($pdo) {
		
		$id_sesion=Utilidades::getSessionID();
		
		error_log("Buscando comentarios para ID PHP $id_sesion");
		
		# IDEA recuperar fila completa comentarios (orden ASC) y eliminar el más antiguo
		# De este modo se muestran todos los comentarios conforme se han ido  produciendo
		# y los borramos de uno en uno
		
		$sql="select id, tipo_comentario, texto from comentario where leido=0 AND id_php='$id_sesion' order by id desc limit 1";
		$r = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
		
		if($r){
			echo json_encode($r);
			self::anotarComentarioHuellaLeido($pdo);
		}
		else
			echo "";
	}
	
	private static function anotarComentarioHuellaLeido($pdo){
		
		$id_sesion=Utilidades::getSessionID();
		
		$sql="UPDATE comentario SET leido=1 WHERE id_php=:id_sesion AND leido=0";
		
		#error_log("ID Sesión $lector_sesion anota $comentario");

		$q = $pdo->prepare($sql);
		$q->execute(array(':id_sesion'=>$id_sesion));
	}
	
	private static function borrarComentarioHuella($pdo, $uuid){
		
		$id_sesion=Utilidades::getSessionID();
		
		$sql="DELETE FROM comentario WHERE id_php=:id_sesion AND id=:uuid";
		
		$q = $pdo->prepare($sql);
		$q->execute(array(
			':id_sesion'=>$id_sesion,
			':uuid'=>$uuid
		));
	}
	
	// Anota un comentario para que sea mostrado en la web

	private static function anotarComentarioHuella($pdo, $tipoComentario=TipoComentario::HuellaConocida, $comentario){
		
		# IDEA meter campo en la BD que anote la fecha y hora
		# El objetivo es borrar cualquier mensaje que se haya perdido tras cierre accidental del navegador y/o script lector de huellas
		
		$lector_sesion=Utilidades::getSessionID();
		
		$sql="
			INSERT INTO comentario (ID, ID_PHP, TEXTO, TIPO_COMENTARIO) 
			SELECT :id, ID_PHP, :comentario, :tipo FROM vinculacion 
			WHERE id_lector=:id_lector
			order by id desc limit 1
		";
		
		#error_log("ID Sesión $lector_sesion anota $comentario");
		
		$uuid=Utilidades::generateUUID();

		$q = $pdo->prepare($sql);
		$q->execute(array(':id'=>$uuid,
						   ':id_lector'=>$lector_sesion,
						   ':tipo'=>$tipoComentario,
						   ':comentario'=>$comentario));
		return $uuid;
	}
	
	// IDEA sacar código a Vinculacion.php (similar a Login.php)
	
	private static function anotarVinculacionInit($pdo, $lector_sesion,$token){
		$sql = "INSERT INTO vinculacion (id_lector,token) VALUES (:id_lector,:token)";
		$q = $pdo->prepare($sql);
		$q->execute(array(':id_lector'=>$lector_sesion,
						  ':token'=>$token));
	}
	
	private static function anotarVinculacionConfirm($pdo,$token, $php_sesion){
		$sql = "UPDATE vinculacion SET id_php=:php_sesion WHERE token=:token";
		$q = $pdo->prepare($sql);
		$q->execute(array(':php_sesion'=>$php_sesion,
						  ':token'=>$token));
	}
	
	// Comprueba si existe alguna anotación del TOKEN para el correo EMAIL
	
	private static function validateTokenAutenticacion($pdo, $token) {
		
		$sql = $pdo->prepare('SELECT count(*) num FROM vinculacion WHERE token=?');
		if(!$sql->execute(array($token)))
			return false;
		
		$r = $sql->fetch();
		return $r['num']>0;
	}
	
	/* Abre una sesión de navegación desde el lector de huellas */
	public static function iniciarVinculacionLectorHuellas ($pdo) {
		
		// DUDA introducimos algún modo de autenticación (podría ser la huella de un usuario con "permisos")
		
		// IDEA	el proyecto dictados crea mejores tokens en BD.AUTENTICACION
		
		$uuid=uniqid(date('Ymd').'-');
		self::anotarVinculacionInit($pdo, Utilidades::getSessionID(),$uuid);

		$datos=array('token'=>$uuid);
		return json_encode($datos);
	}
	
	public static function confirmarVinculacionLectorDeHuellas($pdo, $token){
		
		// DUDA cualquiera que "acierte" el token validaría la vinculación (debemos indicar algún parámetro más)
		
		if (self::validateTokenAutenticacion($pdo, $token)){
			self::anotarVinculacionConfirm($pdo, $token, Utilidades::getSessionID());
			return true;
		} 
		
		// No tiene sentido mientras que sólo se utilice "token" para vincular la sesión
		/*
		else{
			borrarVinculacion($pdo, $token);
			return false;
		}
		*/

		// DUDA si nos llaman sin "acertar" algún token válido ¿deberíamos penalizar por IP o similar?
		return false;
	}
	
	public static function getMinutiae ($fichHuella) {
		
		# Establecemos el entorno de NBIS
		# TODO obtener dimensiones (alto x ancho) y profundidad (bits) usando el comando identify y expresiones regulares sobre el resultado
		exec("/bin/bash -c 'source ./resources/nbis-env.sh; cwsq .75 wsq $fichHuella -r 384,289,8 2>&1'",$outputArray, $errArray);
		# IDEA comprobar que la calidad es suficiente (<3) para seguir procesando la huella (o detener el proceso)
		exec("/bin/bash -c 'source ./resources/nbis-env.sh; nfiq $fichHuella.wsq 2>&1'",$outputArray, $errArray);
		# Extraemos los 'minutiae'
		exec("/bin/bash -c 'source ./resources/nbis-env.sh; mindtct -b -m1 $fichHuella.wsq $fichHuella.* 2>&1'",$outputArray, $errArray);
		
		# IDEA usar la constante DIR_HUELLAS_CONOCIDAS
		# Buscamos la huella
		exec("/bin/bash -c 'source ./resources/nbis-env.sh; bozorth3 -m1 -A outfmt=spg -T 20 -p $fichHuella.wsq.xyt ./resources/bd/*.xyt 2>&1'",$outputArray, $errArray);
		#error_log(">>>> ".json_encode($outputArray));
		return $outputArray;
	}
	
	public static function eliminarFicherosAuxiliares ($fichTemp) {
		
		# TODO borrar ficheros de DIR_HUELLAS_TEMP que lleven "demasiado" tiempo ahí (se está acumulando basura)
		# TODO borrar mensajes de BD.comentarios que lleven "demasiado" tiempo 
		
		$files = glob($fichTemp.'*'); 
		#echo "\nHay ".count($files)." ficheros derivados de $fichTemp que cumplen con el patrón ".$fichTemp.'*\n';
		foreach($files as $file){ 
		  if(is_file($file))
			unlink($file); 
		}
	}
	
	public static function anotarNombre($pdo){

		$app = \Slim\Slim::getInstance();

		$id=$app->request()->post('sesion');
		$nombre=$app->request()->post('nombre');
		
		$files = glob(self::DIR_HUELLAS_TEMP.'*'.$id.'*'); 

		# DUDA sólo debería haber una huella (en caso contrario las vamos a llamar todas igual y va a petar)
		foreach($files as $file){ 
		  # Si existe la huella indicada, la movemos al directorio de las huellas conocidas y le asignamos el nombre correcto
		  if(is_file($file)){
			# DUDA está bien ignorar el error y que lo vuelva a pedir la próxima vez
			copy($file, self::DIR_HUELLAS_CONOCIDAS.$nombre.'.wsq.xyt');
			# Borramos el fichero de DIR_HUELLAS_TEMP
			unlink($file);
		  }
		}
		
		self::borrarComentarioHuella($pdo, $id);
	}
	
	public static function anotarHuella ($fichTemp, $uuid) {
		
		# DUDA meter por delante id_session para eliminar rastros luego o buscar ficheros fácilmente
		
		#$name = uniqid(date('Ymd').'-').".xyt";
		$name = date('Ymd').'-'.$uuid.".xyt";
		
		$dst=self::DIR_HUELLAS_TEMP . $name;

		if (copy($fichTemp, $dst) === false){
			#echo "Fallo al mover el fichero $fichTemp a $dst";
			return "";
		}
		
		# IDEA al eliminar sesión de usuario, borrar todos los ficheros que hayan podido quedar atrás de dicha sesión
		
		return $name;
	}
	
	
	public static function uploadFile ($pdo) {
		
		$app = \Slim\Slim::getInstance();
		
		global $twig;
		
		if (!isset($_FILES['fichero'])) {
			# TODO devolver error al cliente
			self::anotarComentarioHuella($pdo, TipoComentario::Error, "La huella no ha llegado bien");
			return;
		}
		
		$files = $_FILES['fichero'];
		
		$id_huella=self::identificarHuella($files['tmp_name']);
		if($id_huella==""){
			$uuid= self::anotarComentarioHuella($pdo, TipoComentario::HuellaNueva, "Creo que no nos conocemos...¿Cómo te llamas?");
			# Sólo nos interesará el .xyt del minutiae
			$h=self::anotarHuella($files['tmp_name'].".wsq.xyt", $uuid);
		}
		else
		{
			self::anotarComentarioHuella($pdo, TipoComentario::HuellaConocida, "Bienvenid@ de nuevo $id_huella");
		}
		
		self::eliminarFicherosAuxiliares($files['tmp_name']);
		return;
		
	}	
}

?>
