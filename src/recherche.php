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
			echo "Départ de ".$data['IDENTIFIANTLIEU'].' vers '.$data['IDENTIFIANTLIEU_ARRIVEE'].'.<br>
				  Ce covoiturage est proposé le '.$data['DATEDEPART'].'. 
				  Il reste '.$data['PLACESDISPO'].'places disponibles<br>';
		}
		
		/*for($i=0;$i<NbLignes;$i++){
			if($tab[i][placesDispos]>0){
				echo "depart de ".$depart." le ".$tab[$i]['datedepart']."<br/>";
				echo '<input type="radio" name="select" value="'.$tab[$i]['NumeroCovoit'].'"/></br>'; 
				echo "il reste ".$tab[$i]['placesDispos']." places dans la voiture </br>";
			}
		}*/
		
		echo "</br><input type='submit' value='valider choix' name='validerCov'/>";
	}
}

?>
<fieldset>
<form action='recherche.php' method='post'>
<legend>Recherche de co-voiturage</legend>
<p>Ville de départ : <input type='text' name='depart'></p>
<p>Ville d'arrivée : <input type='text' name='arrivee'></p>
<input type="submit" value="Valider" />

</form>

</fiedlset>



