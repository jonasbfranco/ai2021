<?php
if (!isset($_SESSION)) {session_start();}

if (!$_SESSION['sessao_usuario']){
    header('Location: ./');
}

if($_SESSION['registro']){
    $segundos = time() - $_SESSION['registro'];
}

if ($segundos > $_SESSION['limite']) {  
    unset($_SESSION[ 'registro']);
    unset($_SESSION[ 'limite']);
    unset($_SESSION[ 'sessao_usuario']);
    session_destroy();
    header('Location: ./');
} else {
    $_SESSION[ 'registro'] = time();
}

?>