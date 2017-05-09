<?php
	#Permite inserir um novo produto e os seus detalhes
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');

	$target_dir = "../../uploads/";
	$temp = explode(".", $_FILES["imagem"]["name"]);
	$newfilename = $target_dir . '/produto-' . $_POST['codigo'] . '.' . end($temp);

	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $newfilename)){
		$imagemProduto = 'produto-' . $_POST['codigo'] . '.' . end($temp);
	}else{
		$imagemProduto = 'msp.jpg';
	}

	$stmt = $mysqli->prepare('INSERT INTO produto (nome, descricao, codigo, imagem, preco) VALUES (?,?,?,?,?)');	
	$stmt->bind_param("ssssd", $_POST['nome'], $_POST['descricao'], $_POST['codigo'], $imagemProduto, $_POST['preco']);
	$stmt->execute();
	$stmt->close();

	$stmt = $mysqli->prepare('SELECT id_produto FROM produto WHERE codigo = ?');
	$stmt->bind_param("s", $_POST['codigo']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_produto);
	$stmt->fetch();

	$tamanho = array("S","M","L","XL");
	
	for($y = 0 ; $y < count($tamanho) ; $y++){
		$stmt1 = $mysqli->prepare('INSERT INTO produto_detalhes (tamanho, quantidade, id_produto) VALUES (?,?,?)');	
		$stmt1->bind_param("ssi", $tamanho[$y], $_POST['quantidade'], $id_produto);
		$stmt1->execute();
		$stmt1->close();
	}

	$stmt->close();

	header("Location: backoffice.php?p=produto");
?>