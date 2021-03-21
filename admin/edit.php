<?php
if (!isset($_SESSION)) {session_start();}
include 'inc/verifica_session.php';

require 'inc/class.php';

//$id = $_GET['id'];
$id = $url[1];
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
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>            
</head>
<body>


  <?php include("req/nav.php"); ?> 
        

    <div class="row container">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4">Editar Palestra</h3>

            <form action="../inc/rot_edit.php" method="post" enctype="multipart/form-data">

            <?php foreach ($rows as $row) { ?>
            
            <input name="id_palestra" type="hidden" value="<?= $row->id ?>">

            <div class="row">
                <div class="input-field col s12">
                    <input name= "titulo_palestra" type="text" value="<?= $row->titulo_palestra ?>" class="validate">
                    <label>Titulo da Palestra</label>
                </div>
            </div>
            <!-- <div class="row">
                <div class="input-field col s12">
                    <input name="duracao_palestra" type="number" value="<?= $row->duracao_palestra ?>" class="validate">
                    <label>Duração da palestra</label>
                </div>
            </div> -->
            <div class="row">
                <div class="input-field col s12">
                    <input name="data_liberacao" type="date" value="<?= $row->data_liberacao ?>" class="validate">
                    <label>Data da liberação da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn"><span>Video</span><input type="file" name="arquivo"></div>
                    <div class="file-path-wrapper"><input class="file-path validate" type="text" value="<?= $row->nome_palestra ?>"></div>
                    <div class="video-container">
                        <iframe width="253" height="180" src="../../palestras/<?= $row->nome_palestra ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            
            
            <!-- Guardar arquivo Anrigo, que esta sendo substituido -->
            <?php $_SESSION['arquivo'] = $row->nome_palestra ?>


            <!-- Excluir arquivo Antigo, que esta sendo substituido -->
            <?php $_SESSION['arquivo_antigo'] = $row->nome_palestra ?>

            <?php
            /* echo $_SESSION['arquivo'];
            echo $_SESSION['arquivo_antigo'];  */
            ?>

            <button class="btn blue waves-effect waves-light" type="submit" name="action">Salvar Edição
                <i class="material-icons left">save</i>
            </button>
            <a href="../dash" class="waves-effect waves-light btn red"><i class="material-icons left">cancel</i>Cancelar</a>
          
            <?php } ?>

            </form>
    
        </div>
    </div> <!-- Fim DIV Row -->

    <!-- Footer  -->
    <?php include("req/footer.php"); ?> 
        


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>


<?php
unset($id);
unset($rows);
unset($row);
unset($url);
?>


</body>
</html>