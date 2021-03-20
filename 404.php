<?php
if (!isset($_SESSION)) {session_start();}
include 'inc/verifica_session.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>            
</head>
<body>


    <div class="row">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4 center-align">404 | Página não existe.</h3> 
            <?php header("Refresh: 2; ./"); ?>   
        </div> <!-- Fim DIV Col S12 -->
    </div> <!-- Fim DIV Row -->


<?php
unset($_SESSION[ 'registro']);
unset($_SESSION[ 'limite']);
unset($_SESSION[ 'sessao_usuario']);
session_destroy();
?>

</body>
</html>

