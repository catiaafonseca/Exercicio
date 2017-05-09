<?php
	#Eliminar participação
	include("../../config/config.php");
	
	$stmt = $mysqli->prepare("DELETE FROM participa WHERE id_piloto = ? AND ordem = ?");
	$stmt->bind_param("ii", $_GET['id'], $_GET['ordem']);
	$stmt->execute();
	$stmt->close();
	
	header("Location: backoffice.php?p=participacao");
?>