
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
                                                $valeurTestMdp = "Veuillez entrer un mot de passe différent !";
                                                $valeurNom = $_POST['nom'];
                                                $valeurPrenom = $_POST['prenom'];
                                                $valeurTel = $_POST['tel'];
                                                $valeurMail = $_POST['mail'];
                                        }
                                        
                                        if($erreur != 1){
                                                //requete insertion
                                                include('base.php');

                                                $sql = 'SELECT max(MATRICULE) as "MAXI" FROM utilisateur';
                                                
                                                $res1=mysql_query($sql);
                                                $matr=mysql_result($res1,0,"MAXI");

                                                //echo $matr;
                                                $matr = $matr + 1;

                                                //insertion
                                                $sql = "INSERT INTO utilisateur VALUES ($matr, '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['mdp']."', '".$_POST['mail']."', '".$_POST['tel']."') ";
                                                //echo $sql;
                                                mysql_query($sql);
                                                //values($numCoureur,'".$nom."','".$prenom."','".$_POST['annee_naissance']."','".$_POST['annee_tour']."','".$_POST['pays']."',user, sysdate)";

                                                mysql_close();
                                                ?>
                                                <SCRIPT LANGUAGE="JavaScript">
                                                <!--
                                                alert('Vous etes maintenant membre !');
                                                -->
                                                </SCRIPT> 
                                                <?php
                                                include ("index.php");
                                                
                                                
                                        }else{
                                                include ("inscription.php");
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
										else if(!VerifierNumero($_POST['tel'])){
												$valeurTestTel = "Veuillez entrer un numéro de téléphone valide!";
										}
                                        else if(VerifierNumero($_POST['tel'])){
                                                $valeurTel = $_POST['tel'];
                                        }

                                        if(empty($_POST['mail'])){
                                                $valeurTestMail = "Veuillez entrer un mail !";
                                        }
										else if(!VerifierAdresseMail($_POST['mail'])){
                                                $valeurTestMail = "Veuillez entrer un mail valide !";
                                        }
                                        else if(VerifierAdresseMail($_POST['mail'])){
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

						
				function VerifierAdresseMail($adresse){  
					$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
					if(preg_match($Syntaxe,$adresse))  
						return true;  
					else  
						return false;  
				}

				function VerifierNumero($numero){
					$Syntaxe='#^0[0-9]([ .-]?[0-9]{2}){4}$#';
					if(preg_match($Syntaxe, $numero))
						return true;
					else
						return false;
				}
 ?>