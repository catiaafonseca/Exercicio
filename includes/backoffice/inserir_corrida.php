<?php
	#Permite inserir nova corrida
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	if($stmt = $mysqli->prepare("SELECT cidade, pais FROM corrida WHERE cidade = ? AND pais = ?")) {
		$stmt->bind_param("ss", $_POST['cidade'], $_POST['pais']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($cidade, $pais);
		$num_rows = $stmt->num_rows;
		$stmt->fetch();
		if($num_rows > 0){
			$stmt->close();
			header("Location: backoffice.php?p=regista_corrida&s=1");
		}
		else{
			$stmt = $mysqli->prepare('INSERT INTO corrida (ordem, cidade, pais, voltas) VALUES (?, ?, ?, ?)');	
			$stmt->bind_param("issi",$_POST['ordem'], $_POST['cidade'], $_POST['pais'], $_POST['voltas']);
			$stmt->execute();
			$stmt->close();
			header("Location: backoffice.php?p=corrida");
		}
	}	
?>