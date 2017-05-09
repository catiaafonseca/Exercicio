<?php
	#Eliminar piloto
	include("../../config/config.php");
	
	$stmt1 = $mysqli->prepare("DELETE FROM participa WHERE id_piloto = ?");
	$stmt1->bind_param("i", $_GET['id']);
	$stmt1->execute();
	$stmt1->close();
	
	$stmt = $mysqli->prepare("DELETE FROM piloto WHERE id_piloto = ?");
	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->close();	
		
	header("Location: backoffice.php?p=piloto");
?>