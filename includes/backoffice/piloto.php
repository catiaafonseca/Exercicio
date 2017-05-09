<!-- Tabela que mostra pilotos e permite escolher a ação, ou seja, adicionar novo piloto, editar um e elimina-lo -->
<div class="w3-container">
	<br>
	<a style="text-decoration: none; color:white;"href="?p=regista_piloto"><button type="button" class="btn btn-info">Adicionar</button></a>
	<hr>
	<table class="w3-table w3-bordered w3-striped w3-border w3-hoverable w3-white">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Nome</th>
				<th>Género</th>
				<th>Nascimento</th>
				<th>País</th>
				<th>Equipa</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("../../config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT id_piloto, nome, genero, nascimento, pais, sigla, imagem FROM piloto ORDER BY nome ASC")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_piloto, $nome, $genero, $nascimento, $pais, $equipa, $imagem);
					while ($stmt->fetch()) {
						echo "<tr><td><img class='img-circle' src='../../uploads/$imagem' width='30' height='30'></td>";
						echo "<td>$nome</td>";
						echo "<td>$genero</td>";
						echo "<td>$nascimento</td>";
						echo "<td>$pais</td>";
						echo "<td>$equipa</td>";
						echo "<td><a href='?p=editar_piloto&id=$id_piloto'><i class='fa fa-pencil-square-o'></i></a> <a href='?p=eliminar_piloto&id=$id_piloto' Onclick='return confirmDelete();'><i class='fa fa-trash-o'></i></a></td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
	<hr>
</div>