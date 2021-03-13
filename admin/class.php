<?php


//===================================================
// Conexao com banco de Dados MySql
//===================================================
abstract class BancoDados{

        // const host      = '172.0.0.111';
        // const dbname    = 'ai2021';
        // const user      = 'acoes';
        // const password  = 'C0l0mb0#';

        const host      = 'localhost:82';
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