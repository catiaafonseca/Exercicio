<?php
	#Faz update da tabela produto, de acordo com os valores do formulário editar_produto.php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');

	$target_dir = "../../uploads/";
	$temp = explode(".", $_FILES["imagem"]["name"]);
	$newfilename = $target_dir . '/produto-' . $_GET['id'] . '.' . end($temp);

	if(move_uploaded_file($_FILES['imagem']['tmp_name'], $newfilename)){
		$imagemProduto = 'produto-' . $_GET['id'] . '.' . end($temp);
	}else{
		$imagemProduto = $_GET['imagem'];
	}

	$stmt = $mysqli->prepare("UPDATE produto SET nome=?, descricao=?, codigo=?, imagem=?, preco=? WHERE id_produto=?");
	$stmt->bind_param("ssssdi",$_POST['nome'], $_POST['descricao'], $_POST['codigo'], $imagemProduto, $_POST['preco'], $_GET['id']);
	$stmt->execute();
	$stmt->close();
	
	$stmt = $mysqli->prepare("UPDATE produto_detalhes SET tamanho=?, quantidade=? WHERE id_produto_detalhes=?");
	$stmt->bind_param("sii",$_POST['tamanho'], $_POST['quantidade'], $_GET['pd']);
	$stmt->execute();
	$stmt->close();

	header("Location: backoffice.php?p=produto");	
?>