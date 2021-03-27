<?php
  
  include 'classe/Funcionario.php';
  $doc = new Funcionario();

   //verifica se clicou no botao
  if(isset($_POST['matricula']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $matricula = addslashes($_POST['matricula']);
    $nome = addslashes($_POST['nome']);
    $salario = addslashes($_POST['salario']);
    $tempo_servico = addslashes($_POST['tempo_servico']);

    //verifica se todos os campos foram preenchidos
    if(!empty($matricula) && !empty($nome) && !empty($salario) && !empty($tempo_servico))
    { //!empty = se não esta vazio
    	if($doc->cadastrar($matricula, $nome, $salario, $tempo_servico))
    	{     
            ?>
            <div id="msg-sucesso" style="width: 36%; margin: 20px auto; padding: 10px; background-color: rgba(50,205,50,.3); font-size: 12pt; border: 1px solid rgb(34,139,34);">
                Cadastrado com sucesso!
              <a class="btn btn-success btn-sm" href="listar.php" role="button">Voltar para lista</a>
            </div>
            <?php
    	}
    }

  }