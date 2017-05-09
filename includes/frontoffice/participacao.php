<!-- Tabela com todos os valores das participações -->
</br>
<div class="container panel panel-default">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Corrida</th>
				<th>Pontos</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("config/config.php");
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
						echo "<td>$pontos</td></tr>";
						$stmt2->close();
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
</div>