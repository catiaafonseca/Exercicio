<!-- Formulário de registo de um produto -->
<?php
	include("../../config/config.php");
	if($stmt = $mysqli->prepare("SELECT COUNT(*) AS numProduto FROM produto")) {	
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($numProduto);
		$num_rows = $stmt->num_rows;
		$stmt->fetch(); 
		$numProduto = $numProduto + 1;?>
		
		<div class="w3-container">
			<br>
			<form class="well form-horizontal" style="background: white;" action="inserir_produto.php" method="post" enctype="multipart/form-data">
				<fieldset>

					<!-- Form Name -->
					<legend>Registo de Produto</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Nome</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input  name="nome" placeholder="Nome do Produto" class="form-control"  type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Descrição</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input  name="descricao" placeholder="Descrição do Produto" class="form-control"  type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Código</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input value="T<?=($numProduto < 10 ? '0'.$numProduto : $numProduto)?>" name="codigo" class="form-control" readonly="readonly" type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Preço</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-eur"></i></span>
							<input  name="preco" placeholder="0,00" step="0.01" min="0" class="form-control"  type="number" required="">
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Imagem</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							  <span class="input-group-btn">
								<span class="btn btn-info" onclick="$(this).parent().find('input[type=file]').click();">Procurar</span>
								<input name="imagem" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
							  </span>
							  <span class="form-control"></span>
							</div>
						</div>
					</div>

					<!-- Text input-->
					<!--<div class="form-group">
						<label class="col-md-4 control-label">Tamanho</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-align-left"></i></span>
							<input  name="tamanho" placeholder="S/M/L/XL" class="form-control" type="text" required="">
							</div>
						</div>
					</div>-->

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Quantidade por tamanho</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
							<input  name="quantidade" placeholder="1" min="1" class="form-control" type="number" required="">
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
<?php
		$stmt->close();
	}
?>