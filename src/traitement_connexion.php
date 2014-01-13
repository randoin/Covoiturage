<?php 
	session_start();

	$_SESSION["session"] = $_POST["ident"];
	$_SESSION["passe"] = $_POST["pass"];
	$_SESSION["instance"] = "127.0.0.1/xe";

	$conn = mysql_connect($_SESSION["instance"], $_SESSION["session"], $_SESSION["passe"]);

	if(!$conn){
		die('Connexion impossible : ' . mysql_error());
	}
	echo 'Connecté correctement';
	mysql_close($link);

	if(!isset($_SESSION["session"])){
		header("Location:connexion.php");
	}

	else{
		header("Location:accueil.php");
	}
 ?>