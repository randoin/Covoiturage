<?php 
	session_start();

	$conn = mysql_connect("127.0.0.1", "root", "");

	if(!$conn){
		die('Connexion impossible : ' . mysql_error());
	}
	echo 'Connecté correctement';

	mysql_select_db('mlr2', $conn);

	$requete = 'SELECT LOGIN, MOTDEPASSE FROM utilisateur';

	$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());

	while ($data = mysql_fetch_array($exec)){
		if (($data['LOGIN'] == $_POST['ident']) && ($data['MOTDEPASSE'] == $_POST['pass'])){
			$_SESSION['id'] = $_POST['ident'];
		}
	}

	mysql_free_result ($exec);
	mysql_close();

	if(!isset($_SESSION['id'])){
		header("Location:connexion.php");
	}

	else{
		header("Location:index.php");
	}
 ?>