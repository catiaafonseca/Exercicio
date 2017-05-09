<!-- Tabela que mostra produtos e permite escolher a ação, ou seja, adicionar novo produto, editar um e elimina-lo -->
<div class="w3-container">
	<br>
	<a style="text-decoration: none; color:white;"href="?p=regista_produto"><button type="button" class="btn btn-info">Adicionar</button></a>
	<hr>
	<table class="w3-table w3-bordered w3-striped w3-border w3-hoverable w3-white">
		<thead>
			<tr>
				<th>Código</th>
				<th>Produto</th>
				<th>Nome</th>
				<th>Quantidade</th>
				<th>Tamanho</th>
				<th>Preço</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("../../config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT produto.id_produto, produto.nome, produto.descricao, produto.codigo, produto.imagem, produto.preco, produto_detalhes.tamanho, produto_detalhes.quantidade, produto_detalhes.id_produto_detalhes FROM produto JOIN produto_detalhes ON produto.id_produto = produto_detalhes.id_produto")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_produto, $nome, $descricao, $codigo, $imagem, $preco, $tamanho, $quantidade, $id_produto_detalhes);
					while ($stmt->fetch()) {
						echo "<tr><td>$codigo</td>";
						echo "<td><img src='../../uploads/$imagem' width='80' height='80'></td>";
						echo "<td>$nome - $descricao</td>";
						echo "<td>$quantidade</td>";
						echo "<td>$tamanho</td>";
						echo "<td>$preco €</td>";
						echo "<td><a href='?p=editar_produto&id=$id_produto&pd=$id_produto_detalhes'><i class='fa fa-pencil-square-o'></i></a> <a href='?p=eliminar_produto&pd=$id_produto_detalhes' Onclick='return confirmDelete();'><i class='fa fa-trash-o'></i></a></td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
	<hr>
</div>