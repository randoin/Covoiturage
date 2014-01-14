
	<?php include "header.php" ?>
		<?php
			if(!isset($valeurTestDepart))
				$valeurTestDepart = "";
			if(!isset($valeurTestArrivee))
				$valeurTestArrivee = "";
			if(!isset($valeurTestDate))
				$valeurTestDate = "";
			if(!isset($valeurTestHeure))
				$valeurTestHeure = "";
			if(!isset($valeurTestNbPlace))
				$valeurTestNbPlace = "";
			if(!isset($valeurTestPrix))
				$valeurTestPrix = "";
			if(!isset($valeurTestPlaque))
				$valeurTestPlaque = "";
		
		?>
		
		<form name="formProposCovoiturage" action="traitement_proposition.php" method="post" >
			
				<fieldset >
					<div align="center" style="margin-left:10%; margin-right:10%">
					<legend>Proposition de covoiturage</legend>
					<table border=0 cellpadding=10>
						<tr>
							<td>
								Ville de départ * :
							</td>
							<td>
								<input type="text" name="depart" size=32 maxlength=20 value="<?php if(isset($valeurDepart)) echo $valeurDepart; ?>" placeholder="Entrez une ville de départ"> 
							</td>
							<td>
								<?php echo $valeurTestDepart; ?>
							</td>
						</tr>
						<tr>
							<td>
								Ville d'arrivée * :
							</td>
							<td>
								<input type="text" name="arrivee" size=32 maxlength=30 value="<?php if(isset($valeurArrivee)) echo $valeurArrivee; ?>" placeholder="Entrez une ville d'arriver">
							</td>
							<td>
								<?php echo $valeurTestArrivee; ?>
							</td>
						</tr>


						

						<tr>
							<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
							<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
							<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
							<link rel="stylesheet" href="/resources/demos/style.css">
							<script>
								$(function() {
									$( "#dateDepart" ).datepicker();
								});
							</script>

							<td>
								Date de départ * :
							</td>
							<td>
								<input type="text" id="dateDepart" name="dateDepart" value="<?php if(isset($valeurDateDepart)) echo $valeurDateDepart; ?>"></p>
							</td>
							<td>
								<?php echo $valeurTestDate; ?>
							</td>
						</tr>
						<td>
								Heure de départ * :
							</td>
							<td>
								<select name="heureDepart">
									<option value="" >heure</option>
									<option value="00" >00</option>
									<option value="01" >01</option>
									<option value="02" >02</option>
									<option value="03" >03</option>
									<option value="04" >04</option>
									<option value="05" >05</option>
									<option value="06" >06</option>
									<option value="07" >07</option>
									<option value="08" >08</option>
									<option value="09" >09</option>
									<?php
									for ($i=10;$i<24;$i++)
									{
										echo '<option value="' .$i.'">' .$i.'</option>';
									}
									?>
								</select>
								<select name="minutesDepart">
									<option value="" >minutes</option>
									<option value="00" >00</option>
									<option value="01" >01</option>
									<option value="02" >02</option>
									<option value="03" >03</option>
									<option value="04" >04</option>
									<option value="05" >05</option>
									<option value="06" >06</option>
									<option value="07" >07</option>
									<option value="08" >08</option>
									<option value="09" >09</option>
									<?php
									for ($i=10;$i<60;$i++)
									{
										echo '<option value="' .$i.'">' .$i.'</option>';
									}
									?>
								</select>	
							</td>
							<td>
								<?php echo $valeurTestHeure; ?>
							</td>
						</tr>


						<tr>
							<td>
								Plaque d'immatriculation * :
							</td>
							<td>
								<input type="text" name="plaque" size=32 maxlength=30 value="<?php if(isset($valeurPlaque)) echo $valeurPlaque; ?>" placeholder="Entrez une plaque d'immatriculation">
							</td>
							<td>
								<?php echo $valeurTestPlaque; ?>
							</td>
						</tr>
						<tr>
							<td>
								Nombre de place * :
							</td>
							<td>
								<input type="text" name="nbPlace" size=32 maxlength=30 value="<?php if(isset($valeurNbPlace)) echo $valeurNbPlace; ?>" placeholder="Entrez un nombre de place">
							</td>
							<td>
								<?php echo $valeurTestNbPlace; ?>
							</td>
						</tr>
						<tr>
							<td>
								Prix/personne (en €) * :
							</td>
							<td>
								<input type="text" name="prix" size=32 maxlength=30 value="<?php if(isset($valeurPrix)) echo $valeurPrix; ?>" placeholder="Entrez un prix">
							</td>
							<td>
								<?php echo $valeurTestPrix; ?>
							</td>
						</tr>
						<tr>
							<td>
								* Champs obligatoire !
							</td>
							<td align="center">
								<input type='submit' name='Ajouter' value='Proposer' >
							</td>
						</tr>
					</table>
					</div>
				</fieldset>
			
		</form>
		
<?php include "footer.php" ?>