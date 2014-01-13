<?php 
	$conn = mysql_connect("localhost", "root", "");

	if(!$conn){
		die('Connexion impossible : '.mysql_error());
	}
	echo 'Connecté correctement';

	mysql_select_db('mlr2', $conn);
 ?>