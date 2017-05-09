<!-- Tabela que mostra equipas e permite escolher a ação, ou seja, adicionar nova equipa, editar uma e elimina-la -->
<div class="w3-container">
	<br>
	<a style="text-decoration: none; color:white;" href="?p=regista_equipa"><button type="button" class="btn btn-info">Adicionar</button></a>
	<hr>
	<table class="w3-table w3-bordered w3-striped w3-border w3-hoverable w3-white">
		<thead>
			<tr>
				<th>Sigla</th>
				<th>Nome</th>
				<th>País</th>
				<th>Fundação</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("../../config/config.php");
				$mysqli->set_charset('utf8mb4');
				if($stmt = $mysqli->prepare("SELECT sigla, nome, pais, fundacao FROM equipa ORDER BY sigla")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($sigla, $nome, $pais, $fundacao);
					while ($stmt->fetch()) {
						echo "<tr><td>$sigla</td>";
						echo "<td>$nome</td>";
						echo "<td>$pais</td>";
						echo "<td>$fundacao</td>";
						echo "<td><a href='?p=editar_equipa&sigla=$sigla'><i class='fa fa-pencil-square-o'></i></a> <a href='?p=eliminar_equipa&sigla=$sigla' Onclick='return confirmDelete();'><i class='fa fa-trash-o'></i></a></td></tr>";
					}
					$stmt->close();	
				}											
			?>
		</tbody>
	</table>
	<hr>
</div>