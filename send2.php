<?

	// Replace this with your own email address
	$to="info@mudanzaspronto.com";

	// Extract form contents
	$name = $_POST['nombre'];
	$tel = $_POST['telefono'];
	$email = $_POST['email'];
	$comentarios = $_POST['comentarios'];

	// Validate email address
	function valid_email($str) {
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
		
	// Return errors if present
	$errors = "";
	
	if($name =='') { $errors .= "nombre,"; }
	if(valid_email($email)==FALSE) { $errors .= "email,"; }
	if($comentarios =='') { $errors .= "comentarios,"; }

	// Send email
	if($errors =='') {

		$headers =  'De: Mudanzas pronto <info@mudanzaspronto.com>'. "\r\n" .
					'Reply-To: '.$email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$email_subject = "Nuevo mensaje desde Mudanzas Pronto: $email";
		$message="Nombre: $name \n\nTel: $tel \n\nEmail: $email \n\nComentarios:\n\n $comentarios";
	
		mail($to, $email_subject, $message, $headers);
		header('Location: /gracias.html');	
	} else {
		echo $errors;
	}
	
?>