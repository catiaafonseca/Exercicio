<!-- Tabela com todos os valores dos pilotos -->
</br>
<div id="body" class="container panel panel-default">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Nome</th>
				<th>Género</th>
				<th>Nascimento</th>
				<th>País</th>
				<th>Equipa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT id_piloto, nome, genero, nascimento, pais, sigla, imagem FROM piloto ORDER BY nome ASC")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_piloto, $nome, $genero, $nascimento, $pais, $equipa, $imagem);
					while ($stmt->fetch()) {
						echo "<tr><td><img class='img-circle' src='uploads/$imagem' width='30' height='30'></td>";
						echo "<td>$nome</td>";
						echo "<td>$genero</td>";
						echo "<td>$nascimento</td>";
						echo "<td>$pais</td>";
						echo "<td>$equipa</td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
</div>