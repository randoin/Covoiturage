
	<!-- FORMULAIRE D'AJOUT DE COUREUR -->
		<?php
			//initialisation des variables
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


			$erreur = 0;
		
			//on analyse l'enregistrement
			if(isset($_POST['Ajouter'])){
				//on test si les champs ont bien été rempli
				if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['login'] != "" && $_POST['tel'] != "" && $_POST['mail'] != "" && $_POST['mdp'] != "" && $_POST['mdpConfirm'] != "" && isset($_POST['majeur'])){
					//analyse de ce qui est envoyer
					
					if($_POST['mdp'] != )
					
						
					$erreur = 1;
					
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

					if(empty($_POST['login'])){
						$valeurTestlogin = "Veuillez entrer un login !";
					}
					else{
						$valeurLogin = $_POST['login'];
					}

					if(empty($_POST['tel'])){
						$valeurTestTel = "Veuillez entrer un numéro de téléphone !";
					}
					else{
						$valeurTel = $_POST['tel'];
					}

					if(empty($_POST['mail'])){
						$valeurTestMail = "Veuillez entrer un mail !";
					}
					else{
						$valeurMail = $_POST['mail'];
					}

					if(empty($_POST['mdp'])){
						$valeurTestMdp = "Veuillez entrer un mot de passe !";
					}

					if(!isset($_POST['majeur'])){
						$valeurTestMajeur = "Veuillez accepter les CGU !";
					}			
					include ("inscription.php");
				}
			}

 ?>