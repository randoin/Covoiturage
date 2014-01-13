<?php 

	if(isset($_POST['num']) && isset($_POST['code']) && isset($_POST['date'])){
		header("Location:generer_code.php");
	}
 ?>