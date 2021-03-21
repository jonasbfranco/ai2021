<?php
if (!isset($_SESSION)) {session_start();}
include './inc/verifica_session.php';

require './inc/class.php';

$date = date('d/m/Y - H:i:s');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestras</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>  
              
</head>
<body>
        
    
<nav class="light-blue lighten-1">
    <ul id="slide-out" class="sidenav">
        <li>
            <li><div class="user-view">
            <div class="background">
                <img src="imagens/office.jpg">
            </div>
            <a href="#user"><img class="circle" src="./imagens/user.png"></a>
            <a href="#name"><span class="white-text name"><?= $_SESSION['sessao_usuario']  ?></span></a>
            <span class="white-text"><?= $date; ?></span>
            <br />
            </li>
            <!-- <li><div class="divider"></div></li> -->
            <br />
            <a href="./" class="waves-effect waves-light btn-small btn black"><i class="material-icons right">exit_to_app</i>Sair</a> 
            
        </li>              
    </ul>
    <ul class="right hide-on-med-and-down">
        <li><span class="white-text name"><i class="material-icons left">person</i><?= $_SESSION['sessao_usuario']  ?></span></li>
        <li><div class="divider"></div></li>
        <li><a href="./" class="waves-effect waves-light btn-small btn black" type="submit"><i class="material-icons right">exit_to_app</i>Sair</a></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          
</nav>

 
        
   
    <div class="div-customizada">
        <div class="row">
            <div class="col s12">
                <h4 class="header center orange-text">Clique, para assitir</h4>
                
                <br />
                
                
                    <ul>
                        <?php
                            $showpalestras = Palestra::Show();
                            foreach ($showpalestras as $showpalestra){
                        ?>
                            <li><h6><a class="blue-text" href="./video/<?= $showpalestra->id ?>"><i class="material-icons left">video_library</i><?= $showpalestra->titulo_palestra ?></a></h6></li>
                            <!-- <li><a href="./video/<?= $showpalestra->id ?>" class="waves-effect waves-light btn-large"><?= $showpalestra->titulo_palestra ?></a></li>  -->
                            <!-- <li><a href="./video/<?= $showpalestra->id ?>"><i class="material-icons left">video_library</i><?= $showpalestra->titulo_palestra ?></a></li> -->
                            <!-- <li><div class="divider"></div></li> -->
                            <li><div class="divider"></div></li>
                        <?php
                        }
                        ?>          
                    </ul>

            </div> <!-- Fim DIV Col S12 -->
        </div> <!-- Fim DIV Row -->
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="./js/materialize.min.js"></script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
    });

    // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
    // var collapsibleElem = document.querySelector('.collapsible');
    // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

    // Or with jQuery

    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

    
	$(".button-collapse").sideNav();


    </script>

<?php

unset($_SESSION['cartao']);

?>
  

</body>
</html>

