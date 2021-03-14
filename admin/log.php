<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>  

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
              
</head>
<body>
        

    <div class="row container">
        <div class="col s12">
            <h2 class="header indigo-text text-darken-4" style="margin-top:200px;">Login</h2>

            <form action="inc/rot_log.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input name="login" type="text" class="">
                    <label>Digite seu usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="senha" type="password" class="">
                    <label>Digite sua senha</label>
                </div>
            </div>
            <button class="btn btn-large purple waves-effect waves-light" type="submit" name="action">Entrar no Sistema
                <i class="material-icons left">lock_open</i>
            </button>

            </form>
    
        




    
        </div>

        

    </div> <!-- Fim DIV Row -->
    <?php include("req/footer.php"); 
    
    unset($_SESSION['registro']);
    unset($_SESSION['limite']);
    unset($_SESSION['sessao_usuario']);
    session_destroy();

    ?> 


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>

