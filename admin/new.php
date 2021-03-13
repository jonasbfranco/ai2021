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


  <nav>
    <div class="row">
    <div class="col s12">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo navbar-user">Usuário, bem vindo.</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                
                <li>
                    <form action="admin/logout" method="post" class="">
                        <!-- <button class="btn btn-danger" type="submit">Sair</button> -->
                        <a class="waves-effect waves-light btn" type="submit"><i class="material-icons right">exit_to_app</i>sair</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    </div>
  </nav>
        

    <div class="row">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4">Nova Palestra</h3>

            <form action="" >
            <div class="row">
                <div class="input-field col s6">
                    <input name= "titulo_palestra" type="text" class="validate">
                    <label>Titulo da Palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="nome_palestra" type="text" class="validate">
                    <label>Nome Completo da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="duracao_palestra" type="number" class="validate">
                    <label>Duração da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="data_liberacao" type="date" class="validate">
                    <label>Data da liberação da palestra</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Video</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <a href="./"class="waves-effect waves-light btn red"><i class="material-icons left">cancel</i>Cancelar</a>
            <a type="submit"class="waves-effect waves-light btn blue"><i class="material-icons left">send</i>Cadastrar</a>
            </form>
    
        




    
        </div>
    </div> <!-- Fim DIV Row -->


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>

