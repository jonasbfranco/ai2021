<?php

if (!isset($_SESSION)) {session_start();}
include 'verifica_session.php';

require 'class.php';


if((!empty($_POST['login'])) and (!empty($_POST['senha']))){
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];


    if (Usuario::Logar($login, $senha) > 0) {
       
            header('Location: ../dash');

    }else{
    //$_SESSION['msgnok'] = "Não foi possivel cadastrar";
    // echo $_SESSION['msg'];
    // echo $nome;
    // echo $cartao;
    // echo $video;
    //echo "Deu merda";
    //header('Location: index.php');
    header('Location: ../');
    }
} else {
    //$_SESSION['msgnok'] = "Houve algum problema, tente novamente!!!";
    header('Location: ../');
}


// Destruir as variaveis
unset($login);
unset($senha);

?>