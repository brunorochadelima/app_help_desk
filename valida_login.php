<?php
//inicia sessão
session_start();

//Verifica se o usuário está autenticado
$usuarioEstaAtenticado = false;

// Peril de acesso
$usuario_id  = null;
$perfil_acesso = null;
$perfis = [
  [1 => 'administrador', 2 => 'usuario']
];

//Lista de usuarios do sistema
$usuarios = [
  ['id' => 1, 'email' => 'adm@teste.com', 'senha' => '1234', 'perfil_acesso' => 1],
  ['id' => 2, 'email' => 'user@teste.com', 'senha' => '1234', 'perfil_acesso' => 2],
  ['id' => 3, 'email' => 'user2@teste.com', 'senha' => '1234', 'perfil_acesso' => 2]
];

foreach ($usuarios as $usuario) {
  if ($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']) {
    $usuarioEstaAtenticado = true;
    $usuario_id = $usuario['id'];
    $perfil_acesso = $usuario['perfil_acesso'];
  };
}

if ($usuarioEstaAtenticado) {
  echo 'Usuário Autenticado';
  /* superglobal que armazena variaveis de seções que podem ser recuperadas em todos as paginas.
  a sessao dura 3 horas e é controlada através de um cookie no navegador */
  $_SESSION['usuario_id'] = $usuario_id;
  $_SESSION['autenticado'] = 'true';
  $_SESSION['perfil_acesso'] = $perfil_acesso;
  header('Location: home.php');
} else {
  header('Location: index.php?login=erro');
  $_SESSION['autenticado'] = 'false';
};

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