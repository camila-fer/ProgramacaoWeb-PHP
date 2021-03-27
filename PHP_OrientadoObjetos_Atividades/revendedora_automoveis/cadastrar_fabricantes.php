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
	                    <a class="btn btn-dark active" href="lista_fabricantes.php" data-tooltip="tooltip">Lista de Fabricantes</a>
	                </span>
	            </div>
	        </nav>
	    </div>
	</header>



	<?php
		//verifica existencia do id
		if (isset($_GET['id_fabricante'])) {
			$id_update = addslashes($_GET['id_fabricante']);
			$result = $doc->buscarDadosFabricantes($id_update);
		}

	?>

	<!--CONTEUDO-->
	<div class="container">
		<div class="card bg-light mb-3 mt-5" style="width: 50%">
		  <div class="card-header bg-dark text-light">CADASTRAR FABRICANTE</div>

      <!--POST é usado para enviar-->
			<form action="inserir_fabricante.php" method="post" class="p-5">

			    <div class="form-group">
			      <label for="fabricante">Fabricante</label>
			      <input type="text" name="fabricante" value="<?php if(isset($result)){echo $result['fabricante'];}?>" class="form-control" id="fabricante" placeholder="Digite o nome do fabricante, ex:..FIAT">
			    </div>

			    <div class="form-group">
			      <label for="num_carros">Número de Carros</label>
			      <input type="number" name="num_carros" value="<?php if(isset($result)){echo $result['num_carros'];}?>" class="form-control" id="num_carros" placeholder="Digite a quantidade disponível">
			    </div>

			    <div class="form-group">
			      <label for="preco_unitario">Preço Unitário</label>
			      <input type="text" name="preco_unitario" value="<?php if(isset($result)){echo $result['preco_unitario'];}?>" class="form-control" id="preco_unitario" placeholder="Digite o valor unitário do carro">
			    </div>
			
			  
			  <button type="submit" class="btn btn-info">Cadastrar</button>
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