<?php 
	session_start();

	$_SESSION["session"] = $_POST["ident"];
	$_SESSION["password"] = $_POST["pass"];
	$_SESSION["instance"] = "127.0.0.1/xe";

	include("php_functions.php");

	$conn = connect($_SESSION["session"], $_SESSION["password"], $_SESSION["instance"]);

	if(!isset($_SESSION["session"])){
		header("Location:index.php");
	}

	else{
		header("Location:start_add_form.php");
	}
 ?>