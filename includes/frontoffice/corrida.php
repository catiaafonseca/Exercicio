<!-- Tabela com todos os valores das corridas -->
</br>
<div class="container panel panel-default">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Ordem</th>
				<th>Voltas</th>
				<th>País</th>
				<th>Cidade</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT ordem, voltas, pais, cidade FROM corrida ORDER BY ordem")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($ordem, $voltas, $pais, $cidade);
					while ($stmt->fetch()) {
						echo "<tr><td>$ordem</td>";
						echo "<td>$voltas</td>";
						echo "<td>$pais</td>";
						echo "<td>$cidade</td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
</div>