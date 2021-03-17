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
        
    <div class="div-customizada">
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
                        <td><?= date('d/m/Y', strtotime($showpalestra->data_liberacao)); ?></td>                
                        <td><a class="waves-effect waves-light btn orange" 
                                href="edit/<?= $showpalestra->id ?>">
                                <i class="material-icons left">edit</i>Editar
                            </a>
                        </td>
                        <td>
                            <a class="waves-effect waves-light btn red modal-trigger" 
                                href="#modal<?= $showpalestra->id ?>">
                                <i class="material-icons left">delete</i>Excluir
                            </a>
                        </tr>

                        <!-- Modal Structure -->
                        <div id="modal<?= $showpalestra->id ?>" class="modal">
                            <div class="modal-content">
                            <h5>Tem certeza que deseja excluir ?</h5>
                            <p>Palesta - <strong><?= $showpalestra->titulo_palestra ?></strong></p>
                            </div>
                            <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-red btn-flat">NÃO</a>
                            <a href="inc/rot_del.php?id=<?= $showpalestra->id ?>&del=<?= $showpalestra->nome_palestra ?>" class="modal-close waves-effect waves-green btn-flat">SIM</a>
                            </div>
                        </div>


                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                
            </div> <!-- Fim DIV Col S12 -->

        </div> <!-- Fim DIV Row -->

    </div>


    <!-- Footer  -->
    <?php include("req/footer.php"); ?> 
        
     
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    
    <?php 


//===================================================
// Inicio da tratativa dos alertas (mensagens, toats)
//===================================================

    // mensagem de alerta sobre casdastro de palestra
    if(isset($_SESSION['msg_cad'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_cad'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_cad']); 
    } 

    // mensagem de alerta sobre edicao de palestra
    if(isset($_SESSION['msg_edit'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_edit'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_edit']); 
    }

    // mensagem de alerta sobre exclusao de palestra
    if(isset($_SESSION['msg_del'])){ ?>

        <script>
            //Toasts ( Mensagens para o Usuário ) -->
            var toastHTML = '<span><?= $_SESSION['msg_del'] ?></span>';
            M.toast({html: toastHTML});
        </script>
        <?php unset($_SESSION['msg_del']); 
    } ?>

    
    <script>
        // Get toast DOM Element, get instance, then call dismiss function
        var toastElement = document.querySelector('.toast');
        var toastInstance = M.Toast.getInstance(toastElement);
        //toastInstance.dismiss();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
        });

        // Or with jQuery
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
<?php
//===================================================
// Fim da tratativa dos alertas (mensagens, toats)
//===================================================
?>

</body>
</html>

