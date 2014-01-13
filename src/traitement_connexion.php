<?php 
	session_start();

	include('base.php');

	$requete = 'SELECT LOGIN, MOTDEPASSE FROM utilisateur';

	$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());

	while ($data = mysql_fetch_array($exec)){
		if (($data['LOGIN'] == $_POST['ident']) && ($data['MOTDEPASSE'] == $_POST['pass'])){
			$_SESSION['id'] = $_POST['ident'];
		}
	}

	mysql_free_result ($exec);
	mysql_close();

<<<<<<< HEAD
	header("Location:index.php");
=======
	header("Location:connexion.php");
>>>>>>> adb9279f94378fe54d9e44e7c06dd03e88f92e9a
 ?>