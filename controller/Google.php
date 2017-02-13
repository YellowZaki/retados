<?php 

require getcwd().'/vendor/autoload.php';

define('CREDENTIALS_PATH','~/.credentials/panelDeControl-googleOAuth.json');
define('APPLICATION_NAME','Gmail API PHP Quickstart');
// https://console.cloud.google.com para obtener el fichero client_secret.json
define('CLIENT_SECRET_FILE',getcwd().'/client_secret.json');

// [https://goo.gl/Lt3yv9] Los SCOPES de las distintas APIs
// If modifying these scopes, delete your previously saved credentials at ~/.credentials/panelDeControl-googleOAuth.json


define('SCOPES', implode(' ', array(
  'https://mail.google.com/', 
  'https://www.googleapis.com/auth/drive',	  
  'https://www.googleapis.com/auth/spreadsheets'
)));

// [https://goo.gl/Tv833H] Cambios de la Google API versión 1.0 a la 2.0	
// [https://goo.gl/T5g0nf] Ejemplos de uso
	
class Google {

	/**
	 * Returns an authorized API client.
	 * @return Google_Client the authorized client object
	 */
	 
	// [https://goo.gl/QZIHWU] Para descargar el fichero de credenciales client_id.json
	
	public static function getClient($authCode) {
	  
	  $client = new Google_Client();
	  $client->setApplicationName(APPLICATION_NAME);
	  $client->setScopes(SCOPES);
	  $client->setAuthConfigFile(CLIENT_SECRET_FILE);
	  $client->setAccessType('offline');
	  // [http://goo.gl/BgPqgZ] Obligamos a mostrar la solicitud de permisos para garantizar el refresh_token
	  $client->setApprovalPrompt('force'); 
	  // Añade nuevos permisos de forma progresiva a los que ya se tenían
	  $client->setIncludeGrantedScopes(true);
	  
	  // IDEA el parámetro 'State' permite continuar por donde íbamos 
	  // (permite que anotemos la url que fue invocada) en nuestra 
	  // aplicación tras la autorización [https://goo.gl/oDahl]
	  
	  // Load previously authorized credentials from a file.
	  $credentialsPath = self::expandHomeDirectory(CREDENTIALS_PATH);
	  if (file_exists($credentialsPath)) {
		$accessToken = file_get_contents($credentialsPath);
		Utilidades::getLogger()->debug('Recuperamos el fichero de credenciales');
	  } 
	  else
	  {
		
		if (!isset($authCode)){
			
			// TODO esto debería ir fuera de aquí
			
			$app = \Slim\Slim::getInstance();
			global $twig;
			
			Utilidades::getLogger()->debug('Solicitamos permisos para acceder a la cuenta de Google');
			
			$authUrl = $client->createAuthUrl();
			
			$valores=array('url'=>$authUrl);
			echo $twig->render('auth.php',$valores);  
			return;
		}else{
			// Exchange authorization code for an access token.
			$accessToken = $client->authenticate($authCode);
			
			// Store the credentials to disk.
			if(!file_exists(dirname($credentialsPath))) {
			  mkdir(dirname($credentialsPath), 0700, true);
			}
			Utilidades::getLogger()->debug('Anotamos el token de acceso');
			file_put_contents($credentialsPath, json_encode($accessToken,JSON_PRETTY_PRINT));
		}
	}
	  
	$client->setAccessToken($accessToken);

	if ($client->isAccessTokenExpired()) {
		
		Utilidades::getLogger()->debug('Actualizamos el token de acceso');
		
		$refresh=$client->getRefreshToken();
		$client->fetchAccessTokenWithRefreshToken($refresh);
		
		$token=$client->getAccessToken();
		
		// Si el nuevo token no contiene 'refresh_token' mantenemos el que ya teníamos
		if(! array_key_exists("refresh_token",$token)){
			$token['refresh_token']=$refresh;
			Utilidades::getLogger()->debug('Incluimos el "refresh_token" que teníamos');
		}
			
		file_put_contents($credentialsPath, json_encode($token,JSON_PRETTY_PRINT));
	}

	return $client;
	}

	/**
	 * Expands the home directory alias '~' to the full path.
	 * @param string $path the path to expand.
	 * @return string the expanded path.
	 */
	private static function expandHomeDirectory($path) {
	  $homeDirectory = getenv('HOME');
	  if (empty($homeDirectory)) {
		$homeDirectory = getenv("HOMEDRIVE") . getenv("HOMEPATH");
	  }
	  return str_replace('~', realpath($homeDirectory), $path);
	}   
}

?>
