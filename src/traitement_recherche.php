<?php 
	session_start();

	include("base.php");

	$requete2 = "INSERT INTO demandercovoiturage VALUES('".$_POST['select']."', ".$_SESSION['matricule'].", 0)";
	mysql_query($requete2);
	mysql_close();

	header("Location:payer.php");
 ?>