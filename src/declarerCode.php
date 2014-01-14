	
	<?php 
	session_start();
	include "header.php" ?>
		<?php
			//traitement
		?>
		
		<form name="formDeclareCode" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
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

							//$requete = "SELECT MATRICULE FROM utilisateur WHERE ADRESSEMAIL = '".$_SESSION['id']."'";
							//$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());
							$sql = "SELECT IDENTIFIANTLIEU, IDENTIFIANTLIEU_ARRIVEE, DATEDEPART from covoiturage where CONDUCTEUR = ".$_SESSION['matricule'];
							$exec = mysql_query($sql) or die('Erreur SQL: '.$sql.' --- '.mysql_error());


							//$res1=mysql_query($requete);
							//if(mysql_field_len($exec, 0) == 1){
                            	//$matr=mysql_result($res1,0,"MATRICULE");

								while ($data = mysql_fetch_array($exec)){
									echo "<tr>";
									echo "<td>".$data['IDENTIFIANTLIEU_ARRIVEE']."</td>";
									echo "<td>".$data['IDENTIFIANTLIEU']."</td>";
									echo "<td>".date("d/m/Y",strtotime($data['DATEDEPART']))."</td>";
									echo "<td>";
										echo "<input type='text' name='code' size=16 maxlength=30 value='' placeholder='Entrez un code'";
									echo "</td>";
									echo "<td>";
										echo "<input type='submit' name='Ajouter' value='Ok' >";
									echo "</td>";
									echo "</tr>";
								}
							//}

							?>
						
					</table>
				</div>
			</fieldset>
			
		</form>
		
<?php include "footer.php" ?>
