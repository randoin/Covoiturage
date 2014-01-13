
	<?php include "header.php" ?>
		<?php
			if(!isset($valeurTestDepart))
				$valeurTestDepart = "";
			if(!isset($valeurTestArrivee))
				$valeurTestArrivee = "";
			if(!isset($valeurTestDate))
				$valeurTestDate = "";
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
							<td>
								Date de départ * :
							</td>
							<td>
								<input type="text" name="dateDepart" value="<?php if(isset($valeurDate)) echo $valeurDate; ?>" placeholder="jj/mm/aaaa">
							</td>
							<td>
								<?php echo $valeurTestDate; ?>
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