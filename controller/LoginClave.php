<?php

require_once	'controller/Login.php';
require_once	'controller/AccesoDatos.php';
require_once	'controller/Usuario.php';

class LoginClave extends Login {

	public static function autenticar($pdo, $usuario, $clave){
		
		$u=AccesoDatos::buscar($pdo, "usuario", "ID, NOMBRE, EMAIL, CLAVE, ROL", "NOMBRE='$usuario'");
		
		// TODO usar hash contra el campo clave de la BD en lugar de tener la contraseña en claro
		
		$r=($clave==$u['CLAVE']);
		
		// Anotamos en sesión el usuario logado (si procede)

		if($r) $_SESSION['user']=new Usuario($u['NOMBRE'], $u['EMAIL'], $u['ROL']);
		
		return $r;
	}
	
	// Sobreescribimos el método de nuestra clase padre (ahora hay que pedir el email al Usuario que tenemos guardado en sesión)
	
	public static function getEmail(){
		
		if(!self::isLogged()) return null;
		
		$u=$_SESSION['user'];
		return $u->getEmail();
	}
	
	// Evita tener que definir innecesariamente métodos para acceder a la información del usuario
	// Recuperamos el objeto y le preguntamos por el dato que nos interese
	
	public static function getUsuario(){
		return (self::isLogged()?$_SESSION['user']:null);
	}
}
?>
