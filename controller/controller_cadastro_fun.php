<?php
// se botao submit acionado //
if (isset($_POST['submit'])) {
    include_once '../model/crud.php';
    // variaveis //
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $funcao = $_POST["funcao"];
    $salario = $_POST["salario"];
  

    $inserir = new crud();
    // envia dados para a função //
    $inserir->cadastrar_func($nome, $telefone, $funcao, $salario);
}
?>