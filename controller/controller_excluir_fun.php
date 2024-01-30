<?php
// se botao submit acionado //
if (isset($_GET['submit'])) {
    include_once '../model/crud.php';
    // variaveis //
    $id = $_GET["id"];
    
  

    $excluir = new crud();
    // envia dados para a função //
    $excluir->excluir_func($id);
}
?>