<?php 
	session_start();
	
	echo '<meta charset="UTF-8" />';

	include_once('header.php');

	$caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$caracteres .= '1234567890';
	$code = '';

	for($i = 0;$i < 6;$i++){
		$code .= substr($caracteres, rand() % (strlen($caracteres)), 1);
	}

	echo '<center>Votre code passager à fournir au conducteur une fois le trajet effectué: '.$code;
	echo '<br><br>';
	echo ' <a href="index.php">Retour à l\'accueil</a></center>';

	include_once('footer.php');
 ?>