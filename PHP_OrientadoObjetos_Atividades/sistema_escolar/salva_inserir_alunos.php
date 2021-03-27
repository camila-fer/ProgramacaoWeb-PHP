<?php
  
  include 'classe/Aluno.php';
  $doc = new Aluno();

   //verifica se clicou no botao
  if(isset($_POST['matricula']))
  { //isset verifaca a existencia de uma var
    //addslashes previne contra hackers
    $id_up = addslashes($_POST['id_up']); 
    $matricula = addslashes($_POST['matricula']); 
    $unidade_curricular = addslashes($_POST['unidade_curricular']);
    $primeira_avaliacao = addslashes($_POST['primeira_avaliacao']);
    $segunda_avaliacao = addslashes($_POST['segunda_avaliacao']);
    $media = addslashes($_POST['media']);


    $media = ($primeira_avaliacao + $segunda_avaliacao)/2;



    //verifica se todos os campos foram preenchidos
    if(!empty($matricula) && !empty($unidade_curricular) && !empty($primeira_avaliacao) && !empty($segunda_avaliacao) && !empty($media))
    { //!empty = se não esta vazio

        $doc->atualizarDados($id_up, $matricula, $unidade_curricular, $primeira_avaliacao, $segunda_avaliacao, $media);
    }

  }