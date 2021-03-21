<?php


//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class BancoDados{

        public static $pdo;

        private function __construct() {
            //
        }

        // const host      = ';
        // const dbname    = 'ai2021';
        // const user      = 'acoes';
        // const password  = '';

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
abstract class Funcionario {
    static function Logar($cartao) {   
        try {
            $conexao = BancoDados::conectar();
            $sessao = $conexao->prepare('SELECT * FROM funcionarios WHERE cartao_funcionario = :cartao_funcionario LIMIT 1');
            $sessao->bindValue(':cartao_funcionario',$cartao);
            if($sessao->execute()){

                if($sessao->rowCount() > 0){
                    $row = $sessao->fetch(PDO::FETCH_OBJ);

                    if($_POST['cartao'] == $row->cartao_funcionario){
                    //sessao de tempo para expirar comeca aqui
                    $tempolimite = 5400; //600 equivale a 10 minuto
                    $_SESSION['registro'] = time();
                    $_SESSION['limite'] = $tempolimite;
                    $_SESSION['sessao_usuario'] = $row->nome_funcionario;
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


//===================================================
// Cadastrar Funcionario
//===================================================
    static function Cadastro($nome_funcionario, $cartao_funcionario, $unidade_funcionario){
        try {
            $conexao = BancoDados::conectar();
            $cad = $conexao->prepare('INSERT INTO funcionarios (nome_funcionario,cartao_funcionario,unidade_funcionario,data_cadastro)
                                      VALUES (:nome_funcionario,:cartao_funcionario,:unidade_funcionario,NOW())');
            $cad->bindValue(':nome_funcionario',$nome_funcionario);
            $cad->bindValue(':cartao_funcionario',$cartao_funcionario);
            $cad->bindValue(':unidade_funcionario',$unidade_funcionario);
            $cad->execute();

            return $cad;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }


//===================================================
// Verificar se o Funcionario ja esta cadastrado
//===================================================
    static function Verificar($cartao_funcionario){
        try {
            $conexao = BancoDados::conectar();
            $ver = $conexao->prepare('SELECT * FROM funcionarios WHERE cartao_funcionario = :cartao_funcionario LIMIT 1');
            $ver->bindValue(':cartao_funcionario',$cartao_funcionario);
            $ver->execute();

            return $ver;

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





abstract class Palestra{
//===================================================
// Exibir as Palestras Cadastradas
//===================================================
    static function Show(){
        try {
            $conexao = BancoDados::conectar();
            $data = date("Y-m-d");
            $show = $conexao->prepare("SELECT * FROM palestras WHERE data_liberacao <= '$data' ORDER BY data_liberacao ASC");
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
    static function Video($id){
        try {
            $conexao = BancoDados::conectar();
            $video = $conexao->prepare("SELECT * FROM palestras WHERE id = $id LIMIT 1");
            // SELECT * FROM funcionarios WHERE nome LIKE '%Jonas%';
            // SELECT * FROM palestras WHERE id LIKE '%$id%' ORDER BY nome ASC
            $video->execute();
            $video = $video->fetch(PDO::FETCH_OBJ);
            //$lista = $lista->fetch(PDO::FETCH_ASSOC);
            return $video;

        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        } 
    }



}

// Testando a inserçao de dados
/* $nome_funcionario       = 'Ḱemily Fernanda Esteves Boer Franco';
$cartao_funcionario     = '38594';
$unidade_funcionario    = '10';
$adicionar = Funcionario::Cadastro($nome_funcionario, $cartao_funcionario, $unidade_funcionario, '2021/03/20');

 */
// Testando a inserçao de dados
/* $adicionar = Funcionario::Logar(38593);
if (!empty($adicionar)){
echo "Deu certo o login";
} else {
echo "Nao deu certo o login";
 */



?>
