
	<?php include "header.php" ?>
		<h2 align="center">Proposer un covoiturage</h2>
		<?php
			if(!isset($valeurTestDepart))
				$valeurTestDepart = "";
			if(!isset($valeurTestArriver))
				$valeurTestArriver = "";
			if(!isset($valeurTestDate))
				$valeurTestDate = "";
			if(!isset($valeurNbPlace))
				$valeurTestNbPlace = "";
			if(!isset($valeurTestPrix))
				$valeurTestPrix = "";
		
		?>
		
		<form name="formProposCovoiturage" action="traitement_proposition.php" method="post" >
			<div align="center" style="margin-left:10%; margin-right:10%">
				<fieldset >
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
								Ville d'arriver * :
							</td>
							<td>
								<input type="text" name="arriver" size=32 maxlength=30 value="<?php if(isset($valeurArriver)) echo $valeurArriver; ?>" placeholder="Entrez une ville d'arriver">
							</td>
							<td>
								<?php echo $valeurTestArriver; ?>
							</td>
						</tr>
						<tr>
							<td>
								Date de départ * :
							</td>
							<td>
								<input type="date" name="dateDepart" value="<?php if(isset($valeurDate)) echo $valeurDate; ?>" placeholder="dd/mm/yyyy">
							</td>
							<td>
								<?php echo $valeurTestDate; ?>
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
					
				</fieldset>
			</div>
		</form>
		
<?php include "footer.php" ?>