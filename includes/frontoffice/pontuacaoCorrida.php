<?php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	if($stmt = $mysqli->prepare("SELECT SUM(participa.pontos) AS pontuacao, piloto.sigla FROM participa JOIN piloto ON participa.id_piloto = piloto.id_piloto WHERE participa.ordem = ? GROUP BY piloto.sigla ORDER BY pontuacao DESC")) {
	  $stmt->bind_param("i", $_GET['ordem']);
	  $stmt->execute();
	  $stmt->store_result();
	  $stmt->bind_result($pontos, $equipa);
	  $x=1;
	  echo "<br><table class='table table-hover table-striped table-bordered'>
				<thead>
				  <tr>
					<th>Posição</th>
					<th>Pontos</th>
					<th>Equipa</th>
				  </tr>
				</thead>
				<tbody>";
	  while ($stmt->fetch()) {
		echo "<tr><td>$x.º</td>";
		echo "<td>$pontos</td>";
		echo "<td>$equipa</td></tr>";
		$x++;
	  }
	  echo"		</tbody>
			</table>";
	  $stmt->close(); 
	}                     
?>