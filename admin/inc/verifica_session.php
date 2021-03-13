<?php
if (!isset($_SESSION)) {session_start();}

if (!$_SESSION['sessao_usuario']){
    header('Location: ./log');
}

if($_SESSION['registro']){
    $segundos = time() - $_SESSION['registro'];
}

if ($segundos > $_SESSION['limite']) {  
    unset($_SESSION[ 'registro']);
    unset($_SESSION[ 'limite']);
    unset($_SESSION[ 'sessao_usuario']);
    session_destroy();
    header('Location: ./log');
} else {
    $_SESSION[ 'registro'] = time();
}

?>