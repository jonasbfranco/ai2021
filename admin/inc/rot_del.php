<?php
if (!isset($_SESSION)) {session_start();}
include 'verifica_session.php';

require 'class.php';



if(isset($_GET['id'])){
    
    $id_palestra = $_GET['id'];
    $del_palestra = $_GET['del'];


    // remover arquivo antigo
    // unlink('/var/www/html/ai2021/palestras/'.$del_palestra); // maquina desenvolvedor
    unlink('/var/www/html/palestras/'.$del_palestra); // servidor



    $deletar = Palestra::Delete($id_palestra);
    if ($deletar) {
        $_SESSION['msg_del'] = "Palestra excluida com sucesso";
        //echo "Cadastrado com sucesso" .$titulo_palestra;
        //header('Location: ./dash.php');
        header('Location: ../dash');
        unset($deletar);
    }else{
        //echo "Erro ao cadastrar";
        $_SESSION['msg_del'] = "Não foi possivel excluir a palestra";
        // echo $_SESSION['msg'];
        // echo $nome;
        // echo $cartao;
        // echo $video;
        //header('Location: ./dash');
        header('Location: ../dash');
        unset($deletar);
    }
    }else{
    $_SESSION['msg_del'] = "Não foi possivel excluir a palestra";
    header('Location: ../dash');
    unset($deletar);
}


// deletar as variaveis
unset($_GET['id']);
unset($id_palestra);
unset($_SESSION['arquivo_antigo']);
unset($del_palestra);

?>


