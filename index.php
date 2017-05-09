<!-- Conexão à Base de Dados -->
<?php
	session_start();
	include("config/config.php");
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Formula E</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="http://cms.fiaformulae.com/images/formula-e-logo.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/loja.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
		<script src="js/functions.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	</head>
	
	<!-- Dinamização da página -->
	<?php
		if(isset($_GET['p']))
			$p = $_GET['p'];
		else
			$p = "inicio";
	?>
	
	<body>

	<?php include("header.php"); ?>

	<div id="body" class="container-fluid text-center">
		<div class="row content">
			<!-- Insere o conteúdo da variável 'p' (que contém o nome da página) -->
			<?php
				$file = "includes/frontoffice/".$p.".php";
				if (file_exists($file)){
					include("includes/frontoffice/$p.php");
				}
				else{
					include("includes/frontoffice/404.php");
				}
			?>
		</div>
	</div>
	
	<?php
		if($p != 'inicio'){
			include("footer.html");
		}
	?>

	<!-- Modal que corresponde ao login -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body modal-spa">
					<form action="includes/backoffice/auth.php" method="post">
						<fieldset>
							<!-- Input username -->
							<div class="form-group">
								<div class="col-md-2"></div>
								<div class="col-md-8 inputGroupContainer">
									<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input name="username" placeholder="Introduzir o username" class="form-control"  type="text" required="">
									</div>
								</div>
							</div>
							
							<br></br>
							
							<!-- Input password -->
							<div class="form-group">
								<div class="col-md-2"></div>
								<div class="col-md-8 inputGroupContainer">
									<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input name="password" placeholder="Introduzir a password" class="form-control"  type="password" required="">
									</div>
								</div>
							</div>
							
							<br><br>
							
							<!-- Mensagem de erro (escondida por defeito) -->
							<div class="form-group" style="display:none;" id="erro">
								<div class="col-md-2"></div>
								<div class="col-md-8 inputGroupContainer">
									<p style="color:white;background-color:rgba(255, 0, 0, 0.7);text-align:center;">Por favor, verifique os dados de início de sessão!</p>
								</div>
							</div>

							<!-- Botão de Início de Sessão -->
							<div class="form-group">
							  <label class="col-md-4 control-label"></label>
							  <div class="col-md-4">
								<button type="submit" class="btn btn-warning" >Entrar <span class="glyphicon glyphicon-envelope"></span></button>
							  </div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="js/bootstrap.js"></script>

	<?php
		if(isset($_GET['s'])){
			#Mostra o modal Login
			if($_GET['s'] == 0){
				echo "<script type='text/javascript'>
						$(document).ready(function(){
							$('#login').modal('show');
						});
					  </script>";
			}
			#Aviso aquando da inserção de dados de início de sessão errados
			else if($_GET['s'] == 2){
				echo "<script type='text/javascript'>
						$(document).ready(function(){
							$('#login').modal('show');
							$('#erro').css('display','block');
						});
					  </script>";
			}
		}
	?>
	
	<!-- Carrinho -->
	<script>
		$(document).ready(function(){	
			$(".form-item").submit(function(e){
				
				var form_data = $(this).serialize();
				var button_content = $(this).find('button[type=submit]');
				button_content.html('Adicionando...'); //Loading button text 

				$.ajax({ //make ajax request to cart_process.php
					url: "includes/frontoffice/cart_process.php",
					type: "POST",
					dataType:"json", //expect json value from server
					data: form_data
				}).done(function(data){ //on Ajax success
					$(".cart-box").html('<span class="label label-warning notificationFix">'+data.items+'</span><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #019dcb;"></i>'); //total items in cart-info element
					button_content.html('Adicionar ao Carrinho <i class="fa fa-shopping-cart" aria-hidden="true" style="color: white;"></i>'); //reset button text to original text
					$(".form-item").each(function(){
    					this.reset();
					});
					$('.btn').removeClass('active');
				})
				e.preventDefault();
			});

			//Show Items in Cart
			$( ".cart-box").click(function(e) { //when user clicks on cart box
				e.preventDefault(); 
				$(".shopping-cart-box").fadeIn(); //display cart box
				$("#shopping-cart-results").html('<img src="uploads/ajax-loader.gif">'); //show loading image
				$("#shopping-cart-results" ).load( "includes/frontoffice/cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
			});
	
			//Close Cart
			$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
				e.preventDefault(); 
				$(".shopping-cart-box").fadeOut(); //close cart-box
			});
			
			//Remove items from cart
			$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
				event.preventDefault(); 
				var pcode = $(this).attr("data-code"); //get product code
				$(this).parent().fadeOut(); //remove item element from box
				$.getJSON( "includes/frontoffice/cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
					$("#cart-info").html('<span class="label label-warning notificationFix">'+data.items+'</span><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: #019dcb;"></i>'); //update Item count in cart-info
					$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
				});
			});

		});
	</script>
	
	</body>
</html>