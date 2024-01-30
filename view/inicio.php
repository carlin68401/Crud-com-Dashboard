<?php

include('../controller/protecao.php');

?>
<!DOCTYPE html>
<html lang="pt">

<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
          <title>Bem Vindo!!</title>

            <link rel="stylesheet" href="../styleInicio.css">
</head>

<body>
  <!-- Menu -->
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
                <a class="navbar-brand navbar-brand-text" href="#">Sua Empresa</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <img src="../img/menu.png"  style="max-widht:52px; max-height:42px;">
  
                    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sua Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                     <li class="nav-item">
                               <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                     </li>
                     <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                   </li>
                  <li class="nav-item">
                          <a class="nav-link" href="../controller/logout.php">Sair</a>
                 </li>
              
            </ul>
          </li>
        </ul>
      
      </div>
    </div>
  </div>
</nav>
<!-- alerta de operação -->
<div class="container">
  <?php
  if (isset($_GET["msg"])) {
          $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                     ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
  }
  ?>
  
  
  <div class="d-flex justify-content-center mb-5">
    <a href="add_fun.php" class="btn btn-dark">Adicionar Novo Funcionário</a>
  </div>

  <!-- tabela com dados do banco -->
  <table class="table table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Função</th>
        <th scope="col">Salário</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <!-- consulta no banco -->
      <?php
      include('../model/conexao.php');
      // consulta na tabela crud //
      $sql = "SELECT * FROM `crud`"; 
      $result = mysqli_query($conexao, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <!-- resultado da consulta -->
        <tr>
          <td><?php echo $row["nome"] ?></td>
          <td><?php echo $row["telefone"] ?></td>
          <td><?php echo $row["funcao"] ?></td>
          <td><?php echo $row["salario"] ?></td>
          <td>
            <!-- Operações Ediat e Excluir -->
            <a href="editar_fun.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <form action="../controller/controller_excluir_fun.php" method="GET" style="display: inline;">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-outline-dark" name="submit">Excluir</button>
            </form>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
