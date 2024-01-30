<?php
// se botao submit acionado //
if( isset($_POST['submit']) && isset($_POST['id']) )  { 
    include_once '../model/crud.php';
    
    // variaveis //
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $funcao = $_POST['funcao'];
    $salario = $_POST['salario'];

    $editar = new crud();
    // envia dados para a função //
    $editar->editar_func($id, $nome, $telefone, $funcao, $salario);
}
?>