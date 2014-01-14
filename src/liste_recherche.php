<?php session_start(); include "header.php"; include "base.php"; ?>

<script>
	function set(depart, arrivee, date){
		document.forms['form'].elements['depart'].value = depart;
		document.forms['form'].elements['arrivee'].value = arrivee;
		document.forms['form'].elements['date'].value = date;
		alert(depart);
	}
</script>

<h1>Etat des recherches de covoiturage</h1>
<fieldset>
		<form action='recherche.php' method='post' name='form'>
		<input type="hidden" name="depart">
		<input type="hidden" name="arrivee">
		<input type="hidden" name="date">
		<table border=2 cellpadding=10>
			<?php
				$req = mysql_query("SELECT `IDENTIFIANTLIEU`,`IDENTIFIANTLIEU_ARRIVEE`,`DATEDEPART` FROM `cherchercovoit` JOIN utilisateur
					USING (  `MATRICULE` ) 
					WHERE  `ADRESSEMAIL` = '".$_SESSION['id']."'");
				if(mysql_num_rows($req) > 0){
				    echo "<tr><td>Covoiturage recherché</td><td>Propositions</td></tr>";
					while ($row = mysql_fetch_array($req)){
						$req3 = "SELECT `NUMEROCOVOIT` FROM `covoiturage` join utilisateur on covoiturage.`CONDUCTEUR`=utilisateur.`MATRICULE` WHERE identifiantlieu='";
						$req3 .= $row['IDENTIFIANTLIEU'];
						$req3 .= "' AND identifiantlieu_arrivee='";
						$req3 .= $row['IDENTIFIANTLIEU_ARRIVEE'];
						$req3 .= "' AND datedepart='";
						$req3 .= $row['DATEDEPART'];
						$req3 .= "'";
						$req2 = mysql_query($req3);
						if(mysql_num_rows($req2) > 0)
							echo "<tr><td>le ".$row['DATEDEPART']." de ".$row['IDENTIFIANTLIEU']." à ".$row['IDENTIFIANTLIEU_ARRIVEE']."  </td><td><input type='submit' value='trouvé' onclick=\"set('".$row['IDENTIFIANTLIEU']."','".$row['IDENTIFIANTLIEU_ARRIVEE']."','".$row['DATEDEPART']."');\"></td></tr>
							";
						else
							echo "<tr><td>le ".$row['DATEDEPART']." de ".$row['IDENTIFIANTLIEU']." à ".$row['IDENTIFIANTLIEU_ARRIVEE']."  </td><td>aucune</td></tr>";
					}
				}
				else
					echo "<tr><td>Aucune recherche en attente. </td></tr>";
			?>
		</table>
		</form>
	<br/>
	<a href='index.php'><input type='button' value="Retour a l'accueil"></a>
</fieldset>

<?php include "footer.php"; ?>
