<!-- Devolve os valores corretos para completar o select correspondente as corridas não concorridas pelo piloto escolhido anteriormente -->
<?php       
    include("../../config/config.php");
    $mysqli->set_charset('utf8mb4');
    echo "<option value='0'>Seleciona uma corrida:</option>";
    if($stmt = $mysqli->prepare("SELECT COUNT(id_piloto) AS numId FROM participa WHERE id_piloto = ?")) {
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($numId);
        $stmt->fetch();
        if($numId == 0){
            $stmt = $mysqli->prepare("SELECT corrida.ordem, corrida.cidade FROM corrida JOIN participa WHERE corrida.ordem NOT IN (SELECT participa.ordem FROM participa) OR corrida.ordem NOT IN (SELECT participa.ordem FROM participa JOIN corrida WHERE participa.id_piloto <> ? AND participa.ordem <> (SELECT ordem FROM participa WHERE id_piloto = ?)) GROUP BY ordem");
            $stmt->bind_param("ii", $_GET['id'], $_GET['id']);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($ordem, $cidade);
            while ($stmt->fetch()) {
                echo "<option value='$ordem'>$cidade</option>";
            }
        }
        else{
            $stmt = $mysqli->prepare("SELECT corrida.ordem, corrida.cidade FROM corrida JOIN participa WHERE corrida.ordem NOT IN (SELECT participa.ordem FROM participa) OR corrida.ordem IN (SELECT participa.ordem FROM participa JOIN corrida WHERE participa.id_piloto <> ? AND participa.ordem <> (SELECT ordem FROM participa WHERE id_piloto = ?)) GROUP BY ordem");
            $stmt->bind_param("ii", $_GET['id'], $_GET['id']);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($ordem, $cidade);
            while ($stmt->fetch()) {
                echo "<option value='$ordem'>$cidade</option>";
            }
        }
        $stmt->close(); 
    }                       
?>