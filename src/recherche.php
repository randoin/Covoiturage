<?php include "header.php" ?>

<fieldset>
<form action='recherche.php' method='post'>
<legend>Recherche de co-voiturage</legend>
<p>Ville de départ : <input type='text' name='depart'></p>
<p>Ville d'arrivée : <input type='text' name='arrivee'></p>
<input type="submit" value="Valider" />

</form>

</fiedlset>


<?php
	echo '<meta charset="UTF-8" />';


if(isset($_POST['depart'])){
	if(isset($_POST['arrivee'])){
	
		$depart=$_POST['depart'];
		$arrivee=$_POST['arrivee'];
		
		include("base.php");
		
		$req = "SELECT NUMEROCOVOIT, MONTANT, PLAQUEIMMATRICULATION, IDENTIFIANTLIEU, IDENTIFIANTLIEU_ARRIVEE, PLACESDISPO, DATEDEPART FROM covoiturage WHERE identifiantlieu='";
		$req .= $depart;
		$req .= "' AND identifiantlieu_arrivee='";
		$req .= $arrivee;
		$req .= "'";
		$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
		while ($data = mysql_fetch_array($exec)){
			
			echo "Veuillez cocher le covoiturage souhaité :<br>";
			echo "Départ de ".$data['IDENTIFIANTLIEU']." vers ".$data['IDENTIFIANTLIEU_ARRIVEE']."<br>";
			echo  "Ce covoiturage est proposé le ".$data['DATEDEPART']."<bq>";
			for ($i=0;$i<10;$i++){ echo "&nbsp";}
			echo "<input type='radio' name='select' value='".$data['NUMEROCOVOIT']."'/></br>";
			echo  "Il reste ".$data['PLACESDISPO']." places disponibles<br><br>";
		}
		
		echo "</br><input type='submit' value='Valider votre choix' name='validerCov'/>";
	}
}

?>


<?php include "footer.php" ?>

