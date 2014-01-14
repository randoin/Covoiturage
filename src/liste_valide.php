<?php session_start(); include "header.php"; include "base.php"; ?>

<h1>Etat des demandes de covoiturage</h1>
<fieldset>
		<table border=2 cellpadding=10>
			<?php
				$req = mysql_query("SELECT  `DATEDEPART` ,  `HEUREDEPART` ,  `IDENTIFIANTLIEU` ,  `IDENTIFIANTLIEU_ARRIVEE` ,  `VALIDE`  FROM  `demandercovoiturage` 
					JOIN covoiturage
					USING (  `NUMEROCOVOIT` ) 
					WHERE  `MATRICULE` = ( 
					SELECT  `MATRICULE` 
					FROM utilisateur
					WHERE  `ADRESSEMAIL` =  '".$_SESSION['id']."' ) ");
				if(mysql_num_rows($req) > 0){
				    echo "<tr><td>Covoiturage</td><td>Etat de la demande</td></tr>";
					while ($row = mysql_fetch_array($req)){
						if($row['VALIDE'] == 1)
							echo "<tr><td>le ".$row['DATEDEPART']." à ".$row['HEUREDEPART']." de ".$row['IDENTIFIANTLIEU']." à ".$row['IDENTIFIANTLIEU_ARRIVEE']."  </td><td>confirmé<td></tr>";
						else
							echo "<tr><td>le ".$row['DATEDEPART']." à ".$row['HEUREDEPART']." de ".$row['IDENTIFIANTLIEU']." à ".$row['IDENTIFIANTLIEU_ARRIVEE']."  </td><td>en attente</td></tr>";
					}
				}
				else
					echo "<tr><td>Aucune demande en cours. </td></tr>";
			?>
		</table>
	</form>
	<br/>
	<a href='index.php'><input type='button' value="Retour a l'accueil"></a>
</fieldset>


<?php include "footer.php"; ?>
