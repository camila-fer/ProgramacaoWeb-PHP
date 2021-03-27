<?php

  include 'classe/Aluno.php';
  $doc = new Aluno();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Pego da pasta config.php-->
	<title>Sistema Escolar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

	<header class="bg-dark">
	    <div class="container">
	        <nav class="navbar navbar-expand-sm navbar-dark">
	            <a class="navbar-brand" href="index.php">Sistema Escolar</a>
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
	                    <a class="btn btn-success" href="listar.php" data-tooltip="tooltip">Listar</a>
	                </span>
	            </div>
	        </nav>
	    </div>
	</header>


	<div class="container mt-5">
		<div class="row">

			<div class="card" style="width: 18rem; margin-right: 15px;">
			  <div class="card-body">
			    <h5 class="card-title">Novo Cadastro</h5>
			    <p class="card-text">Realize o cadastro.</p>
			    <a href="cadastro.php" class="btn btn-success">Cadastre aqui</a>
			  </div>
			</div>

			<div class="card" style="width: 18rem; margin-right: 15px;">
			  <div class="card-body">
			    <h5 class="card-title">Listar Alunos</h5>
			    <p class="card-text">Visualize os alunos já cadastrados.</p>
			    <a href="listar.php" class="btn btn-success">Listar</a>
			  </div>
			</div>

			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="card-title">Alunos com média acima de 6,0</h5>
			    <p class="card-text">Número de alunos com média superior a 6,0.</p>
			    <a href="lista_media_superior6.php" class="btn btn-success">Mostrar</a>
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