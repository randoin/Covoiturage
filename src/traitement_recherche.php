<?php 
	session_start();

	include("base.php");
	echo "ping1";

	if(isset($_POST['Ajouter'])){
		$depart = $_POST['depart'];
		$arrivee = $_POST['arrivee'];
		$date = date("Y-m-d", strtotime($_POST['date']));
		echo "ping2";

		?>
	    <script type="text/javascript">alert('Votre demande à bien été pris en compte !');</script>
	 	<?php


		$sql = 'SELECT max(NUMERODEMANDE) as "MAXI" FROM cherchercovoit';
		
		$res1=mysql_query($sql);
		$num=mysql_result($res1,0,"MAXI");
		$num = $num + 1;

		$sql = "INSERT INTO cherchercovoit values($num,'".$_SESSION['matricule']."', '".$depart."','".$arrivee."','".$date."')";
		echo $sql;
		mysql_query($sql) or die('Erreur SQL: '.$sql.' --- '.mysql_error());

		
		mysql_close();

	    header("Location:index.php");
		
	}else{



		$requete = "INSERT INTO demandercovoiturage VALUES('".$_POST['select']."', ".$_SESSION['matricule'].", 0)";
		mysql_query($requete);
		mysql_close();

		$_SESSION['numcovoit'] = $_POST['select'];

		header("Location:payer.php");
	}
 ?>