
	<?php include "header.php" ?>
		<?php
		
		?>
		
		<form name="formDeclareCode" action="traitementDeclarerCode.php" method="post" >
			
			<fieldset >
				<div align="center" style="margin-left:10%; margin-right:10%">
					<legend>Liste des covoiturage efféctué</legend>
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

							$sql = 'SELECT IDENTIFIANTLIEU, IDENTIFIANTLIEU_ARRIVEE, DATEDEPART from COVOITURAGE';
							$exec = mysql_query($sql) or die('Erreur SQL: '.$sql.' --- '.mysql_error());

							while ($data = mysql_fetch_array($exec)){
								echo "<tr>";
								echo "<td>".$data['DATEDEPART']."</td>";
								echo "<td>".$data['IDENTIFIANTLIEU']."</td>";
								echo "<td>".$data['IDENTIFIANTLIEU_ARRIVEE']."</td>";
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
				</div>
			</fieldset>
			
		</form>
		
<?php include "footer.php" ?>
