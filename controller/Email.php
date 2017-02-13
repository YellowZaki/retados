<?php

require_once('Google.php');
require getcwd().'/vendor/autoload.php';

// Documentación Swift_Message [http://goo.gl/Z12Bo]
	
class Email {

	// MEJORA meter en un fichero único de configuración
	
	const ADMIN_EMAIL 	= "jasvazquez@iesalandalus.com";
	const FROM_EMAIL	= "jasvazquez@iesalandalus.com";
	const FROM_NAME		= "profeIAP";	
	
    public static function enviar($to, $subject, $body) {
		
		if(Utilidades::isEntorno(Utilidades::ENTORNO_DESARROLLO))
			return self::enviarGMail($to, $subject, $body);
		else
			return self::enviarProduccion($to, $subject, $body);
	}
	
	private static function enviarProduccion($to, $subject, $body){
		
		$headers = "From: ".self::FROM_EMAIL."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($to, $subject, $body, $headers);
		
		return true;
	}
	
	private static function enviarDesarrollo($to, $subject, $body){
		
		// Cliente Android usa los hosts 
		// www.googleapis.com:443 y mail.google.com:443
		// Y FUNCIONA EN EL INSTITUTO
		
		// [https://goo.gl/z5lDLV] Para el uso de Google APIs
		
		// [https://goo.gl/JY8Ll] Técnicamente los puertos son 
		// TLS/STARTTLS: 587 y SSL: 465
		
		// TODO quitar clave email de aquí

		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, "ssl")
		  ->setUsername('TU_CORREO@gmail.com')
		  ->setPassword('CLAVE_ULTRA_SECRETA');

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance($subject)
		  ->setFrom(array(self::FROM_EMAIL => self::FROM_NAME))
		  ->setTo(array($to))
		  ->addPart($body, 'text/html');

		$result = $mailer->send($message);
	}
	
	public static function enviarGMail($to, $subject, $body) {
	
		// Get the API client and construct the service object.
		
		$client = Google::getClient(null);
		if(is_null($client)) return false;
		
		$service = new Google_Service_Gmail($client);

		$mail = new PHPMailer();
		
		$mail->CharSet = "ISO-8859-1";
		$mail->From = self::FROM_EMAIL;
		$mail->FromName = self::FROM_NAME;
		$mail->AddAddress($to);
		$mail->AddReplyTo(self::FROM_EMAIL,self::FROM_NAME);
		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->IsHTML(true); 
		$mail->preSend();
		$mime = $mail->getSentMIMEMessage();
		$m = new Google_Service_Gmail_Message();
		$data = base64_encode($mime);
		$data = str_replace(array('+','/','='),array('-','_',''),$data); // url safe
		$m->setRaw($data);
		
		$service->users_messages->send('me', $m);
		
		return true;
	}
	
	public static function getMessageAutenticacion($to, $token) {

		return 'Ha recibido el siguiente mensaje porque alguien ha solicitado acceder a la web <b><a href="http://localhost:9000">AlDictado</a></b> con su dirección de correo electrónico<br><br>'
			.  'Si ha sido ud. pulse el siguiente <a href="'.Utilidades::getCurrentUrl(false).'/usuario/autenticar/'.$token.'?email='.$to.'">enlace para entrar</a>.<br>'
			.  'En caso contrario, ignore este correo.<br><br>'
			.  'Gracias por su atención.';
	}
	
	public static function getMessageDictadosTerminados($email) {

		return "El usuario $email ha realizado todos los dictados existentes en la BD<br>"
			. "Deberíamos crear alguno nuevo para que no se 'aburra'.<br>"
			. "¿No te parece?";
	}
	
	public static function getMessageActividadSospechosa($email, $donde) {

		return "El usuario $email está realizando actividades extrañas en <b>'$donde'</b>";
	}

}

?>
