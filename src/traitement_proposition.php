
		<?php
			//initialisation des variables
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


			$erreur = 0;
		
			//on analyse l'enregistrement
			if(isset($_POST['Ajouter'])){
				//on test si les champs ont bien été rempli
				if($_POST['depart'] != "" && $_POST['arrivee'] != "" && $_POST['dateDepart']!= "" && $_POST['heureDepart'] !="" && $_POST['nbPlace'] != "" && $_POST['prix'] != "" && $_POST['plaque']){
					//analyse de ce qui est envoyer
					
					
					
					if($erreur != 1){
						//requete insertion
						session_start();

						include('base.php');

						$sql = 'SELECT max(NUMEROCOVOIT) as "MAXI" FROM covoiturage';
						
						$res1=mysql_query($sql);
						$matr=mysql_result($res1,0,"MAXI");

						//echo $matr;
						$matr = $matr + 1;
						$nbPlace = $_POST['nbPlace'];
						$prix = $_POST['prix'];
						$dateCo = date("Y-m-d", strtotime($_POST['dateDepart']));

						//insertion
						$sql = "INSERT INTO covoiturage(NUMEROCOVOIT,IDENTIFIANTLIEU,IDENTIFIANTLIEU_ARRIVEE,DATEDEPART,HEUREDEPART,PLACESDISPO,MONTANT,PLAQUEIMMATRICULATION) VALUES ($matr, '".$_POST['depart']."', '".$_POST['arrivee']."','".$dateCo."','".$_POST['heureDepart']."',$nbPlace, $prix,'".$_POST['plaque']."')";
						//echo $sql;
						mysql_query($sql) or die('Erreur SQL: '.$sql.' --- '.mysql_error());
						//values($numCoureur,'".$nom."','".$prenom."','".$_POST['annee_naissance']."','".$_POST['annee_tour']."','".$_POST['pays']."',user, sysdate)";


						mysql_close();
						include ("index.php");
						
						
					}
				}
				else{
					//permet d'afficher les variables dans les differents element de la page
					if(empty($_POST['depart'])){
						$valeurTestDepart = "Veuillez entrer une ville de départ !";
					}
					else{
						$valeurDepart = $_POST['depart'];
					}
						
					if(empty($_POST['arrivee'])){
						$valeurTestArrivee = "Veuillez entrer une ville d'arrivée !";
					}
					else{
						$valeurArrivee = $_POST['arrivee'];
					}

					if(empty($_POST['dateDepart'])){
						$valeurTestDate = "Veuillez entrer une date de départ !";
					}
					else{
						$valeurDate = $_POST['dateDepart'];
					}
					if(empty($_POST['heureDepart'])){
						$valeurTestHeure="veuillez entrer une heure de départ !";
					}
					else{
						$valeurHeure=$_POST['heureDepart'];
					}

					if(empty($_POST['plaque'])){
						$valeurTestPlaque = "Veuillez entrer une plaque d'immatriculation !";
					}
					else{
						$valeurPlaque = $_POST['plaque'];
					}

					if(empty($_POST['nbPlace'])){
						$valeurTestNbPlace = "Veuillez entrer un nombre de place !";
					}
					else{
						$valeurNbPlace = $_POST['nbPlace'];
					}

					if(empty($_POST['prix'])){
						$valeurTestPrix = "Veuillez entrer un prix !";
					}
					else{
						$valeurPrix = $_POST['prix'];
					}
					
					include ("proposition.php");
				}
			}

 ?>