<?php include("header.php") ?>
<?php include("base.php") ?>

<meta charset="UTF-8" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
	$(function() {
		$( "#date" ).datepicker();
	});
</script>
<h1>Recherche de covoiturage</h1>
<fieldset>
<form action='recherche.php' method='post'>
<p>Ville de départ : <input type='text' placeholder='Ville de départ' name='depart'></p>
<p>Ville d'arrivée : <input type='text' placeholder="Ville d'arrivée" name='arrivee'></p>
<p>Jour du trajet : <input type='text' placeholder="JJ/MM/AAAA" name='date' id="date"></p>
<input type="submit" value="Valider" />

</form>

</fieldset>

<form action="traitement_recherche.php" method="post">
<?php
if(isset($_POST['depart'])){
	if(isset($_POST['arrivee'])){
	if(isset($_POST['date'])){
	
		$depart=$_POST['depart'];
		$arrivee=$_POST['arrivee'];

		$date = date("Y-m-d", strtotime($_POST['date']));
		
		


		$req = "SELECT `NUMEROCOVOIT`, `MONTANT`, `IDENTIFIANTLIEU`, `IDENTIFIANTLIEU_ARRIVEE`, `PLACESDISPO`, `DATEDEPART`, `HEUREDEPART`,`NOM`,`PRENOM` FROM `covoiturage` join utilisateur on covoiturage.`CONDUCTEUR`=utilisateur.`MATRICULE` WHERE identifiantlieu='";
		$req .= $depart;
		$req .= "' AND identifiantlieu_arrivee='";
		$req .= $arrivee;
		$req .= "' AND datedepart='";
		$req .= $date;
		$req .= "'";
		$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
		$nbr= mysql_num_rows($exec);
		echo "<fieldset>";
		if($nbr > 0) echo "Veuillez cocher le covoiturage souhaité :<br/><br/>";
		while ($data = mysql_fetch_array($exec)){
			echo "<fieldset>";
			echo "Ce covoiturage est proposé par ".$data['PRENOM']." ".$data['NOM']." le ".$data['DATEDEPART'].".</br>";
			echo "Départ de ".$data['IDENTIFIANTLIEU']." vers ".$data['IDENTIFIANTLIEU_ARRIVEE']." à ".$data['HEUREDEPART'].".<br/>";
			echo "Le prix est de ".$data['MONTANT']."€.</br>";
			echo "Il reste ".$data['PLACESDISPO']." places disponibles.<br>";
			echo "Choisir : <input type='radio' name='select' value='".$data['NUMEROCOVOIT']."'/></br>";
			echo "</fieldset>";
			}
		if($nbr>0){echo "</br><input type='submit' value='Valider votre choix' name='validerCov'/>";}
		if($nbr==0){echo "Aucun covoiturage trouvé !";}
		echo "</fieldset>";
		}
	}
}
?>
</form>

<?php include "footer.php" ?>

