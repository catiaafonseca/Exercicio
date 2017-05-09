<?php
	#Eliminar corrida
	include("../../config/config.php");

	$stmt = $mysqli->prepare("DELETE FROM participa WHERE ordem = ?");
	$stmt->bind_param("i", $_GET['ordem']);
	$stmt->execute();
	$stmt->close();	
	
	$stmt = $mysqli->prepare("DELETE FROM corrida WHERE ordem = ?");
	$stmt->bind_param("i", $_GET['ordem']);
	$stmt->execute();
	$stmt->close();

	header("Location: backoffice.php?p=corrida");
?>