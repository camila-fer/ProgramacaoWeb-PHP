<?php
  
  include 'classe/Aluno.php';
  $doc = new Aluno();

   //verifica se clicou no botao
  if(isset($_POST['matricula']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $matricula = addslashes($_POST['matricula']);
    $unidade_curricular = addslashes($_POST['unidade_curricular']);
    $primeira_avaliacao = addslashes($_POST['primeira_avaliacao']);
    $segunda_avaliacao = addslashes($_POST['segunda_avaliacao']);
    $media = addslashes($_POST['media']);


    $media = ($primeira_avaliacao + $segunda_avaliacao)/2;



    //verifica se todos os campos foram preenchidos
    if(!empty($matricula) && !empty($unidade_curricular) && !empty($primeira_avaliacao) && !empty($segunda_avaliacao) && !empty($media))
    { //!empty = se não esta vazio

    	if($doc->cadastrar($matricula, $unidade_curricular, $primeira_avaliacao, $segunda_avaliacao, $media))
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