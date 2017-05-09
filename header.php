<nav style="border-radius: 0px;" class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="header-limiter">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="<?=($_GET['p'] == 'inicio' || $_GET['p'] == '' ? 'active' : '')?>"><a href="?p=inicio">Início</a></li>

			  	<li class="<?=($_GET['p'] == 'equipa' ? 'active' : '')?>"><a href="?p=equipa">Equipa</a></li>

			  	<li class="<?=($_GET['p'] == 'corrida' ? 'active' : '')?>"><a href="?p=corrida">Corrida</a></li>

			  	<li class="<?=($_GET['p'] == 'piloto' ? 'active' : '')?>"><a href="?p=piloto">Piloto</a></li>

			  	<li class="<?=($_GET['p'] == 'participacao' ? 'active' : '')?>"><a href="?p=participacao">Participação</a></li>
				  
			  	<li class="<?=($_GET['p'] == 'resultados' ? 'active' : '')?>"><a href="?p=resultados">Resultados</a></li>

			  	<li class="<?=($_GET['p'] == 'loja' ? 'active' : '')?>"><a href="?p=loja">Loja</a></li>
				  
			  	<!--<li style="float: right;"><a href="?s=0">Registar</a></li>-->
				  
			  	<li style="float: right;"><a href="?p=<?=$p?>&s=0">Iniciar Sessão</a></li>
			</ul>
		</div>
	</div>
</nav>
