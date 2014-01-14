<?php session_start(); ?>

<?php include "header.php" ?>

		<?php if(isset($_POST['deco'])){session_destroy(); header("location:index.php");}?>
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<fieldset>
				<?php include "connexion.php" ?>
				<a href="inscription.php"><input type="button" value="pas encore inscrit ?"></a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
			<fieldset>
			<p> bonjour 
			<?php 
				if(isset($_SESSION['id'])){
					$req = mysql_query("select nom,prenom from utilisateur where adressemail = '".$_SESSION['id']."'");
					$rep = mysql_fetch_array();
					echo $rep['nom']." ".$rep['prenom'];
				}
			?>
			</p>
			<a href="recherche.php"><input type="button" value="Rechercher un covoiturage"></a><br>
			<a href="proposition.php"><input type="button" value="Proposer un covoiturage"></a><br>
			<a href="valider.php"><input type="button" value="Valider une demande de covoiturage"></a>
			<form action='index.php' method='post'>
				<input type="submit" name="deco" value="se déconnecter">
			</form>
			</fieldset>
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>