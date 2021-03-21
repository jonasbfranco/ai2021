<?php
if (!isset($_SESSION)) {session_start();}

include 'verifica_session.php';

require 'class.php';


if((!empty($_POST['cartao']))){
    
    $cartao = $_POST['cartao'];
   
    if (Funcionario::Logar($cartao) > 0) {
       
            header('Location: ../show');

    }else{
    //$_SESSION['msgnok'] = "Não foi possivel cadastrar";
    // echo $_SESSION['msg'];
    // echo $nome;
    // echo $cartao;
    // echo $video;
    // echo "Deu merda";
    // exit;
    //header('Location: index.php');
    $_SESSION['msg_log'] = "Não foi possivel efetuar o login com o cartão ".$cartao;
    $_SESSION['cartao'] = $cartao;
    header('Location: ../');
    }
} else {
    //$_SESSION['msgnok'] = "Houve algum problema, tente novamente!!!";
    $_SESSION['msg_log'] = "Não foi possivel efetuar o login com o cartão ".$cartao;
    $_SESSION['cartao'] = $cartao;
    header('Location: ../');
}


// Destruir as variaveis
unset($_POST['cartao']);
unset($cartao);

?>