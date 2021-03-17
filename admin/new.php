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
        

    <div class="row container">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4">Cadastrar Palestra</h3>

            <form action="inc/rot_cad.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <input name= "titulo_palestra" type="text" class="validate">
                    <label>Titulo da Palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="duracao_palestra" type="number" class="validate">
                    <label>Duração da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="data_liberacao" type="date" class="validate">
                    <label>Data da liberação da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn"><span>Video</span><input type="file" name="arquivo"></div>
                    <div class="file-path-wrapper"><input class="file-path validate" type="text"></div>
                </div>
            </div>
            <div class="progress">
                <div class="determinate" style="width: 0%"></div>
            </div>
                    
            <button class="btn blue waves-effect waves-light upload" type="submit" name="action">Cadastrar Palestra
                <i class="material-icons left">save</i>
            </button>
            <a href="dash"class="waves-effect waves-light btn red"><i class="material-icons left">cancel</i>Cancelar</a>
            </form>
    
        




    
        </div>
    </div> <!-- Fim DIV Row -->

     <?php include("req/footer.php"); ?> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <!-- Progress Bar -->
    <script>
    
        // $(document).on('submit', 'form', function(e){
        //     e.preventDefault(); 
        //     // Receber os dados
        //     $form = $(this);
        //     var formdata = new FormData($form[0]);

        //     // Criar a conexao com o servidor
        //     var request = new XMLHttpRequest();

        //     // Progresso do Upload
        //     request.upload.addEventListener('progress', function(e){
        //         var percent = Math.round(e.loaded / e.total * 100);
        //         $form.find('.determinate').width(percent + '%').html(percent + '%');
        //     });

        //     // Upload completo limpar a barra de progresso
        //     request.addEventListener('load', function(e){
        //         $form.find('.determinate').addClass('determinate').html('upload completo ...');
        //         // Atualizar a página após o upload completo
        //         setTimeout("window.open(self.location, '_self');", 1000);
        //     });

            // Arquivo responsavel por fazer o upload da imagem
            //request.open('post', 'inc/rot_cad.php');
            //request.send(formdata);

        });

    </script>

</body>
</html>

