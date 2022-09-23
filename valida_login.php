<?php 
//inicia sessão
session_start();

//Verifica se o usuário está autenticado
$usuarioEstaAtenticado = false;

//Lista de usuarios do sistema
$usuarios = [
  ['email' => 'bruno.mkt@multi', 'senha' => '12345'],
  ['email' => 'teste.mkt@multi', 'senha' => '123456']
];

foreach($usuarios as $usuario) {
  if ($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']) {
    $usuarioEstaAtenticado = true; 
  };
}

if ($usuarioEstaAtenticado) {
  echo 'Usuário Autenticado';
  /* superglobal que armazena variaveis de seções que podem ser recuperadas em todos as paginas.
  a sessao dura 3 horas e é controlada através de um cookie no navegador */
  $_SESSION ['autenticado'] = 'true';
  header('Location: home.php');
} else {
  header('Location: index.php?login=erro');
  $_SESSION ['autenticado'] = 'false';
};

// echo '<pre>';
// print_r($usuarios);
// echo '</pre>';

/*
GET
Recupera od dados enviados na url
Get é um array e cada parametro recebido se transforma em um índice

print_r($_GET);
echo '<br>';
echo $_GET['email'];
echo $_GET['senha'];
*/

/* 
POST
Post recebe os dados no corpo e não na url
Ambos métodos precisam do atributo "name" nos inputs do form 

print_r($_POST);
*/