<?php

  include 'classe/Projeto.php';
  $doc = new Projeto();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Pego da pasta config.php-->
	<title>Projetos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

	<header class="bg-dark">
	    <div class="container">
	        <nav class="navbar navbar-expand-sm navbar-dark">
	            <a class="navbar-brand" href="index.php">Projetos</a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>

	            <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                <ul class="navbar-nav mr-auto">
	                    <li class="nav-item">
	                        <a class="nav-link" href="index.php" data-tooltip="tooltip" title="Página Inicial">Home</a>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	    </div>
	</header>


	<div class="container mt-5">
		<div class="row">

			<div class="card" style="width: 18rem; margin-right: 15px;">
			  <div class="card-body">
			    <h5 class="card-title">Novo Projeto</h5>
			    <p class="card-text">Realize o cadastro de seus novos projetos.</p>
			    <a href="cadastrar.php" class="btn btn-primary">Cadastre aqui</a>
			  </div>
			</div>

			<div class="card" style="width: 18rem; margin-right: 15px;">
			  <div class="card-body">
			    <h5 class="card-title">Lista Projeto</h5>
			    <p class="card-text">Visualize os projetos já cadastrados.</p>
			    <a href="listar.php" class="btn btn-primary">Listar</a>
			  </div>
			</div>

			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">Projeto conforme data de início</h5>
			    <p class="card-text">Mostra projetos com data início posterior a 2015.</p>
			    <a href="lista_projetos_posterior.php" class="btn btn-primary">Mostrar</a>
			  </div>
			</div>

			<div class="card mt-5" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">Média</h5>
			    <p class="card-text">Mostra a média de horas de execução de todos os projetos e quantidade de projetos com número de horas abaixo da média.</p>
			    <a href="listar.php" class="btn btn-primary">Média</a>
			  </div>
			</div>
			
		</div>
	</div>	




	<!--RODAPE-->
	<footer class="bg-dark p-5 text-light mt-5">
		<div class="container">
			<small>
				PHP Orientado a Objetos.
				<div class="border-top mt-3">
					&COPY; 2020 - <?= date('Y') ?>
				</div>
			</small>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

</body>
</html>