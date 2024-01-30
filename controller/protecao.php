<?php

// Inicia Seção //
if(!isset($_SESSION)) {
    session_start();
}
// bloqueia entrada sem login //
if(!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"../view/index.php\">Entrar</a></p>");
}


?>