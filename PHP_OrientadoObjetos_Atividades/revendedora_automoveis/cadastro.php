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
	                    <a class="btn btn-dark active" href="lista_automoveis.php" data-tooltip="tooltip">Listar Automóveis</a>
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
		  <div class="card-header bg-dark text-light">CADASTRAR AUTOMÓVEIS</div>

      <!--POST é usado para enviar-->
			<form action="inserir_automovel.php" method="post" class="p-5">
			  <div class="form-row">
			    <div class="form-group col-md-3">
			      <label for="id_automovel">ID</label>
			      <input type="number" name="id_automovel" class="form-control" id="id_automovel" readonly="readonly">
			    </div>

			    <div class="form-group col-md-3">
			      <label for="fabricante">Fabricante</label>
			      <select id="fabricante" name="fabricante" class="form-control">
			      <option>Selecione...</option>

			    <!--MOSTRA VALORES DO FABRICANTE NO SELECT-->
				<?php
				    
					$resultado = $doc->buscarDadosFabricantes();

				  if(count($resultado)){
				     foreach ($resultado as $res) {
				  ?>                                             
				    <option  value="<?php echo $res['fabricante'];?>" ><?php echo $res['fabricante'];?></option> 
				  <?php      
				    }
				  }
				?>
			      </select>
			    </div>

				<div class="form-group col-md-3">
				   <label for="placa">Placa</label>
				   <input type="text" class="form-control" name="placa" id="placa" placeholder="">
				</div>

				  <div class="form-group col-md-3">
				    <label for="cor">Cor</label>
				    <input type="text" class="form-control" name="cor" id="cor" placeholder="">
				  </div>

			  </div>

			  <div class="form-row">
			    <div class="form-group col-md-3">
			      <label for="modelo">Modelo</label>
			      <input type="text" name="modelo" class="form-control" id="modelo">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="portas">Portas</label>
			      <input type="number" class="form-control" name="portas" id="portas">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="ano">Ano</label>
			      <input type="text" class="form-control" name="ano" id="ano">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="preco_venda">Preço de Venda</label>
			      <input type="text" class="form-control" name="preco_venda" id="preco_venda">
			    </div>
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