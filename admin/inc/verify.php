<?php

if (!isset($_SESSION)) {session_start();}

require 'class.php';


if((!empty($_POST['login'])) and (!empty($_POST['senha']))){
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $_SESSION['login'] = $login;

    if (Usuario::Logar($login, $senha) > 0) {
       
            header('Location: ../dash');

    }else{
    //$_SESSION['msgnok'] = "Não foi possivel cadastrar";
    // echo $_SESSION['msg'];
    // echo $nome;
    // echo $cartao;
    // echo $video;
    echo "Deu merda";
    //header('Location: index.php');
    header("Refresh: 2; ../index");
    }
} else {
    $_SESSION['msgnok'] = "Houve algum problema, tente novamente!!!";
    header('Location: ../index');
}



?>