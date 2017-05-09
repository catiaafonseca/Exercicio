<div class="col-md-12 headerFix">
	<div class="col-md-2">
		<img src="uploads/logo.png" height="50px;" alt="Logo">
	</div>
	<div class="col-md-10 cartFix">
		<a href="#" class="cart-box" id="cart-info" title="Ver Carrinho">
			<span class="label label-warning notificationFix">
				<?php 
					if(isset($_SESSION["products"])){
						echo count($_SESSION["products"]); 
					}
					else{
						echo 0;
					}
				?>
			</span>
			<i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #019dcb;"></i>
		</a>
		
		<div class="shopping-cart-box cartInfoFix" style="z-index:1;">
			<a href="#" class="close-shopping-cart-box" ><i class="fa fa-window-close" aria-hidden="true"></i></a>
			<h4>Carrinho de Compras</h4>
			<div id="shopping-cart-results">
			</div>
		</div>
		
	</div>
</div>

<div class="container">
	<div class="col-md-12">
	
		<?php
			include("config/config.php");
			$mysqli->set_charset('utf8mb4');
			if($stmt = $mysqli->prepare("SELECT imagem, nome, preco, codigo, descricao FROM produto")) {
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($imagem, $nome, $preco, $codigo, $descricao);
				while ($stmt->fetch()) { ?>
	
					<div class="col-md-3 selectFix marginFix">
						<img class="fixProduto" src="uploads/<?=$imagem?>"/>
						<form class="form-item">
							<label name="product_name" value="<?=$nome?>" class="fixDescription"><?=$nome?> - <?=$descricao?></label><br>
							<label name="product_price" value="<?=$preco?>" style="font-weight: normal;">PVP: <?=$preco?>€</label>
							<hr>
								<div class="btn-group selectFix" data-toggle="buttons">
									<label class="btn">
								    	<input id='<?=$codigo?>' required="" type="radio" name="product_size" value="S">S
								  	</label>
								  	<label class="btn">
								    	<input id='<?=$codigo?>' required="" type="radio" name="product_size" value="M">M
								  	</label>
								  	<label class="btn">
								    	<input id='<?=$codigo?>' required="" type="radio" name="product_size" value="L">L
								  	</label>
								  	<label class="btn">
								    	<input id='<?=$codigo?>' required="" type="radio" name="product_size" value="XL">XL
								  	</label>
								</div>
								<!--<a onClick="Function();"><span class="sizeBox" value="S">S</span></a>
								<a><span class="sizeBox" value="M">M</span></a>
								<a><span class="sizeBox" value="L">L</span></a>
								<a><span class="sizeBox" value="XL">XL</span></a>
								<a><span class="sizeBox" value="XXL">XXL</span></a>-->
							<hr>
								<span>Quantidade: </span><input required="" type="number" name="product_qty" placeholder="1" min="1" max="99">
								<input name="product_code" type="hidden" value="<?=$codigo?>">
								<input name="descricao" type="hidden" value="<?=$descricao?>">
							<hr>
							<button type="submit" class="btn submit">Adicionar ao Carrinho <i class="fa fa-shopping-cart" aria-hidden="true" style="color: white;"></i></button>
						</form>
					</div>
		<?php
				}
				$stmt->close();	
			}		
		?>
		
	</div>
</div>