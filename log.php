<?php
if (!isset($_SESSION)) {session_start();}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>  
              
</head>
<body>
        

   
    <div class="container">
        <div class="row">
            <div class="col s12">

                <div class="row">
                    <img class="circle" src="./imagens/user.png" width="200px" height="200px" max-width="200px">
                </div>

                <h2 class="header indigo-text text-darken-4">Login</h2>

                <form action="./inc/rot_log.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="cartao" type="number" class="">
                            <label>Digite o numero do seu cartão</label>
                        </div>
                    </div>
                    <button class="btn btn-large green waves-effect waves-light" 
                            type="submit" name="action">Acessar<i class="material-icons left">lock_open</i>
                    </button>
                </form>
            </div>
        </div>        
    </div> <!-- Fim DIV Row -->



    <!-- Botao cadastrar novo funcionario -->
    <!-- <a href="new" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a> -->
    
    <div class="fixed-action-btn">
        <a href="new" type="submit" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
     <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="./js/materialize.min.js"></script>


    <?php 

    //===================================================
    // Inicio da tratativa dos alertas (mensagens, toats)
    //===================================================

    // mensagem de alerta sobre casdastro de palestra
    if(isset($_SESSION['msg_log'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_log'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_log']); 
        header('Location: new');
    } 

    // mensagem de alerta sobre edicao de palestra
    if(isset($_SESSION['msg_cad'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_cad'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_cad']); 
    }

    ?>

    
    <script>
        // Get toast DOM Element, get instance, then call dismiss function
        var toastElement = document.querySelector('.toast');
        var toastInstance = M.Toast.getInstance(toastElement);
        //toastInstance.dismiss();
    </script>

    <script>
        $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
        });
    </script>

<?php
//===================================================
// Fim da tratativa dos alertas (mensagens, toats)
//===================================================
?>




<?php    
    unset($_SESSION['registro']);
    unset($_SESSION['limite']);
    unset($_SESSION['sessao_usuario']);
    session_destroy();
?> 


  

</body>
</html>

