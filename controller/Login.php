<?php

class Login {

	// Comprueba si hay una sesión de usuario abierta

	public static function isLogged(){
		return isset($_SESSION['user']);
	}
	
	// Otiene el email del usuario logado (o null en caso contrario)
	
	public static function getEmail(){
		return (self::isLogged()?$_SESSION['user']:null);
	}
	// Obliga que el usuario esté logado mostrando el formulario
	// de login si es preciso
	
	public static function forzarLogin(){
		
		$app = \Slim\Slim::getInstance();

		if (!self::isLogged()) {
			global $twig;
			//echo "Vienes de ".$app->request->getResourceUri();
			// TODO falta saber de dónde viene tras login.php para enviarlo allí en lugar de a inicio.php
			echo $twig->render('login.php');
			$app->stop();
		}
	}

	// Cierra la sesión de usuario 
	
	public static function forzarLogOut(){
		$app = \Slim\Slim::getInstance();
		unset($_SESSION['user']);
		$app->redirect('/');
	}
	
	// Comprueba que el login proporcionado sea correcto
	
    public static function autenticar($pdo, $email, $token) {
		
		// Comprobamos si el token es correcto
		$r=self::validateTokenAutenticacion($pdo, $email, $token);
		self::borrarTokenAutenticacion($pdo, $email);
		
		// Anotamos en sesión el usuario logado (si procede)
		if($r) $_SESSION['user']=strtoupper($email);
		
		// Devolvemos rsdo de la autenticación
		return $r;
	}
	
	// Comprueba si existe alguna anotación del TOKEN para el correo EMAIL
	
	private static function validateTokenAutenticacion($pdo, $email, $token) {
		
		$sql = $pdo->prepare('SELECT count(*) num FROM autenticacion WHERE email=? AND token=?');
		if(!$sql->execute(array($email, $token)))
			return false;
		
		$r = $sql->fetch();
		return $r['num']>0;
	}

	// Crea un token único de autenticación y lo anota para su posterior comprobación
	
	public static function generarTokenAutenticacion($pdo, $email){
		
		$t=self::getToken(128);
		self::anotarTokenAutenticacion($pdo, $email, $t);
		
		return $t;
	}
	
	// Anota en la BD el token de autenticación enviado a cierta dirección de correo electrónico
	
	private static function anotarTokenAutenticacion($pdo, $email, $token) {
		$sql = "INSERT INTO autenticacion (email,token) VALUES (:email,:token)";
		$q = $pdo->prepare($sql);
		$q->execute(array(':email'=>$email,
						  ':token'=>$token));
	}
	
	// Elimina de la BD cualquier anotación del EMAIL indicado
	
	private static function borrarTokenAutenticacion($pdo, $email) {
		
		// TODO gestionar error al intentar borrar
		
		$sql = "DELETE FROM autenticacion WHERE email=:email";
		$q = $pdo->prepare($sql);
		$q->execute(array(':email'=>$email));
	}

	private static function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
	}

	private static function getToken($length){
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		for($i=0;$i<$length;$i++){
			$token .= $codeAlphabet[self::crypto_rand_secure(0,strlen($codeAlphabet))];
		}
		return $token;
	}
}

?>
