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


	<?php
		//verifica existencia do id
		if (isset($_GET['matricula'])) {
			$id_update = addslashes($_GET['matricula']);
			$result = $doc->buscarDados($id_update);
		}

	?>

	<!--CONTEUDO-->
	<div class="container">
		<div class="card bg-light mb-3 mt-5" style="">
		  <div class="card-header">Cadastrar Aluno</div>

      <!--POST é usado para enviar-->
      <form action="inserir_alunos.php" method="post" class="mt-4 p-4">

        <!--Campo 1-->
        <div class="form-group">
          <label for="matricula">Matrícula</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['matricula'];}?>" name="matricula" id="matricula" placeholder="Número da matrícula" required="">
        </div>
        <!--Campo 2-->
        <div class="form-group">
          <label for="unidade_curricular">Unidade Curricular</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['unidade_curricular'];}?>" name="unidade_curricular" id="unidade_curricular" placeholder="Ex: Programação Web" required="">
        </div>
        <!--Campo 3-->
        <div class="form-group">
          <label for="primeira_avaliacao">Primeira Avaliação</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['primeira_avaliacao'];}?>" name="primeira_avaliacao" id="primeira_avaliacao" placeholder="Ex:..6.0" required="">
        </div>
        <!--Campo 4-->
        <div class="form-group">
          <label for="segunda_avaliacao">Segunda Avaliação</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['segunda_avaliacao'];}?>" name="segunda_avaliacao" id="segunda_avaliacao" placeholder="Ex:..6.0" required="">
        </div>


        <div class="form-group">
          <label for="media">Média</label>
          <input type="text" class="form-control" name="media" id="media" readonly="readonly">
        </div>

        <!--Botão-->
        <div>
          <button type="submit" class="btn btn-success btn-sm" id="botao">Cadastrar e Calcular Média</button>
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