<?php 
	include_once('header.php');
 ?>

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

 <?php
	include_once('footer.php')
 ?>