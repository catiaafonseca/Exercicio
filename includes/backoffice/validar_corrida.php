<?php
	#Faz update da tabela corrida, de acordo com os valores do formulário editar_corrida.php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
		
	$stmt = $mysqli->prepare("UPDATE corrida SET voltas=?, pais=?, cidade=? WHERE ordem=?");
	$stmt->bind_param("issi",$_POST['voltas'], $_POST['pais'], $_POST['cidade'], $_GET['ordem']);
	$stmt->execute();

	header("Location: backoffice.php?p=corrida");	
?>