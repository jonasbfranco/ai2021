<?php
if (!isset($_SESSION)) {session_start();}
include 'verifica_session.php';

require 'class.php';



if(isset($_POST['titulo_palestra'],$_POST['nome_palestra'],$_POST['duracao_palestra'],$_POST['data_liberacao'])){
    
    
    $titulo_palestra    = $_POST['titulo_palestra'];
    $nome_palestra      = $_POST['nome_palestra'];
    $duracao_palestra   = $_POST['duracao_palestra'];
    $data_liberacao     = $_POST['data_liberacao'];


    $inserir = Palestra::Cadastro($titulo_palestra, $nome_palestra, $duracao_palestra, $data_liberacao);
    if ($inserir) {
        $_SESSION['msg_cad'] = "Palestra ".$titulo_palestra." cadastrada com sucesso";
        //echo "Cadastrado com sucesso" .$titulo_palestra;
        //header('Location: ./dash.php');
        header('Location: ../dash');
    }else{
        //echo "Erro ao cadastrar";
        $_SESSION['msg_cad'] = "Não foi possivel cadastrar a palestra" .$titulo_palestra;
        // echo $_SESSION['msg'];
        // echo $nome;
        // echo $cartao;
        // echo $video;
        //header('Location: ./dash');
        header('Location: ../dash');
    }
    }else{
    $_SESSION['msg_cad'] = "Não foi possivel cadastrar a palestra" .$titulo_palestra;
    header('Location: ../dash');
}




?>


