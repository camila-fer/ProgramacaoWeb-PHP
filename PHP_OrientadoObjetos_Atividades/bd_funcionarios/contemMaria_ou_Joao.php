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

    <div class="container mt-5">
        <h3 class="mb-4">Lista de Funcionários</h3>
        <table class="table table-striped table-hover" id="id_da_tabela">
        <thead>
            <tr>
            <th scope="col">Matrícula</th>
            <th scope="col">Nome</th>
            <th scope="col">Salário Base</th>
            <th scope="col">Tempo de Serviço (Anos)</th>
            <th scope="col">Ação</th>
          
            </tr>
        </thead>

        <?php
            //variavel para receber info do $result
            $dados = $doc->totalContemPalavra_Maria_Joao();
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
                    <a class="btn btn-danger btn-sm" style="color: #ffffff;" href="listar.php?matricula=<?php echo $dados[$i]['matricula'];?>" role="button">Excluir</a>
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

        if (isset($_GET['matricula'])) {//se a variavel existir
            $id_func = addslashes($_GET['matricula']);
            $doc->excluirProjeto($id_func);
            //depois que excluir preciso atualizar a página
            header("location: listar.php");
        }

    ?>

    <div class="container mt-5">
        <a class="nav-link btn btn-primary btn-sm" href="listar.php" data-tooltip="tooltip" title="Página Inicial">Voltar para lista</a>
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

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#id_da_tabela').DataTable();
        } );
    </script>

</body>
</html>