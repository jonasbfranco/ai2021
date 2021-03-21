<?php


//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class BancoDados{

        public static $pdo;

        private function __construct() {
            //
        }

        /* const host      = '';
        const dbname    = 'ai2021';
        const user      = 'root';
        const password  = ''; */

        const host      = 'localhost';
        const dbname    = 'ai2021';
        const user      = 'root';
        const password  = '123456';
	
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
// Login Usuário
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
                    $tempolimite = 600; //600 equivale a 10 minuto
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
      
        header('Location: ../');
    }



}




//===================================================
// Cadastrar Palestra
//===================================================
abstract class Palestra{
    static function Cadastro($titulo_palestra, $nome_arquivo, $data_liberacao){
        try {
            $conexao = BancoDados::conectar();
            $cad = $conexao->prepare('INSERT INTO palestras (titulo_palestra,nome_palestra,data_liberacao,data_cadastro)
                                      VALUES (:titulo_palestra,:nome_arquivo,:data_liberacao,NOW())');
            $cad->bindValue(':titulo_palestra',$titulo_palestra);
            $cad->bindValue(':nome_arquivo',$nome_arquivo);
            // $cad->bindValue(':duracao_palestra',$duracao_palestra);
            $cad->bindValue(':data_liberacao',$data_liberacao);
            $cad->execute();

            return $cad;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }


//===================================================
// Exibir as Palestras Cadastradas
//===================================================
    static function Show(){
        try {
            $conexao = BancoDados::conectar();
            $show = $conexao->prepare('SELECT * FROM palestras ORDER BY data_liberacao ASC');
            $show->execute();
            $show = $show->fetchAll(PDO::FETCH_OBJ);

            return $show;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }

//===================================================
// Exibir a Palestra a ser Editada
//===================================================
    static function Edit($id){
        try {
            $conexao = BancoDados::conectar();
            $edit = $conexao->prepare("SELECT * FROM palestras WHERE id = $id LIMIT 1");
            // SELECT * FROM funcionarios WHERE nome LIKE '%Jonas%';
            // SELECT * FROM palestras WHERE id LIKE '%$id%' ORDER BY nome ASC
            $edit->execute();
            $edit = $edit->fetchall(PDO::FETCH_OBJ);
            //$lista = $lista->fetch(PDO::FETCH_ASSOC);
            return $edit;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }

//===================================================
// Atualizar a Palestra
//===================================================

    static function Update($id_palestra, $titulo_palestra, $nome_arquivo, $data_liberacao){
        try {
            $conexao = BancoDados::conectar();
            $update = $conexao->prepare('UPDATE palestras SET titulo_palestra = :titulo_palestra, nome_palestra = :nome_arquivo,
                                            data_liberacao = :data_liberacao, data_alteracao = NOW() 
                                        WHERE id = :id_palestra');
            $update->bindValue(':id_palestra',$id_palestra);
            $update->bindValue(':titulo_palestra',$titulo_palestra);
            $update->bindValue(':nome_arquivo',$nome_arquivo);
            // $update->bindValue(':duracao_palestra',$duracao_palestra);
            $update->bindValue(':data_liberacao',$data_liberacao);
            $update->execute();
            //$update = $update->fetch(PDO::FETCH_OBJ);
            //$lista = $lista->fetch(PDO::FETCH_ASSOC);
            return $update;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }

    //===================================================
// Atualizar a Palestra
//===================================================
    static function Delete($id_palestra){
        try {
            $conexao = BancoDados::conectar();
            $update = $conexao->prepare('DELETE from palestras WHERE id = :id_palestra');
            $update->bindValue(':id_palestra',$id_palestra);
            $update->execute();
            
            return $update;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }



}

// Testando a inserçao de dados
//$adicionar = Palestra::Update('31','Emponderamento Feminino e Saúde da Mulher','WhatsApp Video 2021-03-17 at 07.27.27.mp4', '2021/03/14');



?>
