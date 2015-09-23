<?

	// Replace this with your own email address
	$to="handresvegarodriguez@gmail.com";

	// Extract form contents
	$name = $_POST['nombre'];
	$tel = $_POST['telefono'];
	$asunto = $_POST['asunto'];
	$comentarios = $_POST['comentarios'];
		
	// Return errors if present
	$errors = "";
	
	if($name =='') { $errors .= "nombre,"; }
	if($comentarios =='') { $errors .= "comentarios,"; }

	// Send email
	if($errors =='') {

		$headers =  'De: Mudanzas pronto <info@mudanzaspronto.com>'. "\r\n" .
					'Reply-To: '.$email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$email_subject = "Nuevo mensaje desde Mudanzas Pronto: $email";
		$message="Nombre: $name \n\nTel: $tel \n\nAsunto: $asunto \n\nComentarios:\n\n $comentarios";
	
		mail($to, $email_subject, $message, $headers);
		header('Location: /gracias.html');	
	} else {
		echo $errors;
	}
	
?>