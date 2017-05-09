<?php
	#Eliminar equipa
	include("../../config/config.php");

	$mysqli->set_charset('utf8mb4');
	$stmt = $mysqli->prepare('SELECT id_piloto FROM piloto WHERE sigla = ?');	
	$stmt->bind_param("s", $_GET['sigla']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_piloto);
	while ($stmt->fetch()) {
		$stmt1 = $mysqli->prepare('DELETE FROM participa WHERE id_piloto = ?');	
		$stmt1->bind_param("i",$id_piloto);
		$stmt1->execute();
		$stmt1->close();
	}
	$stmt->close();
	
	$stmt = $mysqli->prepare('DELETE FROM piloto WHERE sigla = ?');	
	$stmt->bind_param("s",$_GET['sigla']);
	$stmt->execute();
	$stmt->close();
	
	$stmt = $mysqli->prepare('DELETE FROM equipa WHERE sigla = ?');	
	$stmt->bind_param("s",$_GET['sigla']);
	$stmt->execute();
	$stmt->close();
	
	header("Location: backoffice.php?p=equipa");
?>