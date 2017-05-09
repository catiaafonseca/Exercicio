<!-- Seleciona dados de acordo com o produto escolhido e permite alterar para que possam ser mudados na base de dados -->
<?php
	include("../../config/config.php");
	$mysqli->set_charset('utf8mb4');
	if($stmt = $mysqli->prepare("SELECT produto.nome, produto.descricao, produto.codigo, produto.imagem, produto.preco, produto_detalhes.tamanho, produto_detalhes.quantidade FROM produto JOIN produto_detalhes WHERE produto.id_produto = ? AND produto_detalhes.id_produto_detalhes = ?")) {
		$stmt->bind_param("ii", $_GET['id'], $_GET['pd']);	
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($nome, $descricao, $codigo, $imagem, $preco, $tamanho, $quantidade);
		$stmt->fetch(); ?>
		
		<div class="w3-container">
			<br>
			<form class="well form-horizontal" style="background: white;" action="validar_produto.php?id=<?=$_GET['id']?>&imagem=<?=$imagem?>&pd=<?=$_GET['pd']?>" method="post" enctype="multipart/form-data">
				<fieldset>

					<!-- Form Name -->
					<legend>Editar Produto</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Nome</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input value="<?=$nome?>" name="nome" placeholder="Nome do Produto" class="form-control"  type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Descrição</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input value="<?=$descricao?>" name="descricao" placeholder="Descrição do Produto" class="form-control"  type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Código</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
							<input readonly="readonly" value="<?=$codigo?>" name="codigo" placeholder="Código do Produto" class="form-control"  type="text" required="">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Preço</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-eur"></i></span>
							<input value="<?=$preco?>" name="preco" placeholder="0,00" step="0.01" min="0" class="form-control"  type="number" required="">
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
					<div class="form-group">
						<label class="col-md-4 control-label">Tamanho</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-align-left"></i></span>
							<input value="<?=$tamanho?>" name="tamanho" placeholder="S/M/L/XL/XLL" class="form-control" type="text" required="">
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label">Quantidade</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
							<input value="<?=$quantidade?>" name="quantidade" placeholder="1" min="1" class="form-control" type="number" required="">
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