<?php
	#Faz update da tabela equipa, de acordo com os valores do formulário editar_equipa.php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
		
	$stmt = $mysqli->prepare("UPDATE equipa SET nome=?, pais=?, fundacao=? WHERE sigla=?");
	$stmt->bind_param("ssis",$_POST['nome'], $_POST['pais'], $_POST['fundacao'], $_GET['sigla']);
	$stmt->execute();

	header("Location: backoffice.php?p=equipa");	
?>