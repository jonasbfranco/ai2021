<?php
if (!isset($_SESSION)) {session_start();}
include 'inc/verifica_session.php';

require 'inc/class.php';

$id = $_GET['id'];
$rows = Palestra::Edit($id);

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
            <h3 class="header indigo-text text-darken-4">Editar Palestra</h3>

            <form action="inc/rot_edit.php" method="post">

            <?php foreach ($rows as $row) { ?>
            
            <input name="id_palestra" type="hidden" value="<?= $row->id ?>">

            <div class="row">
                <div class="input-field col s12">
                    <input name= "titulo_palestra" type="text" value="<?= $row->titulo_palestra ?>" class="validate">
                    <label>Titulo da Palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="nome_palestra" type="text" value="<?= $row->nome_palestra ?>" class="validate">
                    <label>Nome Completo da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="duracao_palestra" type="number" value="<?= $row->duracao_palestra ?>" class="validate">
                    <label>Duração da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="data_liberacao" type="date" value="<?= $row->data_liberacao ?>" class="validate">
                    <label>Data da liberação da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Video</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <button class="btn blue waves-effect waves-light" type="submit" name="action">Salvar Edição
                <i class="material-icons left">save</i>
            </button>
            <a href="dash"class="waves-effect waves-light btn red"><i class="material-icons left">cancel</i>Cancelar</a>
            </form>
            <?php } ?>
            </form>
    
        </div>
    </div> <!-- Fim DIV Row -->

    <!-- Footer  -->
    <?php include("req/footer.php"); ?> 
        


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>

