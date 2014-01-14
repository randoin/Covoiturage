	
	<?php 
	session_start();
	include "header.php" ?>
		<form name="formDeclareCode" action="traitement_declarer_code.php" method="post" >
			<h1>Liste des covoiturages pour lesquels vous pouvez déclarer des codes</h1>
			<fieldset >
				<div align="center" style="margin-left:10%; margin-right:10%">
					<br>

					<table border=2 cellpadding=10>
						<tr>
							<th>
								Ville de départ
							</th>
							<th>
								Ville d'arrivée
							</th>
							<th>
								Date
							</th>
							<th clospan = 2>
								Déclarer les codes
							</th>
							<th></th>

						</tr>
							<?php
							include('base.php');

							$sql = "SELECT IDENTIFIANTLIEU, IDENTIFIANTLIEU_ARRIVEE, DATEDEPART from covoiturage where CONDUCTEUR = ".$_SESSION['matricule'];
							$exec = mysql_query($sql) or die('Erreur SQL: '.$sql.' --- '.mysql_error());

							while ($data = mysql_fetch_array($exec)){
								echo "<tr>";
								echo "<td>".$data['IDENTIFIANTLIEU']."</td>";
								echo "<td>".$data['IDENTIFIANTLIEU_ARRIVEE']."</td>";
								echo "<td>".date("d/m/Y",strtotime($data['DATEDEPART']))."</td>";
								echo "<td>";
									echo "<input type='text' name='code' size=16 maxlength=30 value='' placeholder='Entrez un code'";
								echo "</td>";
								echo "<td>";
									echo "<input type='submit' name='Ajouter' value='Ok' >";
								echo "</td>";
								echo "</tr>";
							}

							?>
						
					</table>
					<a href='index.php'><input type='button' value="Retour a l'accueil"></a>
				</div>
			</fieldset>
			
		</form>
		
<?php include "footer.php" ?>
