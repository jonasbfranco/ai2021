<?php

    //date_default_timezone_get('America/Sao_Paulo');
abstract class BancoDados{

        // const host      = '172.0.0.111';
        // const dbname    = 'ai2021';
        // const user      = 'acoes';
        // const password  = 'C0l0mb0#';

        const host      = 'localhost';
        const dbname    = 'ai2021';
        const user      = 'root';
        const password  = '123456';
	
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

$conexao = BancoDados::conectar();

/* TESTE PARA VERIFICAR SE ESTA CONECTANDO NO BANCO DE DADOS */
if($conexao){
    echo "Conectado";
}



?>