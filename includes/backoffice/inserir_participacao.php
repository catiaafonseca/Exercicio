<?php
	#Permite inserir nova participação
	include("../../config/config.php");
	$stmt = $mysqli->prepare('INSERT INTO participa (id_piloto, ordem, pontos) VALUES (?, ?, ?)');	
	$stmt->bind_param("iii",$_POST['piloto'], $_POST['corrida'], $_POST['pontos']);
	$stmt->execute();
	$stmt->close();
	header("Location: backoffice.php?p=participacao");
?>