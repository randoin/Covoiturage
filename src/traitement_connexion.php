<?php 
	session_start();

	$conn = mysql_connect("127.0.0.1/xe", "root", "");

	if(!$conn){
		die('Connexion impossible : ' . mysql_error());
	}
	echo 'Connecté correctement';
	mysql_close($link);

	mysql_select_db('mlr2', $conn);

	$sql = 'SELECT LOGIN, MOTDEPASSE FROM utilisateur';

	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	$data = mysql_fetch_array($req);

	while ($data = mysql_fetch_array($req)) {
		if ($data['LOGIN'] == $_POST['ident']) && ($data['MOTDEPASSE'] == $_POST['pass']){
			$_SESSION['id'] = $_POST['ident'];
		}
	}

	if(!isset($_SESSION['id'])){
		header("Location:connexion.php");
	}

	else{
		header("Location:index.php");
	}
 ?>