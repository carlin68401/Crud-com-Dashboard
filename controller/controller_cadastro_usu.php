<?php
// se botao acao acionado //
if (isset($_POST['acao'])) {
    include_once '../model/crud.php';
    // variaveis //
    $email = $_POST["email"];
    $senha = $_POST["senha"];
   
  

    $inserir = new crud();
    // envia dados para a função //
    $inserir->cadastrar_usuario($email, $senha);
}
?>