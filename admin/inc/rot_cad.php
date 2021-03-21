<?php
if (!isset($_SESSION)) {session_start();}
include 'verifica_session.php';

require 'class.php';



if(isset($_POST['titulo_palestra'],$_POST['data_liberacao'])){
    
    // Tratativa do upload do arquivo(video ou imagem)
    $nome_arquivo       = $_FILES['arquivo']['name'];
    $caminho_atual      = $_FILES['arquivo']['tmp_name'];
    // $caminho_salvar     = '/var/www/html/ai2021/palestras/'.$nome_arquivo; // maquina desenvolvimento
    $caminho_salvar     = '/var/www/html/palestras/'.$nome_arquivo; // servidor

    $titulo_palestra    = $_POST['titulo_palestra'];
    // $duracao_palestra   = $_POST['duracao_palestra'];
    $data_liberacao     = $_POST['data_liberacao'];
    
    // Mover arquivo para a pasta
    move_uploaded_file($caminho_atual, $caminho_salvar);

    /* var_dump($caminho_salvar);
    var_dump($caminho_atual);
    exit; */

    $inserir = Palestra::Cadastro($titulo_palestra, $nome_arquivo, $data_liberacao);
    if ($inserir) {
        $_SESSION['msg_cad'] = "Palestra ".$titulo_palestra." cadastrada com sucesso";
        //echo "Cadastrado com sucesso" .$titulo_palestra;
        //header('Location: ./dash.php');
        header('Location: ../dash');
        unset($inserir);
    }else{
        //echo "Erro ao cadastrar";
        $_SESSION['msg_cad'] = "Não foi possivel cadastrar a palestra " .$titulo_palestra;
        // echo $_SESSION['msg'];
        // echo $nome;
        // echo $cartao;
        // echo $video;
        //header('Location: ./dash');
        header('Location: ../dash');
        unset($inserir);
    }
    }else{
    $_SESSION['msg_cad'] = "Não foi possivel cadastrar a palestra " .$titulo_palestra;
    header('Location: ../dash');
    unset($inserir);
}

// deletar as variaveis
unset($_POST['titulo_palestra']);
unset($_POST['nome_palestra']);
unset($_POST['duracao_palestra']);
unset($_POST['data_liberacao']);
unset($titulo_palestra);
unset($nome_palestra);
unset($duracao_palestra);
unset($data_liberacao);


?>


