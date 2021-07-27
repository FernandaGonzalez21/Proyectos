<?php 
	
	if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
		isset($_POST["apellidos"]) && !empty($_POST["apellidos"]) &&
		isset($_POST["mail"]) && !empty($_POST["mail"]) &&
		isset($_POST["mensaje"]) && !empty($_POST["mensaje"])) {
		
		$nombre = $_POST["nombre"]." ".$_POST["apellidos"];
		$mail = $_POST["mail"];
		$mensaje = $_POST["mensaje"];

		#
		#if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		#	mail("juanoctavio68@gmail.com", $mail, $nombre, $mensaje);
		#	header("location: ../index.php?id=correcto");
		#}else{
		#	header("location: ../index.php?id=incorrecto");
		#}

		
	}else{
		header("location: ../indexP.php?id=incorrecto");
	}

	
	$mail = "test@example.com";
	$key = "JggbfzyPEa6KUsUEe8a4w";
    $url = "https://app.verificaremails.com/api/verifyEmail?secret=".$key."&email=".$mail;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    $response = curl_exec($ch);
    echo "La verificación fué ".$response;
    curl_close($ch);

	
	

?>