<?php	
	//kõik AB'iga seonduv
	//ühendus loomiseks kasutaja
	require_once("../configglobal.php");
	$database = "if15_sizen";
	//lisame kasutaja ab'si	
	function createUser($create_email, $password_hash){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
				
				//echo $mysqli->error;
				//echo $stmt->error;
				//asendame ? märgid muutujate väärtustega
				// ss - s tähendab string iga muutju kohta
				$stmt->bind_param("ss", $create_email, $password_hash);
				$stmt->execute();
				$stmt->close();
		$mysqli->close();
	}
	//logime
	function loginUser($email, $password_hash){
		//globals on muutuja kõigis php failides mis on ühendatud
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
				$stmt->bind_param("ss", $email, $password_hash);
				
				//paneme vastuse muutujatesse
				$stmt->bind_result($id_from_db, $email_from_db);
				$stmt->execute();
				
				//küsime kas andmebaasist saime kätte
				if($stmt->fetch()){
					//leidis
					echo "kasutaja id=".$id_from_db;
					
				}else{
					//tühi, ei leidnud, ju siis midagi valesti
					echo "wrong password or email!";
				}
				
				$stmt->close();
		$mysqli->close();
	}
	
?>