<?php
	#Faz update da tabela participa, de acordo com os valores do formulário editar_participacao.php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
		
	$stmt = $mysqli->prepare("UPDATE participa SET pontos=? WHERE ordem=? AND id_piloto=?");
	$stmt->bind_param("iii",$_POST['pontos'], $_GET['ordem'], $_GET['id']);
	$stmt->execute();

	header("Location: backoffice.php?p=participacao");	
?>