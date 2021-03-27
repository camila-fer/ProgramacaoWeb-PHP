<?php
  
  include 'classe/Revendedora.php';
  $doc = new Revendedora();

   //verifica se clicou no botao
  if(isset($_POST['fabricante']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $fabricante = addslashes($_POST['fabricante']);
    $num_carros = addslashes($_POST['num_carros']);
    $preco_unitario = addslashes($_POST['preco_unitario']);


    //verifica se todos os campos foram preenchidos
    if(!empty($fabricante) && !empty($num_carros) && !empty($preco_unitario))
    { //!empty = se não esta vazio

    	if($doc->cadastrarFabricante($fabricante, $num_carros, $preco_unitario))
    	{   
            ?>
            <div id="msg-sucesso" style="width: 36%; margin: 20px auto; padding: 10px; background-color: rgba(50,205,50,.3); font-size: 12pt; border: 1px solid rgb(34,139,34);">
                Cadastrado com sucesso!
              <a class="btn btn-success btn-sm" href="lista_fabricantes.php" role="button">Voltar para lista</a>
            </div>
            <?php
    	}
    }

  }