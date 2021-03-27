<?php

  include 'classe/Funcionario.php';
  $doc = new Funcionario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Pego da pasta config.php-->
	<title>Funcionários</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>

	<header class="bg-dark">
	    <div class="container">
	        <nav class="navbar navbar-expand-sm navbar-dark">
	            <a class="navbar-brand" href="index.php">Funcionários</a>
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
		  <div class="card-header">Cadastrar Funcionário</div>

      <!--POST é usado para enviar-->
      <form action="inserir_funcionarios.php" method="post" class="mt-4 p-4">

        <!--Campo 1-->
        <div class="form-group">
          <label for="matricula">Matrícula</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['matricula'];}?>" name="matricula" id="matricula" placeholder="Código do funcionário" required="">
        </div>
        <!--Campo 2-->
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['nome'];}?>" name="nome" id="nome" placeholder="Digite o nome" required="">
        </div>
        <!--Campo 3-->
        <div class="form-group">
          <label for="salario">Salário Base</label>
          <input type="text" class="form-control" value="<?php if(isset($result)){echo $result['salario'];}?>" name="salario" id="salario" required="">
        </div>
        <!--Campo 4-->
        <div class="form-group">
          <label for="tempo_servico">Tempo de Serviço (Anos)</label>
          <input type="number" class="form-control" value="<?php if(isset($result)){echo $result['tempo_servico'];}?>" name="tempo_servico" id="tempo_servico" required="">
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