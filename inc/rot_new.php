<?php
if (!isset($_SESSION)) {session_start();}

require 'class.php';



if(isset($_POST['nome_funcionario'],$_POST['cartao_funcionario'], $_POST['unidade_funcionario'])){

    $nome_funcionario       = $_POST['nome_funcionario'];
    $cartao_funcionario     = $_POST['cartao_funcionario'];
    $unidade_funcionario    = $_POST['unidade_funcionario'];
    /* echo $unidade_funcionario;
    exit; */

    $inserir = Funcionario::Cadastro($nome_funcionario, $cartao_funcionario, $unidade_funcionario);
    if ($inserir) {
        $_SESSION['msg_cad'] = "Cartão ".$cartao_funcionario." cadastrado com sucesso";
        //echo "Cadastrado com sucesso" .$titulo_palestra;
        //header('Location: ./dash.php');
        header('Location: ../');
        unset($inserir);
    }else{
        //echo "Erro ao cadastrar";
        $_SESSION['msg_cad'] = "Não foi possivel cadastrar a cartão " .$cartao_funcionario;
        // echo $_SESSION['msg'];
        // echo $nome;
        // echo $cartao;
        // echo $video;
        //header('Location: ./dash');
        header('Location: ../new');
        unset($inserir);
    }
    }else{
    $_SESSION['msg_cad'] = "Não foi possivel cadastrar o cartão " .$cartao_funcionario;
    header('Location: ../new');
    unset($inserir);
}

// deletar as variaveis
unset($_POST['nome_funcionario']);
unset($_POST['cartao_funcionario']);
unset($_POST['unidade_funcionario']);
unset($nome_funcionario);
unset($cartao_funcionario);
unset($unidade_funcionario);

?>


