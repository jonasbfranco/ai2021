<?php


print_r($_FILES['arquivo']);

$nome_arquivo       = $_FILES['arquivo']['name'];
$caminho_atual      = $_FILES['arquivo']['tmp_name'];
$caminho_salvar     = '/var/www/html/ai2021/palestras/'.$nome_arquivo;


move_uploaded_file($caminho_atual, $caminho_salvar);

?>