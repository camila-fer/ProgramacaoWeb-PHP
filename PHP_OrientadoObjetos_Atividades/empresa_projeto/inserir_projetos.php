<?php
  
  include 'classe/Projeto.php';
  $doc = new Projeto();

   //verifica se clicou no botao
  if(isset($_POST['id']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $id = addslashes($_POST['id']);
    $orcamento = addslashes($_POST['orcamento']);
    $data_inicio = addslashes($_POST['data_inicio']);
    $horas = addslashes($_POST['horas']);

    //verifica se todos os campos foram preenchidos
    if(!empty($id) && !empty($orcamento) && !empty($data_inicio) && !empty($horas))
    { //!empty = se não esta vazio
    	if($doc->cadastrar($id, $orcamento, $data_inicio, $horas))
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