
<?php
include("header.php");
session_start();
include("base.php");
?>
<meta charset="UTF-8" />

<form action="typeRetard_signalerRetard.php" method="post">
<?php
	$req = "SELECT CO.NUMEROCOVOIT, MATRICULE,IDENTIFIANTLIEU_ARRIVEE, IDENTIFIANTLIEU, DATEDEPART FROM COVOITURAGE CO 
	JOIN ETREPASSAGER EP ON EP.NUMEROCOVOIT=CO.NUMEROCOVOIT WHERE MATRICULE='".$_SESSION['matricule']."'";
	$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
	echo "<fieldset>Veuillez cocher le covoiturage pour lequel vous signalez un retard ou une abscence :</fieldset>";
	$tmp= 0;
	while ($data = mysql_fetch_array($exec)){
		echo "<fieldset>";
		echo "Départ de ".$data['IDENTIFIANTLIEU']." vers ".$data['IDENTIFIANTLIEU_ARRIVEE']."<br>";
		echo  "Le ".$data['DATEDEPART']."<bq>";
		for ($i=0;$i<10;$i++){ echo "&nbsp";}
		echo "<input type='radio' name='numerocovoit' value='".$data['NUMEROCOVOIT']."'/></br>";
		echo "</fieldset>";
		$tmp++;
	}
?>

<fieldset>
	<input type='radio' name='type' value='absence'/> Absence </br>
</fieldset>
<?php
	if($tmp>0){echo "</br><input type='submit' value='Valider votre choix' name='validerCov'/>";}
	if($tmp==0){echo "Aucun covoiturage trouvé !";}
?>
</form>
<?php include "footer.php" ?>


