<!-- Página que permite ver todos os resultados -->
</br>
<div class="container">
  <div class="panel-group" id="accordion">
  <!-- Resultados por equipa-->
    <div class="panel panel-default">
      <a  style="text-decoration:none; color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><div class="panel-heading" style="background-color: #5bc0de;">
        <h4 class="panel-title">
          Classificação Geral - Equipa
        </h4>
      </div></a>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">

          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>Posição</th>
                <th>Pontos</th>
                <th>Equipa</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("config/config.php");
                $mysqli->set_charset('utf8mb4');
                if($stmt = $mysqli->prepare("SELECT SUM(participa.pontos) AS pontuacao, piloto.sigla FROM participa
                  JOIN piloto ON participa.id_piloto = piloto.id_piloto GROUP BY piloto.sigla ORDER BY pontuacao DESC")) {
                  $stmt->execute();
                  $stmt->store_result();
                  $stmt->bind_result($pontuacao, $sigla);
                  $x=1;
                  while ($stmt->fetch()) {
                    echo "<tr><td>$x.º</td>";
                    echo "<td>$pontuacao</td>";
                    echo "<td>$sigla</td></tr>";
                    $x++;
                  }
                  $stmt->close(); 
                }                     
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- Resultados por piloto -->
    <div class="panel panel-default">
      <a style="text-decoration:none; color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><div class="panel-heading" style="background-color: #5bc0de;">
        <h4 class="panel-title">
			Classificação Geral - Pilotos
        </h4>
      </div></a>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>Posição</th>
                <th>Pontos</th>
                <th>Piloto</th>
                <th>Equipa</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("config/config.php");
                $mysqli->set_charset('utf8mb4');
                if($stmt = $mysqli->prepare("SELECT SUM(participa.pontos) AS pontuacao, piloto.nome, piloto.sigla FROM participa JOIN piloto ON participa.id_piloto = piloto.id_piloto GROUP BY piloto.id_piloto ORDER BY pontuacao DESC")) {
                  $stmt->execute();
                  $stmt->store_result();
                  $stmt->bind_result($pontuacao, $nome, $sigla);
                  $x=1;
                  while ($stmt->fetch()) {
                    echo "<tr><td>$x.º</td>";
                    echo "<td>$pontuacao</td>";
                    echo "<td>$nome</td>";
                    echo "<td>$sigla</td></tr>";
                    $x++;
                  }
                  $stmt->close(); 
                }                     
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- Resultados de cada piloto através da equipa -->
    <div class="panel panel-default">
      <a style="text-decoration:none; color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><div class="panel-heading" style="background-color: #5bc0de;">
        <h4 class="panel-title">
          Classificação Piloto - Equipa
        </h4>
      </div></a>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          
    			<!-- Text input-->
    			<div class="form-group"> 
    				<div class="col-md-4 selectContainer">
    					<div class="input-group">
    						<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
    						<select required="" name="equipa" class="form-control selectpicker" onchange="pontuacaoPiloto(this.value);">
    							<option value="0">Seleciona uma equipa:</option>
    							<?php
    								include("config/config.php");
    								$mysqli->set_charset('utf8mb4');
    								if($stmt = $mysqli->prepare("SELECT equipa.sigla, equipa.nome FROM equipa")) {
    									$stmt->execute();
    									$stmt->store_result();
    									$stmt->bind_result($sigla, $nome);
    									while ($stmt->fetch()) {
    										echo "<option value='$sigla'>$nome</option>";
    									}
    									$stmt->close();	
    								}											
    							?>
    						</select>
    					</div>
    				</div>
    			</div>
    			  
    			<br>
    			  
    			<div id="pontuacaoPiloto" style="display: none;">
    			</div>

        </div>
      </div>
    </div>
    <!-- Resultados por corrida -->
    <div class="panel panel-default">
      <a style="text-decoration:none; color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><div class="panel-heading" style="background-color: #5bc0de;">
        <h4 class="panel-title">
          Classificação Equipa - Corrida
        </h4>
      </div></a>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          
      		<!-- Text input-->
      		<div class="form-group"> 
      			<div class="col-md-4 selectContainer">
      				<div class="input-group">
      					<span class="input-group-addon"><i class="fa fa-flag-checkered"></i></span>
      					<select required="" name="cidade" class="form-control selectpicker" onchange="pontuacaoCorrida(this.value);">
      						<option value="0">Seleciona uma corrida:</option>
      						<?php
      							include("config/config.php");
      							$mysqli->set_charset('utf8mb4');
      							if($stmt = $mysqli->prepare("SELECT ordem, cidade FROM corrida")) {
      								$stmt->execute();
      								$stmt->store_result();
      								$stmt->bind_result($ordem, $cidade);
      								while ($stmt->fetch()) {
      									echo "<option value='$ordem'>$cidade</option>";
      								}
      								$stmt->close();	
      							}											
      						?>
      					</select>
      				</div>
      			</div>
      		</div>
		  
		      <br>
		
      		<div id="pontuacaoCorrida" style="display: none;">
      		</div>

        </div>
      </div>
    </div>
	
  </div> 
</div>