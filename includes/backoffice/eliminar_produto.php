<?php
	#Eliminar produto
	include("../../config/config.php");

	$stmt = $mysqli->prepare("DELETE FROM produto_detalhes WHERE id_produto_detalhes = ?");
	$stmt->bind_param("i", $_GET['pd']);
	$stmt->execute();
	$stmt->close();	
		
	header("Location: backoffice.php?p=produto");
?>