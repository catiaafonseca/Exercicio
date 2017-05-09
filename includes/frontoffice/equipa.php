<!-- Tabela com todos os valores das equipas -->
</br>
<div class="container panel panel-default">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Sigla</th>
				<th>Nome</th>
				<th>País</th>
				<th>Fundação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT sigla, nome, pais, fundacao FROM equipa ORDER BY sigla")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($sigla, $nome, $pais, $fundacao);
					while ($stmt->fetch()) {
						echo "<tr><td>$sigla</td>";
						echo "<td>$nome</td>";
						echo "<td>$pais</td>";
						echo "<td>$fundacao</td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
</div>