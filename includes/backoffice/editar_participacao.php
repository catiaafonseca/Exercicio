<!-- Seleciona dados de acordo com a participação escolhida e permite alterar para que possam ser mudados na base de dados -->
<?php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	if($stmt = $mysqli->prepare("SELECT piloto.nome, corrida.cidade, corrida.pais FROM piloto JOIN participa ON piloto.id_piloto = participa.id_piloto JOIN corrida ON participa.ordem = corrida.ordem WHERE participa.id_piloto = ? AND participa.ordem = ?")) {
		$stmt->bind_param("ii", $_GET['id'], $_GET['ordem']);	
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($nome, $cidade, $pais);
		$stmt->fetch(); ?>
		
			<div class="w3-container">
				<br>
				<form class="well form-horizontal" style="background: white;" action="validar_participacao.php?id=<?=$_GET['id']?>&ordem=<?=$_GET['ordem']?>" method="post" accept-charset="ISO-8859-1">
					<fieldset>

						<!-- Form Name -->
						<legend>Editar Participação</legend>

						<!-- Text input-->
						<div class="form-group"> 
							<label class="col-md-4 control-label">Nome do Piloto</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
									<select disabled="disabled" name="piloto" class="form-control selectpicker">
										<option value="<?=$_GET['id']?>"><?=$nome?></option>
									</select>
								</div>
							</div>
						</div>

						<!-- Text input-->
						<div id="corridaBlock" class="form-group">
							<label class="col-md-4 control-label">Corrida</label>
							<div class="col-md-4 selectContainer">
							    <div class="input-group">
							        <span class="input-group-addon"><i class="fa fa-flag-checkered"></i></span>
							        <select disabled="disabled" name="corrida" class="form-control selectpicker">
							        	<option value="<?=$_GET['ordem']?>"><?=($pais .' - '. $cidade)?></option>
			        				</select>
			    				</div>
							</div>
						</div>

						<!-- Text input-->
						<div id="pontosBlock" class="form-group">
							<label class="col-md-4 control-label">Pontos</label>  
							<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-trophy"></i></span>
									<select required="" id="pontos" name="pontos" class="form-control selectpicker" >
										<?php		
											if($stmt1 = $mysqli->prepare("SELECT pontos FROM participa WHERE ordem = ?")) {
												$stmt1->bind_param("i", $_GET['ordem']);
												$stmt1->execute();
												$stmt1->store_result();
												$stmt1->bind_result($pontos);
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

												$stmt1->close();	
											}											
										?>
									</select>
								</div>
							</div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label"></label>
						  <div class="col-md-4">
							<button type="submit" class="btn btn-warning" >Editar <span class="glyphicon glyphicon-envelope"></span></button>
						  </div>
						</div>

					</fieldset>
				</form>
			</div>

<?php 
		$stmt->close(); 
	} 
?>