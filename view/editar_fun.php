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
  <link rel="stylesheet" href="../styleInicio.css">
  <title>Bem Vindo!!</title>
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
            <a class="nav-link" href="dashboard.php">Sair</a>
          </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Editar informações Do Funcionário</h3>
      <p class="text-muted">Clique em Alterar Após Realizar Quaisquer Alteração.</p>
    </div>
    <!-- realiza consulta dos dados no banco -->
    <?php
     include('../model/conexao.php');
     $id = $_GET["id"];
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <!-- formulario para edição -->
    <div class="container d-flex justify-content-center">
      <form action="../controller/controller_editar_fun.php" method="POST" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $row['nome'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $row['telefone'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Função:</label>
          <input type="text" class="form-control" name="funcao" value="<?php echo $row['funcao'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Salário:</label>
          <input type="text" class="form-control" name="salario" value="<?php echo $row['salario'] ?>">
        </div>
       

        <div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <!-- envia dados para o controller -->
          <button type="submit" class="btn btn-success" name="submit">Alterar</button>
          <a href="../view/inicio.php" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>