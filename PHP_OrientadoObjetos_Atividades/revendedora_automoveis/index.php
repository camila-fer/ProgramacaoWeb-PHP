<?php

  include 'classe/Revendedora.php';
  $doc = new Revendedora();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Pego da pasta config.php-->
	<title>Revendedora de Automóveis</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

	<header class="bg-info">
	    <div class="container">
	        <nav class="navbar navbar-expand-sm bg-info navbar-dark">
	            <a class="navbar-brand" href="index.php">Revendedora de Automóveis</a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>

	            <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                <ul class="navbar-nav mr-auto">
	                    <li class="nav-item">
	                        <a class="nav-link" href="index.php" data-tooltip="tooltip" title="Página Inicial">Home</a>
	                    </li>
	                </ul>
	                <span class="navbar-text">
	                    <a class="btn btn-dark" href="cadastro.php" data-tooltip="tooltip">Cadastrar Automóveis</a>
	                </span>
	            </div>
	        </nav>
	    </div>
	</header>


	<div class="container mt-5">
		<div class="row">

			<div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin-right: 15px;">
			  <div class="card-header">LISTA DE FABRICANTES</div>
			  <div class="card-body">
			    <p class="card-text">Visualize os fabricantes cadastrados.</p>
			    <a href="lista_fabricantes.php" class="btn btn-light">Listar</a>
			  </div>
			</div>

			<div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin-right: 15px;">
			  <div class="card-header">CADASTRAR FABRICANTES</div>
			  <div class="card-body">
			    <p class="card-text">Realize novos cadastros de fabricantes.</p>
			    <a href="cadastrar_fabricantes.php" class="btn btn-light">Cadastrar</a>
			  </div>
			</div>

			<div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin-right: 15px;">
			  <div class="card-header">LISTA DE AUTOMÓVEIS</div>
			  <div class="card-body">
			    <p class="card-text">Visualize os automoveis cadastrados.</p>
			    <a href="lista_automoveis.php" class="btn btn-light">Listar</a>
			  </div>
			</div>

			
		</div>
	</div>	


	<!--RODAPE-->
	<footer class="bg-info p-5 text-light mt-5">
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