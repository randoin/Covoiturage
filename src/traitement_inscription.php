
	<!-- FORMULAIRE D'AJOUT DE COUREUR -->
		<?php
			//initialisation des variables
			if(!isset($valeurTestNom))
				$valeurTestNom = "";
			if(!isset($valeurTestPrenom))
				$valeurTestPrenom = "";
			if(!isset($valeurTestTel))
				$valeurTestTel = "";
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
				if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['tel'] != "" && $_POST['mail'] != "" && $_POST['mdp'] != "" && $_POST['mdpConfirm'] != "" && isset($_POST['majeur'])){
					//analyse de ce qui est envoyer
					
					if($_POST['mdp'] != $_POST['mdpConfirm']){
						$erreur = 1;
					}
					
					if($erreur != 1){
						//requete insertion
						session_start();

						$conn = mysql_connect("127.0.0.1", "root", "");

						if(!$conn){
							die('Connexion impossible : ' . mysql_error());
						}


						mysql_select_db('mlr2', $conn);

						$sql = 'SELECT max(MATRICULE) as "MAXI" FROM utilisateur';
						
						$res1=mysql_query($sql);
						$matr=mysql_result($res1,0,"MAXI");

						echo $matr;
						$matr = $matr + 1;

						//insertion


						mysql_close();
						$valeurTestAjout = "Coureur correctement ajouter !";
						
						//on reinitialise a 0 les valeurs du formulaire :
						$valeurNom = "";
						$valeurPrenom = "";
						
						
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