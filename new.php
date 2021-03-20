<?php
if (!isset($_SESSION)) {session_start();}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>            
</head>
<body>
        

    <div class="row container">
        <div class="col s12">
            <h3 class="header indigo-text text-darken-4">Cadastro</h3>

            <form action="inc/rot_new.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input name= "nome_funcionario" type="text" class="validate">
                    <label>Digite seu nome completo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="cartao_funcionario" type="number" class="validate">
                    <label>Digite o numero do seu cartão</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="unidade_funcionario">
                    <option value="" disabled selected>Escolha sua Unidade</option>
                    <option value="10">Unidade 10</option>
                    <option value="13">Unidade 13</option>
                    <option value="14">Unidade 14</option>
                    <option value="17">Unidade 17</option>
                    <option value="18">Unidade 18</option>
                    <option value="19">Unidade 19</option>
                    </select>
                    <label>Unidade</label>
                </div>
            </div>
         
            <button class="btn blue waves-effect waves-light upload" type="submit" name="action">Cadastrar
                <i class="material-icons left">save</i>
            </button>
            <a href="./"class="waves-effect waves-light btn red"><i class="material-icons left">cancel</i>Cancelar</a>
            </form>
    
        </div>
    </div> <!-- Fim DIV Row -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="./js/materialize.min.js"></script>

    <?php
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
        
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('select').formSelect();
        });

    </script>

</body>
</html>

