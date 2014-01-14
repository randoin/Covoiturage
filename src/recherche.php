<?php include "header.php" ?>
<?php include("base.php") ?>

<?php include "demander.php" ?>

<fieldset>
<form action='recherche.php' method='post'>
<legend>Recherche de co-voiturage</legend>
<p>Ville de départ : <input type='text' placeholder='Ville de départ' name='depart'></p>
<p>Ville d'arrivée : <input type='text' placeholder="Ville d'arrivée" name='arrivee'></p>
<p>Jour du trajet : <input type='text' placeholder="JJ/MM/AAAA" name='date'></p>
<input type="submit" value="Valider" />

</form>

</fieldset>


<?php
	echo '<meta charset="UTF-8" />';


if(isset($_POST['depart'])){
	if(isset($_POST['arrivee'])){
	if(isset($_POST['date'])){
	
		$depart=$_POST['depart'];
		$arrivee=$_POST['arrivee'];
		$date=$_POST['date'];
		//$departOK=false;
		//$arriveeOK=false;

		

		/*
		$req = "SELECT NOMVILLE FROM lieu";
		
		$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
		while ($data = mysql_fetch_array($exec)){
			if($depart==$data['NOMVILLE']){
				$departOK=true;
			}
			if($arrivee==$data['NOMVILLE']){
				$arriveeOK=true;
			}
		}
		*/
		
		$req = "SELECT NUMEROCOVOIT, MONTANT, PLAQUEIMMATRICULATION, IDENTIFIANTLIEU, IDENTIFIANTLIEU_ARRIVEE, PLACESDISPO, DATEDEPART FROM covoiturage WHERE identifiantlieu='";
		$req .= $depart;
		$req .= "' AND identifiantlieu_arrivee='";
		$req .= $arrivee;
		$req .= "' AND datedepart='";
		$req .= $date;
		$req .= "'";
		$exec = mysql_query($req) or die('Erreur SQL: '.$req.' --- '.mysql_error());
		echo "Veuillez cocher le covoiturage souhaité :<p>";
		$tmp= 0;
		while ($data = mysql_fetch_array($exec)){
			echo "<form action='demander.php' method='post'>";
			echo "Départ de ".$data['IDENTIFIANTLIEU']." vers ".$data['IDENTIFIANTLIEU_ARRIVEE']."<br>";
			echo  "Ce covoiturage est proposé le ".$data['DATEDEPART']."<bq>";
			for ($i=0;$i<10;$i++){ echo "&nbsp";}
			echo "<input type='radio' name='select' value='".$data['NUMEROCOVOIT']."'/></br>";
			echo  "Il reste ".$data['PLACESDISPO']." places disponibles<br><br>";
			$tmp++;
			}
		if($tmp>0){echo "</br><input type='submit' value='Valider votre choix' name='validerCov'/>";}
		if($tmp==0){echo "Aucun covoiturage trouvé !";}
		}
	}
}

?>

<?php include "footer.php" ?>

