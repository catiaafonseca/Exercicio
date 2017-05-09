<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-animate-left" style="z-index:3;width:300px; background-color:#E8E8E8;" id="mySidenav"><br>
	<div class="w3-container w3-row">
		<div class="w3-col s4">
			<img src="../../uploads/user.png" class="w3-circle w3-margin-right" style="width:46px">
		</div>
		<div class="w3-col s8">
			<span style="color: #2196F3!important;">Bem vindo(a), <strong><?=$_SESSION['login']?></strong></span><br>
			<a href="#" class="w3-hover-none w3-hover-text-red w3-show-inline-block">
				<a href="logoff.php" class="w3-hover-none w3-hover-text-red w3-show-inline-block">Sair <i class="fa fa-power-off"></i>
			</a>
		</div>
	</div>
	<hr>
	<div class="w3-container">
		<h5>Menu</h5>
	</div>

	<!-- O que está dentro de cada class dos a, serve para verificar se aquele separador no menu deve ficar ativo, ou seja, a cada clique que abra uma nova página, o active tem de mudar de acordo com o que clicamos -->

	<a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fechar Menu</a>
	<a href="?p=inicio" class="w3-padding <?=($_GET['p'] == 'inicio' || $_GET['p'] == '' ? 'w3-blue' : '')?>"><i class="fa fa-home fa-fw"></i>  Início</a>
	<a href="?p=piloto" class="w3-padding <?=($_GET['p'] == 'piloto' || $_GET['p'] == 'regista_piloto' || $_GET['p'] == 'editar_piloto' ? 'w3-blue' : '')?>"><i class="fa fa-user fa-fw"></i>  Pilotos</a>
	<a href="?p=equipa" class="w3-padding <?=($_GET['p'] == 'equipa' || $_GET['p'] == 'regista_equipa' || $_GET['p'] == 'editar_equipa' ? 'w3-blue' : '')?>"><i class="fa fa-users fa-fw"></i>  Equipas</a>
	<a href="?p=corrida" class="w3-padding <?=($_GET['p'] == 'corrida' || $_GET['p'] == 'regista_corrida' || $_GET['p'] == 'editar_corrida' ? 'w3-blue' : '')?>"><i class="fa fa-flag-checkered fa-fw"></i>  Corridas</a>
	<a href="?p=participacao" class="w3-padding <?=($_GET['p'] == 'participacao' || $_GET['p'] == 'regista_participacao' || $_GET['p'] == 'editar_participacao' ? 'w3-blue' : '')?>"><i class="fa fa-list-ol fa-fw"></i>  Participação</a>
	<a href="?p=produto" class="w3-padding <?=($_GET['p'] == 'produto' || $_GET['p'] == 'regista_produto' || $_GET['p'] == 'editar_produto' ? 'w3-blue' : '')?>"><i class="fa fa-shopping-bag fa-fw"></i>  Produtos</a>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>