<?php 
	session_start();

	include('base.php');

	$requete = 'SELECT MATRICULE, ADRESSEMAIL, MOTDEPASSE, NOM, PRENOM FROM utilisateur';

	$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());

	while ($data = mysql_fetch_array($exec)){
		if (($data['ADRESSEMAIL'] == $_POST['ident']) && ($data['MOTDEPASSE'] == $_POST['pass'])){
			$_SESSION['id'] = $_POST['ident'];
			$_SESSION['nom'] = $data['NOM'];
			$_SESSION['prenom'] = $data['PRENOM'];
			$_SESSION['matricule'] = $data['MATRICULE'];
		}
	}

	mysql_free_result ($exec);
	mysql_close();

	if(!isset($_SESSION["id"])){
		header("Location:connexion.php");
	}
	else{
		header("Location:index.php");
	}
 ?>