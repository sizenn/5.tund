<?php
	require_once("functions.php");
	
	if(!isset($_SESSION["id_from_db"])){
		//suunan  login lehele
		header("Location: login.php");
	}

?>
data