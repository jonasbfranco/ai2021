<?php


//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class BancoDados{

        public static $pdo;

        private function __construct() {
            //
        }

        // const host      = '172.0.0.111';
        // const dbname    = 'ai2021';
        // const user      = 'acoes';
        // const password  = 'C0l0mb0#';

        const host      = 'localhost';
        const dbname    = 'ai2021';
        const user      = 'root';
        const password  = '';
	
        public static function conectar(){
            try {
                if (!isset(self::$pdo)) {
                Self::$pdo = new PDO("mysql:host=".Self::host.";dbname=".Self::dbname.";charset=utf8",
                Self::user,
                Self::password);
                Self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                
                return Self::$pdo;

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
            $sessao = $conexao->prepare('SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario and senha_usuario = :senha_usuario LIMIT 1');
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
                    header('Location: ../');
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
      
        header('Location: ../.php');
    }



}




//===================================================
// Cadastrar Palestra
//===================================================
abstract class Palestra{
    static function Cadastro($titulo_palestra, $nome_palestra, $duracao_palestra, $data_liberacao){
        try {
            $conexao = BancoDados::conectar();
            $cad = $conexao->prepare('INSERT INTO palestras (titulo_palestra,nome_palestra,duracao_palestra,data_liberacao,data_cadastro)
                                      VALUES (:titulo_palestra,:nome_palestra,:duracao_palestra,:data_liberacao,NOW())');
            $cad->bindValue(':titulo_palestra',$titulo_palestra);
            $cad->bindValue(':nome_palestra',$nome_palestra);
            $cad->bindValue(':duracao_palestra',$duracao_palestra);
            $cad->bindValue(':data_liberacao',$data_liberacao);
            $cad->execute();

            return $cad;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }


    static function Show(){
        try {
            $conexao = BancoDados::conectar();
            $show = $conexao->prepare('SELECT * FROM palestras ORDER BY titulo_palestra ASC');
            $show->execute();
            $show = $show->fetchAll(PDO::FETCH_OBJ);

            return $show;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }

    static function Edit($id){
        try {
            $conexao = BancoDados::conectar();
            $edit = $conexao->prepare("SELECT * FROM palestras WHERE id = $id LIMIT 1");
            // SELECT * FROM funcionarios WHERE nome LIKE '%Jonas%';
            // SELECT * FROM palestras WHERE id LIKE '%$id%' ORDER BY nome ASC
            //$edit->bindValue(':id',$id);
            $edit->execute();
            $edit = $edit->fetchall(PDO::FETCH_OBJ);
            //$lista = $lista->fetch(PDO::FETCH_ASSOC);
            return $edit;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }


}

// Testando a inserçao de dados
//$adicionar = Palestra::Cadastro('Teste Video','teste_video.mp4', 6000, '2021/03/14');




?>
