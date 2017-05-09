<?php
	$sigla = $_GET['sigla'];
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	if($stmt = $mysqli->prepare("SELECT piloto.nome, piloto.imagem, SUM(participa.pontos) FROM piloto join participa ON piloto.id_piloto = participa.id_piloto WHERE piloto.sigla = ? GROUP BY piloto.id_piloto")) {
	  $stmt->bind_param("s", $sigla);
	  $stmt->execute();
	  $stmt->store_result();
	  $stmt->bind_result($nome, $imagem, $pontos);
	  echo "<br><table class='table table-hover table-striped table-bordered'>
				<thead>
				  <tr>
					<th></th>
					<th>Piloto</th>
					<th>Equipa</th>
					<th>Pontos</th>
				  </tr>
				</thead>
				<tbody>";
	  while ($stmt->fetch()) {
		echo "<tr><td><img class='img-circle' src='uploads/$imagem' width='30' height='30'></td>";
		echo "<td>$nome</td>";
		echo "<td>$sigla</td>";
		echo "<td>$pontos</td></tr>";
	  }
	  echo"		</tbody>
			</table>";
	  $stmt->close(); 
	}                     
?>