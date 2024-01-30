<?php
// se botao acionado //
$botao = filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);

if (isset($botao)) {
    include_once '../model/crud.php';
    //variaveis //
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $usuario = new crud();
    // envia dados para a função //
    $usuario->login_usuario($email, $senha);
}