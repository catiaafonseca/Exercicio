<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Formula-E</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="http://cms.fiaformulae.com/images/formula-e-logo.png">
		<link rel="stylesheet" href="../../css/backoffice.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<script src="../../js/functions.js"></script>
		<style>
			html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
		</style>
		
		<?php
			session_start();
			if(isset($_GET['p'])){
				$page = $_GET['p'];
			}
			else{
				$page = "inicio";
			}
		?>
	</head>
	<body class="w3-light-grey">
	
		<!-- Top container #Header.php-->
		<?php include("header.php"); ?>

		<!-- Sidenav/menu #Menu.php-->
		<?php include("menu.php"); ?>

		<!-- !PAGE CONTENT! #Inicio.php-->
		<div class="w3-main" style="margin-left:300px;margin-top:43px;">
	
			<?php
				$file = $page.".php";
				if (file_exists($file)){
					include("$page.php");
				}
				else{
					include("404.php");
				}
			?>	

			<!-- Footer #footer.php-->
			<?php include("footer.php"); ?>
		
		<!-- End page content #Inicio.php-->
		</div>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-info">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Erro</h4>
					</div>
					<div class="modal-body modal-spa">
						<p>Não foi possível inserir o conteúdo na base de dados!</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Script -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="../../js/bootstrap.js"></script>

		<script>
		// Get the Sidenav
		var mySidenav = document.getElementById("mySidenav");

		// Get the DIV with overlay effect
		var overlayBg = document.getElementById("myOverlay");

		// Toggle between showing and hiding the sidenav, and add overlay effect
		function w3_open() {
			if (mySidenav.style.display === 'block') {
				mySidenav.style.display = 'none';
				overlayBg.style.display = "none";
			} else {
				mySidenav.style.display = 'block';
				overlayBg.style.display = "block";
			}
		}

		// Close the sidenav with the close button
		function w3_close() {
			mySidenav.style.display = "none";
			overlayBg.style.display = "none";
		}
		</script>
		
		<script type='text/javascript'>
			function confirmDelete() {
				return confirm("Esta ação pode apagar dados que futuramente podem ser necessários. Deseja continuar?");
			}
		</script>
		
		<?php
			if(isset($_GET['s'])){
				if($_GET['s'] == 1){
					echo "<script type='text/javascript'>
							$(document).ready(function(){
								$('#myModal').modal('show');
							});
						  </script>";
				}
			}	
		?>
		
	</body>
</html>
