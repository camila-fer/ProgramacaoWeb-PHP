<?php
  
  include 'classe/Revendedora.php';
  $doc = new Revendedora();

   //verifica se clicou no botao
  if(isset($_POST['fabricante']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $id_automovel = addslashes($_POST['id_automovel']);
    $fabricante = addslashes($_POST['fabricante']);
    $placa = addslashes($_POST['placa']);
    $cor = addslashes($_POST['cor']);
    $modelo = addslashes($_POST['modelo']);
    $portas = addslashes($_POST['portas']);
    $ano = addslashes($_POST['ano']);
    $preco_venda = addslashes($_POST['preco_venda']);


    //verifica se todos os campos foram preenchidos
    if(!empty($fabricante) && !empty($placa) && !empty($cor) && !empty($modelo) && !empty($portas) && !empty($ano) && !empty($preco_venda))
    { //!empty = se não esta vazio

    	if($doc->cadastrarAutomoveis($id_automovel, $fabricante, $placa, $cor, $modelo, $portas, $ano, $preco_venda))
    	{   
            ?>
            <div id="msg-sucesso" style="width: 36%; margin: 20px auto; padding: 10px; background-color: rgba(50,205,50,.3); font-size: 12pt; border: 1px solid rgb(34,139,34);">
                Cadastrado com sucesso!
              <a class="btn btn-success btn-sm" href="lista_automoveis.php" role="button">Voltar para lista</a>
            </div>
            <?php
    	}
    }

  }