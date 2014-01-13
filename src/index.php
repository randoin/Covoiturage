<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Covoiturage</title>
	</head>
	<body>
		<h1>Site de Covoiturage</h1>
		<h2></h2>
		
		
		<?php if(false) echo "<!--";?>
			<fieldset>
			<legend><h3>Connexion</h3></legend>
				<?php include "connexion.php" ?>
				<a href="inscription.php">S'inscrire</a><br>
			</fieldset>
		<?php if(false) echo "-->"; else echo "<!--"?>
		
			<p>Vous êtes connectés</p>
			
		<?php if(!false) echo "-->"; ?>
			
			
	</body>
	<footer>
	<h5>A propos</h5>
	</footer>
</html>