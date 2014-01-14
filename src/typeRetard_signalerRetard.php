<?php
include("header.php");
session_start();
include("base.php");
?>
<meta charset="UTF-8" />

<?php
if(isset($_POST['numerocovoit']) && isset($_POST['type'])) {
	$req = "DELETE FROM ETREPASSAGER WHERE MATRICULE=".$_SESSION['matricule']." AND NUMEROCOVOIT =".$_POST['numerocovoit'];
	$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
}

header("Location:signalerRetard.php");
?>

<?php include "footer.php" ?>