<?php 
	include('base.php');

	$requete = "UPDATE etrepassager SET valide = 1 WHERE CODEPASSAGER = '".$_POST['code']."'";
	echo $requete;
	mysql_query($requete);
	mysql_close();

	header("Location:declarer_code.php");
 ?>