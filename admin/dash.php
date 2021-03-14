<?php
if (!isset($_SESSION)) {session_start();}
include 'inc/verifica_session.php';

require 'inc/class.php';
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
</head>
<body>


    <?php include("req/nav.php"); ?> 
        

    <div class="row">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4">Dashboard</h3>
            <!-- <a href="new.php" class="btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">add</i></a> -->
            <a href="new" class="waves-effect waves-light btn blue"><i class="material-icons left">add</i>Nova Palestra</a>
            <table class="highlight">
                <thead>
                    <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Nome do Video</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Data da Liberação</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $showpalestras = Palestra::Show();
                        foreach ($showpalestras as $showpalestra){
                    ?>
                    <tr>
                    <td><?= $showpalestra->titulo_palestra ?></td>
                    <td><?= $showpalestra->nome_palestra ?></td>
                    <td><?= $showpalestra->duracao_palestra ?></td>
                    <td><?= $showpalestra->data_liberacao ?></td>                
                    <td><a class="waves-effect waves-light btn orange" 
                            href="edit.php?id=<?= $showpalestra->id ?>">
                            <i class="material-icons left">edit</i>Editar</a>
                    </td>
                    <td>
                        <form action="/admin/delete/{{ $showpalestra->id }}" method="post">
                            <a class="waves-effect waves-light btn red" type="submit"><i class="material-icons left">delete</i>Excluir</a>
                        </form>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            
        </div> <!-- Fim DIV Col S12 -->

       
    </div> <!-- Fim DIV Row -->

    <!-- Footer  -->
    <?php include("req/footer.php"); ?> 
        
     
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    
    <?php 

    if(isset($_SESSION['msg_cad'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_cad'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_cad']); 
    } ?>

    
    <script>
        // Get toast DOM Element, get instance, then call dismiss function
        var toastElement = document.querySelector('.toast');
        var toastInstance = M.Toast.getInstance(toastElement);
        //toastInstance.dismiss();
    </script>


</body>
</html>

