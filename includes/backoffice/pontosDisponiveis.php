<!-- Devolve os valores corretos para completar o select correspondente aos pontos de uma corrida -->
<?php		
	include("../../config/config.php");
	if($stmt = $mysqli->prepare("SELECT pontos FROM participa WHERE ordem = ?")) {
		$stmt->bind_param("i", $_GET['ordem']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($pontos);
		$data = array();
		while ($stmt->fetch()) {
			$data[] = $pontos; 
		}

		$values = array(25, 18, 15, 12, 10,	8,	6,	4,	2, 1);

		for($x = 0 ; $x < count($data) ; $x++){
			for($y = 0 ; $y < count($values) ; $y++){
				if($data[$x] == $values[$y]){
					$values = array_diff($values, array($values[$y]));
					$values = array_values($values);
				}
			}
		}

		for($y = 0 ; $y < count($values) ; $y++){
			echo "<option value='$values[$y]'>$values[$y]</option>";
		}

		$stmt->close();	
	}											
?>