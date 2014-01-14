<?php 
	session_start();

	include("base.php");

	$requete = "INSERT INTO demandercovoiturage VALUES('".$_POST['select']."', ".$_SESSION['matricule'].", 0)";
	mysql_query($requete);
	mysql_close();

	$_SESSION['numcovoit'] = $_POST['select'];

	header("Location:payer.php");
 ?>