<!-- Tabela que mostra participações e permite escolher a ação, ou seja, adicionar nova participação, editar uma e elimina-la -->
<div class="w3-container">
	<br>
	<a style="text-decoration: none; color:white;" href="?p=regista_participacao"><button type="button" class="btn btn-info">Adicionar</button></a>
	<hr>
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Corrida</th>
				<th>Pontos</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("../../config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT id_piloto, ordem, pontos FROM participa ORDER BY ordem, pontos DESC")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_piloto, $ordem, $pontos);
					while ($stmt->fetch()) {
						$stmt1 = $mysqli->prepare("SELECT nome FROM piloto WHERE id_piloto = ?");
						$stmt1->bind_param("i", $id_piloto);
						$stmt1->execute();
						$stmt1->store_result();
						$stmt1->bind_result($nome);
						$stmt1->fetch();
						echo "<tr><td>$nome</td>";
						$stmt1->close();
						$stmt2 = $mysqli->prepare("SELECT cidade, pais FROM corrida WHERE ordem = ?");
						$stmt2->bind_param("i", $ordem);
						$stmt2->execute();
						$stmt2->store_result();
						$stmt2->bind_result($cidade, $pais);
						$stmt2->fetch();
						echo "<td>$pais - $cidade</td>";
						echo "<td>$pontos</td>";
						echo "<td><a href='?p=editar_participacao&id=$id_piloto&ordem=$ordem'><i class='fa fa-pencil-square-o'></i></a> <a href='?p=eliminar_participacao&id=$id_piloto&ordem=$ordem' Onclick='return confirmDelete();'><i class='fa fa-trash-o'></i></a></td></tr>";
						$stmt2->close();
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
	<hr>
</div>