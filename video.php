<?php
if (!isset($_SESSION)) {session_start();}
include './inc/verifica_session.php';

require './inc/class.php';

$id = $url[1];
$rows = Palestra::Video($id);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição das Palestras</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>  
              
</head>
<body>
        
   
    <div class="div-customizada">
        <div class="row">
            <div class="col s12">

                <br />   

                <div class="video-container">
                    <iframe 
                        src="../palestras/<?= $rows->nome_palestra ?>" 
                        title="<?= $rows->titulo_palestra ?>" 
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>

                <br />
                
                <div class="row center">
                    <a href="../show" class="waves-effect waves-light btn-small btn orange"><i class="material-icons left">arrow_back</i>voltar</a> 
                </div>
                
                 
            </div> <!-- Fim DIV Col S12 -->
        </div> <!-- Fim DIV Row -->
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>



  

</body>
</html>

