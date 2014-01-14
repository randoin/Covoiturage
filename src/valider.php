<?php session_start(); include "header.php"; include "base.php"; ?>

<?php
	if(isset($_POST['a'])){
		mysql_query("UPDATE  `projet_agileb`.`demandercovoiturage` SET  `VALIDE` =  '1' WHERE  `demandercovoiturage`.`NUMEROCOVOIT` =".$_POST['covoit']." AND `demandercovoiturage`.`MATRICULE` =".$_POST['demande']);
	}
	else if(isset($_POST['r'])){
		mysql_query("DELETE FROM `projet_agileb`.`demandercovoiturage` WHERE `demandercovoiturage`.`NUMEROCOVOIT` = ".$_POST['covoit']." AND `demandercovoiturage`.`MATRICULE` = ".$_POST['demande']);
	}
?>

<script>
	function set(covoit, demande){
		document.forms['form'].elements['covoit'].value = covoit;
		document.forms['form'].elements['demande'].value = demande;
	}
</script>
<h1>Liste des demandes de covoiturage</h1>
<fieldset>
	
	
	<form action='valider.php' method='post' name='form'>
		<input type="hidden" name="covoit">
		<input type="hidden" name="demande">
		<table>
			<tr><td>Covoiturage</td><td>Demandeur</td><td>@mail</td><td></td><td></td></tr>
			<?php
				$req = mysql_query('SELECT `IDENTIFIANTLIEU`,`IDENTIFIANTLIEU_ARRIVEE`,`DATEDEPART`,`NOM`,`PRENOM`,`ADRESSEMAIL`,NUMEROCOVOIT,`MATRICULE` FROM `covoiturage` 
				JOIN `demandercovoiturage` using(`NUMEROCOVOIT`) 
				JOIN `utilisateur` using(`MATRICULE`) 
				WHERE `CONDUCTEUR` = (select `MATRICULE` from utilisateur where `ADRESSEMAIL` = \''.$_SESSION['id'].'\') and valide = 0');
				if(mysql_num_rows($req) > 0)
					while ($row = mysql_fetch_array($req)){
						echo "<tr><td>de ".$row['IDENTIFIANTLIEU']." a ".$row['IDENTIFIANTLIEU_ARRIVEE']." le ".$row['DATEDEPART']."</td><td>".
						$row['NOM']." ".$row['PRENOM']."</td><td>".$row['ADRESSEMAIL'].'</td><td><input type="submit" value="accepter" name="a" onclick="set('.$row['NUMEROCOVOIT'].','.$row['MATRICULE'].');"></td><td><input type="submit" value="refuser" name="r" onclick="set('.$row['NUMEROCOVOIT'].','.$row['MATRICULE'].');">
						';
					}
				else
					echo "<tr><td>aucune demande en attente de validation</td></tr>";
			?>
		</table>
	</form>
	<a href='index.php'><input type='button' value="Retour a l'accueil"></a>
</fieldset>


<?php include "footer.php"; ?>
