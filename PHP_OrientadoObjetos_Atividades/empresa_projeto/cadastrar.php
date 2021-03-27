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
                   <span class="navbar-text">
                        <a class="btn btn-primary" href="listar.php" data-tooltip="tooltip">Listar</a>
                    </span>
	            </div>
	        </nav>
	    </div>
	</header>


	<?php
		//verifica existencia do id
		if (isset($_GET['id'])) {
			$id_update = addslashes($_GET['id']);
			$result = $doc->buscarDados($id_update);
		}

	?>

	<!--CONTEUDO-->
	<div class="container">
		<div class="card bg-light mb-3 mt-5" style="">
		  <div class="card-header">Cadastrar Projeto</div>

      <!--POST é usado para enviar-->
      <form action="inserir_projetos.php" method="post" class="mt-4 p-4">

        <!--Campo 1-->
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['id'];}?>" name="id" id="id" placeholder="Código do projeto" required="">
        </div>
        <!--Campo 2-->
        <div class="form-group">
          <label for="orcamento">Orçamento(R$)</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['orcamento'];}?>" name="orcamento" id="orcamento" placeholder="Digite o orçamento" required="">
        </div>
        <!--Campo 3-->
        <div class="form-group">
          <label for="data_inicio">Data de Inicio</label>
          <input type="date" class="form-control" value="<?php if(isset($result)){echo $result['data_inicio'];}?>" name="data_inicio" id="data_inicio" required="">
        </div>
        <!--Campo 4-->
        <div class="form-group">
          <label for="horas">Número de horas para execução do projeto</label>
          <input type="number" class="form-control" value="<?php if(isset($result)){echo $result['horas'];}?>" name="horas" id="horas" required="">
        </div>

        <!--Botão-->
        <div>
          <button type="submit" class="btn btn-primary btn-sm" id="botao">Cadastrar</button>
        </div>
      </form>


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