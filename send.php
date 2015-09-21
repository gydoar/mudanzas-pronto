<?

	// Replace this with your own email address
	$to="handresvegarodriguez@gmail.com";

	// Extract form contents
	$name = $_POST['nombre'];
	$tel = $_POST['telefono'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$comentarios = $_POST['comentarios'];
		
	// Validate email address
	function valid_email($str) {
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	
	// Return errors if present
	$errors = "";
	
	if($name =='') { $errors .= "nombre_txt,"; }
	if(valid_email($email)==FALSE) { $errors .= "email_txt,"; }
	if($comentarios =='') { $errors .= "comentarios_txa,"; }

	// Send email
	if($errors =='') {

		$headers =  'De: Mudanzas pronto <info@mudanzaspronto.com>'. "\r\n" .
					'Reply-To: '.$email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$email_subject = "Nuevo mensaje desde Mudanzas Pronto: $email";
		$message="Nombre: $name \n\nEmail: $email \n\nTel: $tel \n\nAsunto: $asunto \n\nComentarios:\n\n $comentarios";
	
		mail($to, $email_subject, $message, $headers);
		echo "true<br>";
		print("Tu mensaje ha sido enviado con Exito, Pronto nos comunicaremos contigo");	
	} else {
		echo $errors;
	}
	
?>