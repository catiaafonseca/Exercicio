<?php
	#Permite inserir novo piloto
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');

	$target_dir = "../../uploads/";
	$temp = explode(".", $_FILES["imagem"]["name"]);
	$newfilename = $target_dir . '/piloto-' . $_POST['nascimento'] . $_POST['nome'] . '.' . end($temp);

	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $newfilename)){
		$imagemPiloto = 'piloto-' . $_POST['nascimento'] . $_POST['nome'] . '.' . end($temp);
	}else{
		$imagemPiloto = 'user.png';
	}

	$stmt = $mysqli->prepare('INSERT INTO piloto (nome, pais, nascimento, genero, sigla, imagem) VALUES (?, ?, ?, ?, ?, ?)');	
	$stmt->bind_param("ssisss",$_POST['nome'], $_POST['pais'], $_POST['nascimento'], $_POST['genero'], $_POST['equipa'], $imagemPiloto);
	$stmt->execute();
	$stmt->close();

	header("Location: backoffice.php?p=piloto");	
?>