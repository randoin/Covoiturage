<?php 
	session_start();

	$conn = mysql_connect("127.0.0.1", "root", "");

	if(!$conn){
		die('Connexion impossible : ' . mysql_error());
	}
	echo 'Connecté correctement';

	mysql_select_db('mlr2', $conn);

	$sql = 'SELECT LOGIN, MOTDEPASSE FROM utilisateur';

	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	while ($data = mysql_fetch_array($req)) {
		echo($data['LOGIN']." : ".$_POST['ident']);
		if ($data['LOGIN'] == $_POST['ident']){
			if ($data['MOTDEPASSE'] == $_POST['pass']){
				$_SESSION['id'] = $_POST['ident'];
			}
		}
	}

	mysql_free_result ($req);
	mysql_close();

	if(!isset($_SESSION['id'])){
		header("Location:connexion.php");
	}

	else{
		header("Location:index.php");
	}
 ?>