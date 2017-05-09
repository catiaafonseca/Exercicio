<!-- Header -->
<header class="w3-container" style="padding-top:22px">
	<h5><b><i class="fa fa-dashboard"></i> Início</b></h5>
</header>

<!--<header class="text-center" style="background-color:orange; padding: 4px; margin: 1px;">
	<h4 style="color:white;">Pilotos</h4>
</header>
<hr>-->

<!-- DINAMIZAR COM PHP A VISUALIZAÇÃO DAS IMAGENS DOS PILOTOS E EQUIPAS -->
<!--<div class="w3-container">
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
	<div class="text-center col-md-3">
		<img class="img-circle" src="../../uploads/user.png" style="height: 200px; width: 200px;"/>
		<p style="margin-top: 6px;">André</p>
	</div>
</div>-->

<!-- Total de Resgistos de cada Tabela -->

<div class="w3-row-padding w3-margin-bottom">
	<div class="w3-quarter">
		<div class="w3-container w3-red w3-padding-16">
			<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
			<div class="w3-right">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT COUNT(sigla) AS equipas FROM equipa")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($numEquipas);
						$stmt->fetch();
						echo "<h3>$numEquipas</h3>";
						$stmt->close();	
					}											
				?>
			</div>
			<div class="w3-clear"></div>
			<h4>Equipas</h4>
		</div>
	</div>
	<div class="w3-quarter">
		<div class="w3-container w3-blue w3-padding-16">
			<div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
			<div class="w3-right">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT COUNT(id_piloto) AS pilotos FROM piloto")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($numPilotos);
						$stmt->fetch();
						echo "<h3>$numPilotos</h3>";
						$stmt->close();	
					}											
				?>
			</div>
			<div class="w3-clear"></div>
			<h4>Pilotos</h4>
		</div>
	</div>
	<div class="w3-quarter">
		<div class="w3-container w3-teal w3-padding-16">
			<div class="w3-left"><i class="fa fa-flag-checkered w3-xxxlarge"></i></div>
			<div class="w3-right">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT COUNT(ordem) AS corridas FROM corrida")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($numCorridas);
						$stmt->fetch();
						echo "<h3>$numCorridas</h3>";
						$stmt->close();	
					}											
				?>
			</div>
			<div class="w3-clear"></div>
			<h4>Corridas</h4>
		</div>
	</div>
	<div class="w3-quarter">
		<div class="w3-container w3-orange w3-text-white w3-padding-16">
			<div class="w3-left"><i class="fa fa-list-ol w3-xxxlarge"></i></div>
			<div class="w3-right">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT COUNT(pontos) AS participacoes FROM participa")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($numParticipacoes);
						$stmt->fetch();
						echo "<h3>$numParticipacoes</h3>";
						$stmt->close();	
					}											
				?>
			</div>
			<div class="w3-clear"></div>
			<h4>Participações</h4>
		</div>
	</div>
</div>

<!-- Equipas e Pilotos -->

<div class="w3-container w3-section">
	<div class="w3-row-padding" style="margin:0 -16px">
	<div class="w3-third">
			<h5>Equipas</h5>
			<table class="w3-table w3-striped w3-white">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT sigla, nome FROM equipa ORDER BY sigla")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($sigla, $nome);
						while ($stmt->fetch()) {
							echo "<tr>";
							echo "<td>$sigla</td>";
							echo "<td><i>$nome</i></td>";
							echo "</tr>";
						}
						$stmt->close();	
					}											
				?>
			</table>
		</div>
		<div class="w3-twothird">
			<h5>Pilotos</h5>
			<table class="w3-table w3-striped w3-white">
				<?php
					include("../../config/config.php");
					$mysqli->set_charset('utf8mb4');
					if($stmt = $mysqli->prepare("SELECT nome, imagem, sigla FROM piloto ORDER BY sigla")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($nome, $imagem, $sigla);
						while ($stmt->fetch()) {
							echo "<tr>";
							echo "<td><img class='img-circle' src='../../uploads/$imagem' width='30' height='30'></td>";
							echo "<td>$nome</td>";
							echo "<td><i>$sigla</i></td>";
							echo "</tr>";
						}
						$stmt->close();	
					}											
				?>
			</table>
		</div>
	</div>
</div>
<hr>

<!-- Estatísticas

<div class="w3-container">
	<h5>Estatísticas</h5>
	<p>New Visitors</p>
	<div class="w3-progress-container w3-grey">
		<div id="myBar" class="w3-progressbar w3-green" style="width:25%">
			<div class="w3-center w3-text-white">+25%</div>
		</div>
	</div>

	<p>New Users</p>
	<div class="w3-progress-container w3-grey">
		<div id="myBar" class="w3-progressbar w3-orange" style="width:50%">
			<div class="w3-center w3-text-white">50%</div>
		</div>
	</div>

	<p>Bounce Rate</p>
	<div class="w3-progress-container w3-grey">
		<div id="myBar" class="w3-progressbar w3-red" style="width:75%">
			<div class="w3-center w3-text-white">75%</div>
		</div>
	</div>
</div>-->

<!-- Países

<div class="w3-container">
	<h5>Countries</h5>
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
		<tr>
			<td>United States</td>
			<td>65%</td>
		</tr>
		<tr>
			<td>UK</td>
			<td>15.7%</td>
		</tr>
		<tr>
			<td>Russia</td>
			<td>5.6%</td>
		</tr>
		<tr>
			<td>Spain</td>
			<td>2.1%</td>
		</tr>
		<tr>
			<td>India</td>
			<td>1.9%</td>
		</tr>
		<tr>
			<td>France</td>
			<td>1.5%</td>
		</tr>
	</table><br>
	<button class="w3-btn">More Countries  <i class="fa fa-arrow-right"></i></button>
</div>
<hr>-->

<!-- Utilizadores Recentes

<div class="w3-container">
	<h5>Recent Users</h5>
	<ul class="w3-ul w3-card-4 w3-white">
		<li class="w3-padding-16">
			<span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
			<img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
			<span class="w3-xlarge">Mike</span><br>
		</li>
		<li class="w3-padding-16">
			<span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
			<img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
			<span class="w3-xlarge">Jill</span><br>
		</li>
		<li class="w3-padding-16">
			<span onclick="this.parentElement.style.display='none'" class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
			<img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
			<span class="w3-xlarge">Jane</span><br>
		</li>
	</ul>
</div>
<hr> -->

<!-- Comentários

<div class="w3-container">
	<h5>Recent Comments</h5>
	<div class="w3-row">
		<div class="w3-col m2 text-center">
			<img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
		</div>
		<div class="w3-col m10 w3-container">
			<h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
			<p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
		</div>
	</div>

	<div class="w3-row">
		<div class="w3-col m2 text-center">
			<img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
		</div>
		<div class="w3-col m10 w3-container">
			<h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
			<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
		</div>
	</div>
</div>
<br> -->

<!-- Informação

<div class="w3-container w3-dark-grey w3-padding-32">
	<div class="w3-row">
		<div class="w3-container w3-third">
			<h5 class="w3-bottombar w3-border-green">Demographic</h5>
			<p>Language</p>
			<p>Country</p>
			<p>City</p>
		</div>
		<div class="w3-container w3-third">
			<h5 class="w3-bottombar w3-border-red">System</h5>
			<p>Browser</p>
			<p>OS</p>
			<p>More</p>
		</div>
		<div class="w3-container w3-third">
			<h5 class="w3-bottombar w3-border-orange">Target</h5>
			<p>Users</p>
			<p>Active</p>
			<p>Geo</p>
			<p>Interests</p>
		</div>
	</div>
</div> -->