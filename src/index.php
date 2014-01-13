<?php session_start(); ?>
<?php include "header.php" ?>
	<body>
		<h1>Site de Covoiturage</h1>
		<h2></h2>
		
		
		<?php if(isset($_SESSION['id'])) echo "<!--";?>
			<fieldset>
				<?php include "connexion.php" ?>
				<a href="inscription.php">S'inscrire</a><br>
			</fieldset>
		<?php if(isset($_SESSION['id'])) echo "-->"; else echo "<!--"?>
		
			<p>Vous êtes connectés</p>
			
		<?php if(!isset($_SESSION['id'])) echo "-->"; ?>
			
			
<?php include "footer.php" ?>