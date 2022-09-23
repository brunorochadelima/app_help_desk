<?php 
//capturar dados do form com Post
echo '<pre>';
print_r($_POST);
echo '</pre>';

$titulo = str_replace('#', '-', $_POST['titulo']) ;
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

// abrir arquivo ou criar caso não exista
$arquivo = fopen('arquivo.hd', 'a');

// escrever no arquivo
fwrite($arquivo, "$titulo # $categoria # $descricao" . PHP_EOL);

// fechar o arquivo
fclose($arquivo);