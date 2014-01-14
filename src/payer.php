<?php 
	include_once('header.php');
 ?>
<h1>Paiement</h1>
<fieldset>
	<p>
		Merci d'entrer vos coordonnées bancaires, vous serez débité à l'entrée du code par le conducteur:
	</p>
	<form action="traitement_payer.php" method="post" enctype="application/x-www-form-urlencoded">
		<input type="text" name="num" placeholder="Numéro de carte">
		<input type="text" name="code" placeholder="Code de sécurité">
		<br>
		<input type="text" name="date" placeholder="Date d'expiration">
		<br>
		<br>
		<input type="submit">
		<input type="reset">
	</form>
</fieldset>

 <?php
	include_once('footer.php')
 ?>
