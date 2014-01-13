<?php session_start(); ?>
<?php include "header.php" ?>
	<body>
		<h1>Site de Covoiturage</h1>
		<h2></h2>
		<?php if(isset($_POST['deco'])){session_destroy(); header("location:index.php");}?>
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<fieldset>
				<?php include "connexion.php" ?>
				<a href="inscription.php">S'inscrire</a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
		
			<p>Vous êtes connecté</p>
			<form action='index.php' method='post'>
				<input type="submit" name="deco" value="se déconnecter">
			</form>
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>