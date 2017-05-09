<?php
	#Permite inserir uma nova equipa
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	$stmt = $mysqli->prepare('INSERT INTO equipa (sigla, nome, pais, fundacao) VALUES (?, ?, ?, ?)');	
	$stmt->bind_param("sssi",$_POST['sigla'], $_POST['nome'], $_POST['pais'], $_POST['fundacao']);
	$stmt->execute();
	$stmt->close();
	header("Location: backoffice.php?p=equipa");
?>