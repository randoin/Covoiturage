<?php 
	session_start();

	include('base.php');

	$requete = 'SELECT ADRESSEMAIL, MOTDEPASSE FROM utilisateur';

	$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());

	while ($data = mysql_fetch_array($exec)){
		if (($data['ADRESSEMAIL'] == $_POST['ident']) && ($data['MOTDEPASSE'] == $_POST['pass'])){
			$_SESSION['id'] = $_POST['ident'];
		}
	}

	mysql_free_result ($exec);
	mysql_close();

	if(isset($_SESSION["session"])){
		header("Location:connexion.php");
	}
	else{
		header("Location:index.php");
	}
 ?>