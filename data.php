<?php
	require_once("functions.php");
	
	if(!isset($_SESSION["id_from_db"])){
		//suunan  login lehele
		header("Location: login.php");
	}
	//login välja. aadressireal on ?logout=1
	if(isset($_GET["logout"])){
		//kustutab kõik sessiooni muutujad
		session_destroy();
		header("Location: login.php");
	}
?>
<p>
	Tere, <?=$_SESSION["user_email"]; ?>
	<a href="?logout=1">Logi välja</a>
</p>