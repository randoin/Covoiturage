
	<?php include "header.php" ?>
		<h2 align="center">Inscription</h2>
		<?php


		if(!isset($valeurTestNom))
				$valeurTestNom = "";
			if(!isset($valeurTestPrenom))
				$valeurTestPrenom = "";
			if(!isset($valeurTestTel))
				$valeurTestTel = "";
			if(!isset($valeurTestlogin))
				$valeurTestlogin = "";
			if(!isset($valeurTestMail))
				$valeurTestMail = "";
			if(!isset($valeurTestMdp))
				$valeurTestMdp = "";
			if(!isset($valeurTestMdpConfirm))
				$valeurTestMdpConfirm = "";
			if(!isset($valeurTestMajeur))
				$valeurTestMajeur = "";
		
		?>
		
		<form name="formInscription" action="traitement_inscription.php" method="post" >
			<div align="center" style="margin-left:10%; margin-right:10%">
				<fieldset >
					<legend>Inscription</legend>
					<table border=0 cellpadding=10>
						<tr>
							<td>
								Nom * :
							</td>
							<td>
								<input type="text" name="nom" size=32 maxlength=20 value="<?php if(isset($valeurNom)) echo $valeurNom; ?>" placeholder="Entrez un nom"> 
							</td>
							<td>
								<?php echo $valeurTestNom; ?>
							</td>
						</tr>
						<tr>
							<td>
								Prenom * :
							</td>
							<td>
								<input type="text" name="prenom" size=32 maxlength=30 value="<?php if(isset($valeurPrenom)) echo $valeurPrenom; ?>" placeholder="Entrez un prenom">
							</td>
							<td>
								<?php echo $valeurTestPrenom; ?>
							</td>
						</tr>
						<tr>
							<td>
								Login * :
							</td>
							<td>
								<input type="text" name="login" size=32 maxlength=30 value="<?php if(isset($valeurLogin)) echo $valeurLogin; ?>" placeholder="Entrez un login">
							</td>
							<td>
								<?php echo $valeurTestlogin; ?>
							</td>
						</tr>
						<tr>
							<td>
								Numéro de Téléphone * :
							</td>
							<td>
								<input type="text" name="tel" size=32 maxlength=30 value="<?php if(isset($valeurTel)) echo $valeurTel; ?>" placeholder="Entrez un numéro de tél">
							</td>
							<td>
								<?php echo $valeurTestTel; ?>
							</td>
						</tr>
						<tr>
							<td>
								Mail * :
							</td>
							<td>
								<input type="text" name="mail" size=32 maxlength=30 value="<?php if(isset($valeurMail)) echo $valeurMail; ?>" placeholder="Entrez un mail">
							</td>
							<td>
								<?php echo $valeurTestMail; ?>
							</td>
						</tr>
						<tr>
							<td>
								Mot de passe * :
							</td>
							<td>
								<input type="password" name="mdp" size=32 maxlength=30 value="" placeholder="Entrez un mot de passe">
							</td>
							<td>
								<?php echo $valeurTestMdp; ?>
							</td>
						</tr>
						<tr>
							<td>
								Confirmation Mot de passe * :
							</td>
							<td>
								<input type="password" name="mdpConfirm" size=32 maxlength=30 value="" placeholder="Retapez le mot de passe">
							</td>
							<td>
								<?php echo $valeurTestMdpConfirm; ?>
							</td>
						</tr>
						<tr>
							<td>
								* Champs obligatoire !
							</td>
							<td align="center">
								<input type='submit' name='Ajouter' value='Inscription' >
							</td>
							<td>
								<input type='checkbox' name='majeur' value='isMajeur'> * Vous acceptez les CGU et<br> certifiez être majeur.
							</td>
							<td>
								<?php echo $valeurTestMajeur; ?>
							</td>
						</tr>
					</table>
					
				</fieldset>
			</div>
		</form>
		
<?php include "footer.php" ?>