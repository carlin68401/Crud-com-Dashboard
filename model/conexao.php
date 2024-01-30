<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'php';
    // conecta ao banco //
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

      // testa conexão //
     if($conexao->connect_errno)
     {
        echo "Erro";
    }
    else
   {
        echo "";
   }

?>