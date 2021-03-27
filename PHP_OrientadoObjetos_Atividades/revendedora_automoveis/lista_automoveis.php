<?php
  ob_start();
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
        <h3 class="mb-4">LISTA DE AUTOMÓVEIS</h3>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Placa</th>
            <th scope="col">Cor</th>
            <th scope="col">Modelo</th>
            <th scope="col">Portas</th>
            <th scope="col">Ano</th>
            <th scope="col">Preço de Venda</th>
            <th scope="col">Ação</th>

          
            </tr>
        </thead>

        <?php
            //variavel para receber info do $result
            $dados = $doc->buscarDados();
            //verifica se esta vazio
            if(count($dados) > 0){//tem aluno cadastrado no banco
                for ($i=0; $i < count($dados); $i++) { 
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v) {

                            echo "<td>".$v."</td>";
                    }
        ?>
                
                <!--Botões de ação-->
                <td>
                    <a class="btn btn-danger btn-sm" style="color: #ffffff;" href="lista_automoveis.php?id_automovel=<?php echo $dados[$i]['id_automovel'];?>" role="button">Excluir</a>
                </td>

            <?php
                echo "</tr>";
                }
            }
            ?>

        </table>

    </div>

    <!--PHP PARA EXCLUIR ALUNO-->
    <?php

        if (isset($_GET['id_automovel'])) {//se a variavel existir
            $id_auto = addslashes($_GET['id_automovel']);
            $doc->excluirAutomovel($id_auto);
            //depois que excluir preciso atualizar a página
            header("location: lista_automoveis.php");
        }

    ?>


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