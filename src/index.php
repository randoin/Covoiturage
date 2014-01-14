<?php 
	session_start();

	include("header.php");
 ?>

		<?php if(isset($_POST['deco'])){session_destroy(); header("location:index.php");}?>
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<h1>Accueil</h1>
			<fieldset>
				<?php include("connexion.php"); ?>
				<a href="inscription.php"><input type="button" value="pas encore inscrit ?"></a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
			<fieldset>
			<p>
			<?php 
				echo "Bonjour ".ucfirst($_SESSION['prenom']).", soyez le bienvenu sur Eco'voiturage !<br/><br/>Choisissez une action à effectuer ci-dessous :";
			?>
			</p>
			<b>Vous êtes passager :</b><br/>
			<a href="recherche.php"><input type="button" value="Rechercher un covoiturage"></a><br/><br/>
			<b>Vous êtes conducteur :</b><br/>
			<a href="proposition.php"><input type="button" value="Proposer un covoiturage"></a><br/>
			<a href="valider.php"><input type="button" value="Valider une demande de covoiturage"></a><br/>
			<a href="declarerCode.php"><input type="button" value="Entrer les codes passagers de vos covoitureurs pour être payé"></a><br><br/>	
			<b>Vous avez terminé d'utiliser le site :</b><br/>
			<form action='index.php' method='post'>
				<input type="submit" name="deco" value="Se déconnecter">
			</form>
			</fieldset>
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>
