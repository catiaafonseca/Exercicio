<!-- Formulário de registo de uma participação -->
<div class="w3-container">
	<br>
	<form class="well form-horizontal" style="background: white;" action="inserir_participacao.php" method="post" accept-charset="ISO-8859-1">
		<fieldset>

			<!-- Form Name -->
			<legend>Registo de Participação</legend>

			<!-- Text input-->
			<div class="form-group"> 
				<label class="col-md-4 control-label">Nome do Piloto</label>
				<div class="col-md-4 selectContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
						<!-- Dependendo do valor escolhido neste select o próximo é atualizado através da função corridaDisponivel() que recebe o valor, ou seja, o id_piloto -->
						<select required="" name="piloto" class="form-control selectpicker" onchange="corridaDisponivel(this.value);">
							<option value="0">Seleciona um piloto:</option>
							<?php
								include("../../config/config.php");
								$mysqli->set_charset('utf8mb4');
								if($stmt = $mysqli->prepare("SELECT id_piloto, nome FROM piloto ORDER BY id_piloto")) {
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($id_piloto, $nome);
									while ($stmt->fetch()) {
										echo "<option value='$id_piloto'>$nome</option>";
									}
									$stmt->close();	
								}											
							?>
						</select>
					</div>
				</div>
			</div>

			<!-- Text input-->
			<div id="corridaBlock" class="form-group" style="display: none;">
				<label class="col-md-4 control-label">Corrida</label>
				<div class="col-md-4 selectContainer">
				    <div class="input-group">
				        <span class="input-group-addon"><i class="fa fa-flag-checkered"></i></span>
				        <!-- Dependendo do valor escolhido neste select o próximo é atualizado através da função pontosDisponiveis() que recebe o valor, ou seja, a ordem -->
				        <select required="" id="corrida" name="corrida" class="form-control selectpicker" onchange="pontosDisponiveis(this.value);">
        				</select>
    				</div>
				</div>
			</div>

			<!-- Text input-->
			<div id="pontosBlock" class="form-group" style="display: none;">
				<label class="col-md-4 control-label">Pontos</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-trophy"></i></span>
						<select required="" id="pontos" name="pontos" class="form-control selectpicker" >
						</select>
					</div>
				</div>
			</div>
			
			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label"></label>
			  <div class="col-md-4">
				<button type="submit" class="btn btn-warning" >Registar <span class="glyphicon glyphicon-envelope"></span></button>
			  </div>
			</div>

		</fieldset>
	</form>
</div>