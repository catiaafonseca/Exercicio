<!-- Tabela que mostra corridas e permite escolher a ação, ou seja, adicionar nova corrida, editar uma e elimina-la -->
<div class="w3-container">
	<br>
	<a style="text-decoration: none; color:white;" href="?p=regista_corrida"><button type="button" class="btn btn-info">Adicionar</button></a>
	<hr>
	<table class="w3-table w3-bordered w3-striped w3-border w3-hoverable w3-white">
		<thead>
			<tr>
				<th>Ordem</th>
				<th>Voltas</th>
				<th>País</th>
				<th>Cidade</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("../../config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT ordem, voltas, pais, cidade FROM corrida ORDER BY ordem")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($ordem, $voltas, $pais, $cidade);
					while ($stmt->fetch()) {
						echo "<tr><td>$ordem</td>";
						echo "<td>$voltas</td>";
						echo "<td>$pais</td>";
						echo "<td>$cidade</td>";
						echo "<td><a href='?p=editar_corrida&ordem=$ordem'><i class='fa fa-pencil-square-o'></i></a> <a href='?p=eliminar_corrida&ordem=$ordem' Onclick='return confirmDelete();'><i class='fa fa-trash-o'></i></a></td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
	<hr>
</div>