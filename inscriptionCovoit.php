<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;">
		<meta charset="utf-8">
		<title>Inscription d'un covoitureur</title>
	</head>
	<body>
		<h2 align="center">Inscription</h2>
		
		<!-- FORMULAIRE D'AJOUT DE COUREUR -->
		<?php
			//initialisation des variables
			if(!isset($valeurTestNom))
				$valeurTestNom = "";
			if(!isset($valeurTestPrenom))
				$valeurTestPrenom = "";
			if(!isset($valeurTestPays))
				$valeurTestPays = "";
			if(!isset($valeurTestAnneeNaissance))
				$valeurTestAnneeNaissance = "";
			if(!isset($valeurTestAjout))
				$valeurTestAjout = "";
			if(!isset($valeurParticipation))
				$valeurParticipation = "";
			if(!isset($valeurAnnee))
				$valeurAnnee = "";
			if(!isset($valeurPays))
				$valeurPays = "";
			$erreur = 0;
		
			//on analyse l'enregistrement
			if(isset($_POST['Ajouter'])){
				//on test si les champs ont bien été rempli
				if($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['pays'] != "Selectionnez un pays"){
					//analyse de ce qui est envoyer
					
					//le nom :
						if(!testNom($_POST['nom'])){
							$erreur = 1;
							$valeurTestNom="Veuillez entrer un nom valide !";
						}else{
							//on transforme la valeur du nom
							$valeurNom = testNom($_POST['nom']);
							$nom = $valeurNom;
						}
					
					
					//le prenom :
						if(!testPrenom($_POST['prenom'])){
							$erreur = 1;
							$valeurTestPrenom = "Veuillez entrer un prénom valide !";
						}
						//on transforme le prenom
						$valeurPrenom = testPrenom($_POST['prenom']);
						$prenom = $valeurPrenom;						
						$prenom=utf8_decode($prenom);
					
					//l'annee :
						if($_POST['annee_naissance'] != null){
							$annee = $_POST['annee_naissance'];
							$type = gettype($annee);
							if (($_POST['annee_tour']-$_POST['annee_naissance'])>17){ //si il y a une difference de plus de 17 ans
								$valeurAnnee = $_POST['annee_naissance'];
							}
							else{
								$valeurTestAnneeNaissance = "Veuillez entrer une année de naissance inférieure de<br> 17 ans à l'année du premier tour !";
								$erreur = 1;
							}
						}
						else{
							$erreur=1;
							$valeurTestAnneeNaissance="Veuillez entrer une date de naissance";
						}
						
					//l'annee de premiere participation
						//si erreur est egale a 1 alors on garde quand meme en mémoire la valeur de la premiere annee
						if($erreur == 1){
							$valeurParticipation = $_POST['annee_tour'];
						}
						
					//le pays
						//si on a une erreur il faut tout de meme afficher le pays selectionner
						if($erreur == 1){
							$valeurPays = $_POST['pays'];
						}
						
					
					
					if($erreur != 1){
						//requete insertion
						$login = 'copie_tdf';
						$mdp = 'copie_tdf';
						$instance = 'xe';
						

						//on recupert dabors le max de n_coureur
						$conn = OuvrirConnexion($login, $mdp,$instance);
						$maxNCoureur = preparerRequete($conn, "SELECT max(n_coureur) as maxi from tdf_coureur");
						$maxNcour = executerRequete($maxNCoureur);
						
						//on cree un tableau
						$maxNumArray = array();
						
						//on y met le resultat de la requete
						oci_fetch_all($maxNCoureur, $maxNumArray);
						
						//on recupert le resultat de la requete et on lui donne la valeur +5
						$numCoureur = $maxNumArray['MAXI'][0];
						$numCoureur = $numCoureur+5;
						
						//on fait l'include
						$req = "INSERT INTO tdf_coureur(n_coureur, nom, prenom, annee_naissance, annee_tdf, code_tdf,compte_oracle, date_insert) values($numCoureur,'".$nom."','".$prenom."','".$_POST['annee_naissance']."','".$_POST['annee_tour']."','".$_POST['pays']."',user, sysdate)";
						$cur = preparerRequete($conn, $req);
						$tab = executerRequete($cur);
						oci_commit($conn);
						$valeurTestAjout = "Coureur correctement ajouter !";
						
						//on reinitialise a 0 les valeurs du formulaire :
						$valeurNom = "";
						$valeurPrenom = "";
						$valeurAnnee = "";
						$valeurParticipation = "";
						
						
						FermerConnexion($conn);
					}
				}
				else{
					//permet d'afficher les variables dans les differents element de la page
					if(empty($_POST['nom'])){
						$valeurTestNom = "Veuillez entrer un nom !";
					}
					else{
						$valeurNom = $_POST['nom'];
					}
						
					if(empty($_POST['prenom'])){
						$valeurTestPrenom = "Veuillez entrer un prénom !";
					}
					else{
						$valeurPrenom = $_POST['prenom'];
					}
					
					if(!empty($_POST['annee_naissance'])){
						$valeurAnnee = $_POST['annee_naissance'];
					}
					
					if(!empty($_POST['annee_tour'])){
						$valeurParticipation = $_POST['annee_tour'];
					}
					
					if($_POST['pays'] == "Selectionnez un pays"){
							$valeurTestPays = "Veuillez choisir un pays !";
					}
					else{
						$valeurPays = $_POST['pays'];
					}
					
				}
			}
		
		
		
		?>
		
		
		
		<form name="formAjoutCoureur" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
			<div align="center" style="margin-left:20%; margin-right:20%">
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
								<font color="red"><?php echo $valeurTestNom; ?></font>
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
								<font color="red"><?php echo $valeurTestPrenom; ?></font>
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
								<font color="red"><?php echo $valeurTestTel; ?></font>
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
								<font color="red"><?php echo $valeurTestMail; ?></font>
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
								<font color="red"><?php echo $valeurTestTel; ?></font>
							</td>
						</tr>
						<tr>
							<td>
								* Partie obligatoire !
							</td>
							<td align="center">
								<input type='submit' name='Ajouter' value='Ajouter un coureur' >
								
							</td>
							<td>
								<font color='green'><?php echo $valeurTestAjout; ?></font>
							</td>
						</tr>
					</table>
					
				</fieldset>
			</div>
		</form>
		
		
	</body>
</html>