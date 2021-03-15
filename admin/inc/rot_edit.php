<?php
if (!isset($_SESSION)) {session_start();}
include 'verifica_session.php';

require 'class.php';



if(isset($_POST['id_palestra'],$_POST['titulo_palestra'],$_POST['nome_palestra'],$_POST['duracao_palestra'],$_POST['data_liberacao'])){
    
    $id_palestra        = $_POST['id_palestra'];
    $titulo_palestra    = $_POST['titulo_palestra'];
    $nome_palestra      = $_POST['nome_palestra'];
    $duracao_palestra   = $_POST['duracao_palestra'];
    $data_liberacao     = $_POST['data_liberacao'];


    $editar = Palestra::Update($id_palestra, $titulo_palestra, $nome_palestra, $duracao_palestra, $data_liberacao);
    if ($editar) {
        $_SESSION['msg_edit'] = "Palestra ".$titulo_palestra." editada com sucesso";
        //echo "Cadastrado com sucesso" .$titulo_palestra;
        //header('Location: ./dash.php');
        header('Location: ../dash');
        unset($editar);
    }else{
        //echo "Erro ao cadastrar";
        $_SESSION['msg_edit'] = "Não foi possivel editar a palestra ".$titulo_palestra;
        // echo $_SESSION['msg'];
        // echo $nome;
        // echo $cartao;
        // echo $video;
        //header('Location: ./dash');
        header('Location: ../dash');
        unset($editar);
    }
    }else{
    $_SESSION['msg_edit'] = "Não foi possivel editar a palestra ".$titulo_palestra;
    header('Location: ../dash');
    unset($editar);
}


// deletar as variaveis
unset($_POST['id_palestra']);
unset($_POST['titulo_palestra']);
unset($_POST['nome_palestra']);
unset($_POST['duracao_palestra']);
unset($_POST['data_liberacao']);
unset($id_palestra);
unset($titulo_palestra);
unset($nome_palestra);
unset($duracao_palestra);
unset($data_liberacao);


?>

