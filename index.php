
<?php 
// ------------------------------------------------------------------------------------------------
//
// SLIM
//
// [http://goo.gl/7KR4vx] Documentación oficial 
// [http://goo.gl/E2hriJ] Uso avanzado de Slim 
// [http://goo.gl/KMglou] Añadir Middleware a determinada ruta (o cómo comprobar está logado)
// [http://goo.gl/n2Q2Zk] Métodos (get, post, delete, ...) válidos en el enrutamiento
// [http://goo.gl/DYkgGd] Cómo mostrar flash() y error() en la Vista
// [http://goo.gl/UzoaCi] Slim MVC framework
//
// VISTA
//
// [http://goo.gl/hU1AVD] BootStrap
// [http://goo.gl/ikw3Cv] Herencia en las Vistas con Twing
//
// VARIOS
//
// [http://goo.gl/wxnSy]  PDO
// [http://goo.gl/pAsYSf] swiftmailer/swiftmailer con composer y "composer update"
// [http://goo.gl/Ld7VXw] Servidor NGINX
//
// GESTION DE USUARIOS
//
// [http://goo.gl/8GIxET] Gestión de sesión de usuario con Slim
// [http://goo.gl/sSJYcd] Control clásico de sesión de usuario en PHP
// [http://goo.gl/meF6p8] Autenticación y XSS con SlimExtra
// [http://goo.gl/PylJvT] Basic HTTP Authentication
// [http://goo.gl/ZZSBk8] PROBLEMA con usuario/clave sin SSL
// [http://goo.gl/9Wa71B] Librería uLogin para autenticación PHP
// [http://goo.gl/sShWmQ] Proteger API con oAuth2.0 (incluye ejemplo)
// [http://goo.gl/uhVAf]  Estudio sobre cómo proteger API sin oAuth
// [http://goo.gl/53iEcN] oAuth con Slim
// [http://goo.gl/PXt2YG] Otra implementación de oAuth
// ------------------------------------------------------------------------------------------------
// DUDA funcionará flash() y error() tras poner session_start() antes de header()
require 	 	'vendor/autoload.php';
require_once	'controller/Utils.php';
require_once	'controller/Pregunta.php';
require_once	'controller/Email.php';
require_once	'controller/GoogleDrive.php';
require_once	'controller/LoginClave.php';
require_once	'controller/Logger.php';
require_once	'controller/Listado.php';
require_once	'controller/AccesoDatos.php';
require_once	'controller/PermisosACL.php';
require_once	'controller/Parte.php';
session_cache_limiter(false);	
session_start();
header('Content-type: text/html; charset=utf-8');
use Respect\Validation\Validator as v;
Twig_Autoloader::register();  
$app = new \Slim\Slim(
		array(
			//'debug' => true,
			'templates.path' => './view'
		)
	);
	
$loader = new Twig_Loader_Filesystem('./view');  
$twig = new Twig_Environment($loader, array(  
	//'cache' => 'cache',  
));  
$app->container->singleton('db', function () {
	$db=new \PDO('sqlite:model/retados.db');
	$db->query("pragma foreign_keys=ON;");
	return $db;
});
$app->container->singleton('acl', function () {
	$app = \Slim\Slim::getInstance();
    return new PermisosACL($app->db);
});
$twig->addGlobal('login', new LoginClave()); // Para poder consultar si existe sesión de usuario abierta
$twig->addGlobal('acl', $app->acl); // Para poder consultar si existe sesión de usuario abierta
$app->get('/', function() use ($app){
    global $twig;
    echo $twig->render('inicio.php');  
}); 
$app->group('/auth','Login::forzarLogin', function () use ($app) {
	$app->get('/aceptar', function () use ($app){
		global $twig;
		
		$campos=Utilidades::getDatosFormulario($app);
		
		if(! array_key_exists('error',$campos) && ! is_null(Google::getClient($campos['code'])))
			echo $twig->render('auth_ok.php');
		else
			echo $twig->render('auth_nok.php');
	});
	$app->get('/cancelar', function () use ($app){
		global $twig;
		echo $twig->render('auth_nok.php');
	});
});
$app->group('/preguntas', function() use ($app){
		
		    $app->get('/pdf', function() use ($app){
		global $twig;
			
		$p=AccesoDatos::listar($app->db, "pregunta", "ID, TEXTO");
		$r=AccesoDatos::listar($app->db, "respuesta", "ID, ID_PREGUNTA, TEXTO, CORRECTA");
		$valores=array('respuestas'=>$r, 'preguntas'=>$p);
		
		
	 });
	
	$app->group('/buscar', function () use ($app) {
		
		$app->get('/porTexto', function() use ($app){
				global $twig;
				
				$valores=array(
					"valores"=>$app->request()->get('valor')
				);
				
			   /* $pdo=$app->db;
				* $q = $pdo->prepare("select * from partes where id_alumno=:id_alumno");
		    	* $q->execute($valores);
				* $r=$q->fetchAll(PDO::FETCH_ASSOC);
			*/
				
				$valores=array('comentarios'=>$r);
				echo $twig->render('partes.php',$valores);
				 
			});
			
		});
		
		
		
	
  $app->get('/borrar', function() use ($app){
		global $twig;
		AccesoDatos::borrar($app->db, "PREGUNTAS", $app->request()->get('idPregunta'));
		$app->redirect('/preguntas');
	}); 	
	
	$app->get('/editar', function() use ($app){
		global $twig;
		$datos=Pregunta::cargar($app->request()->get('ID'));
		/*echo json_encode($datos);
		return ;
		*/
		$valores=array('comentario'=>$datos);
		echo $twig->render('pregunta.php',$valores);  
		 	
	}); 	
	
	    $app->get('/', function() use ($app){
		global $twig;
		
		$r=AccesoDatos::listar($app->db, "PREGUNTAS", "ID, TEXTO");
		$valores=array('preguntas'=>$r);
		
		echo $twig->render('preguntas.php',$valores);  
	}); 
	
	
	
	$app->post('/guardar', function() use ($app){
		global $twig;
		$valores=Utilidades::getDatosFormulario($app);
		AccesoDatos::guardar($app->db,"PREGUNTAS", $valores);
		$valores['error']="Pregunta guardada correctamente";
		$valores['message']="Error al guardar la pregunta";
		echo $twig->render('preguntas.php',$valores);
	});
	
});
/*
 * Este bloque irá fuera tan pronto tengamos el primer formulario operativo
 */
 
$app->group('/prueba', function () use ($app) {
	$app->get('/', function() use ($app){
		global $twig;
		echo $twig->render('prueba.php');
	});
	$app->post('/guardar', function() use ($app){
		global $twig;
		$valores=Utilidades::getDatosFormulario($app);
		echo json_encode($valores);
	});
});

		$app->get('/guardarPregunta', function() use ($app){
		global $twig;
		$datos=Pregunta::guardarPregunta($app->request()->get('ID'));
		echo json_encode($datos);
	});
___________
$app->get('/about', function() use ($app){
	global $twig;
	echo $twig->render('about.php');  
}); 
$app->get('/logout', function () use ($app) {
		Login::forzarLogOut();
});
$app->group('/login', function () use ($app) {
	
	$app->get('/', function() use ($app){
		global $twig;
		echo $twig->render('login.php');  
	}); 
	
	$app->post('/', function() use ($app){
		global $twig;
		if(LoginClave::autenticar($app->db,$app->request()->post('nombre'), $app->request()->post('clave'))){
			echo $twig->render('inicio.php');
		}
		else{
			// IDEA cargar campos con los datos que ha utilizado para intentar entrar
			$valores['error']="Usuario/clave incorrectos";
			echo $twig->render('login.php',$valores);
		}
	}); 
});
// Ponemos en marcha el router
$app->run();
?>
