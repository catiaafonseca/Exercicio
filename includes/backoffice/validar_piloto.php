<?php
	#Faz update da tabela piloto, de acordo com os valores do formulário editar_piloto.php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');

	$target_dir = "../../uploads/";
	$temp = explode(".", $_FILES["imagem"]["name"]);
	$newfilename = $target_dir . '/piloto-' . $_GET['id'] . '.' . end($temp);

	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $newfilename)){
		$imagemPiloto = 'piloto-' . $_GET['id'] . '.' . end($temp);
	}else{
		$imagemPiloto = $_GET['imagem'];
	}
		
	$stmt = $mysqli->prepare("UPDATE piloto SET nome=?, nascimento=?, genero=?, pais=?, sigla=?, imagem=? WHERE id_piloto=?");
	$stmt->bind_param("sissssi",$_POST['nome'], $_POST['nascimento'], $_POST['genero'], $_POST['pais'], $_POST['equipa'], $imagemPiloto, $_GET['id']);
	$stmt->execute();

	header("Location: backoffice.php?p=piloto");	
?>