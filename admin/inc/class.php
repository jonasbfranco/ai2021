<?php


//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class BancoDados{

        // const host      = '172.0.0.111';
        // const dbname    = 'ai2021';
        // const user      = 'acoes';
        // const password  = 'C0l0mb0#';

        const host      = 'localhost';
        const dbname    = 'ai2021';
        const user      = 'root';
        const password  = '';
	
        static function conectar(){
            try {
                $pdo = new PDO("mysql:host=".Self::host.";dbname=".Self::dbname.";charset=utf8",
                Self::user,
                Self::password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;

            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }
    }

/*
TESTE PARA VERIFICAR SE ESTA CONECTANDO NO BANCO DE DADOS 
$conexao = BancoDados::conectar();
if($conexao){
    echo "Conectado";
}
*/



//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class Usuario {
    static function Logar($login, $senha) {   
        try {
            $conexao = BancoDados::conectar();
            $sessao = $conexao->prepare('SELECT * FROM usuario WHERE nome_usuario = :nome_usuario and senha_usuario = :senha_usuario LIMIT 1');
            $sessao->bindValue(':nome_usuario',$login);
            $sessao->bindValue(':senha_usuario',$senha);
            if($sessao->execute()){

                if($sessao->rowCount() > 0){
                    $row = $sessao->fetch(PDO::FETCH_OBJ);

                    if($_POST['senha'] == $row->senha_usuario){
                    //sessao de tempo para expirar comeca aqui
                    $tempolimite = 600; //equivale a 10 minuto
                    $_SESSION['registro'] = time();
                    $_SESSION['limite'] = $tempolimite;
                    $_SESSION['sessao_usuario'] = $row->nome_usuario;
                   //$_SESSION['sessao_usuario'] = $login;
                    return $row;
                } else {
                    // mensagem
                    header('Location: ../index.php');
                }
            };
            //$sessao = $sessao->fetch(PDO::FETCH_OBJ);

        }   
            
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }

//=================================================================
// Funcao para efetuar o logout
//=================================================================

    static function Logout() {
      
        header('Location: ../indexxx.php');
    }



}




//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class Cadastro{
    static function Aluno($nome, $cartao){
        try {
            $conexao = BancoDados::conectar();
            $inserir = $conexao->prepare('INSERT INTO funcionarios (nome,cartao,data) VALUES (:nome,:cartao,now())');
            $inserir->bindValue(':nome',$nome);
            $inserir->bindValue(':cartao',$cartao);
            $inserir->execute();

            return $inserir;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }
}


?>