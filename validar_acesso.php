<?php
session_start();

// se não existir sessao ativa ou sessao e diferente de true redirecionar usuário
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'true') {
  header('Location: index.php?login=erro2');
}
?>