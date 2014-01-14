<?php session_start(); ?>

<?php 
	include("header.php");
	include("base.php");
 ?>

		<?php if(isset($_POST['deco'])){session_destroy(); header("location:index.php");}?>
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<fieldset>
				<?php include("connexion.php"); ?>
				<a href="inscription.php"><input type="button" value="pas encore inscrit ?"></a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
			<fieldset>
			<p>
			<?php 
				if(isset($_SESSION['id'])){
					$requete = "SELECT NOM, PRENOM FROM utilisateur WHERE ADRESSEMAIL = '".$_SESSION["id"]."'";
					$exec = mysql_query($requete) or die('Erreur SQL: '.$requete.' --- '.mysql_error());
					while($data = mysql_fetch_array($exec)){
						echo "Bonjour ". ucfirst($data['NOM'])." ".ucfirst($data['PRENOM']).", soyez le bienvenu sur Eco'voiturage !<br/><br/>Choisissez une action à effectuer ci-dessous :";
					}
				}
			?>
			</p>
			<b>Si vous êtes passager :</b>
			<a href="recherche.php"><input type="button" value="Rechercher un covoiturage"></a><br>
			<b>Si vous êtes conducteur :</b>
			<a href="proposition.php"><input type="button" value="Proposer un covoiturage"></a><br>
			<a href="valider.php"><input type="button" value="Valider une demande de covoiturage"></a><br>
			<a href="declarerCode.php"><input type="button" value="Entrer les codes passagers de vos covoitureurs pour être payé"></a><br>	
			<b>Si vous avez terminé d'utiliser le site :</b>
			<form action='index.php' method='post'>
				<input type="submit" name="deco" value="se déconnecter">
			</form>
			</fieldset>
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>
