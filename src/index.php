<?php session_start(); ?>
<?php include "header.php" ?>
		<?php if(isset($_POST['deco'])){session_destroy(); header("location:index.php");}?>
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<fieldset>
				<?php include "connexion.php" ?>
				<a href="inscription.php"><input type="button" value="pas encore inscrit ?"></a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
		
			<p>Vous êtes connecté</p>
			<form action='index.php' method='post'>
				<input type="submit" name="deco" value="se déconnecter">
			</form>
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>