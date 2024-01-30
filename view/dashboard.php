<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styleDash.css">
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

<!-- Inicio Grafico De colunas -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- consulta no banco e scripts para o grafico -->
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nome", "Salário", { role: "style" } ],
       
        <?php
        include('../model/conexao.php');
        $sql = "SELECT * FROM crud";
        $busca = mysqli_query($conexao,$sql);
 
        while ($dados = mysqli_fetch_array($busca)) {
            $nome = $dados['nome'];
            $salario = $dados['salario'];
       
 
         ?>
    
        ["<?php echo $nome ?>", <?php echo $salario ?>, "#2ecc71"],
       
 
      <?php } ?>
 
      ]);
      
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
 
      var options = {
        title: "",
        width: 700,
        height: 500,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  <!-- exibe o grafico  -->
            <div class="grafico">
                    <h2>Grafico Salários</h2>
                    <div id="columnchart_values" style="width: 900px; height: 500px;"></div>
            </div>

<!-- grafico De Pizza -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nome", "Salário", { role: "style" } ],
       
        <?php
        include('../model/conexao.php');
        $sql = "SELECT * FROM crud";
        $busca = mysqli_query($conexao,$sql);
 
        while ($dados = mysqli_fetch_array($busca)) {
            $nome = $dados['nome'];
            $salario = $dados['salario'];

         ?>

        ["<?php echo $nome ?>", <?php echo $salario ?>, "#2ecc71"],
        
      <?php } ?>
 
      ]);
 
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
 
      var options = {
        title: "",
        is3D: true,
        width: 700,
        height: 500,
        bar: {groupWidth: "80%"},
        legend: { position: "bottom" },
      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(view, options);
  }
  </script>
  <!-- exibe Grafico de Pizza -->
            <div class="grafico">
                    <h2>Grafico Maior Salário</h2>
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
            <!-- Resumo Da Empresa -->

  <div class="dashboard-card">
  <?php
        include('../model/conexao.php');
        $sql = "SELECT sum(salario) as salariototal, count(id) as totalfun FROM `crud`";

        if ($result = mysqli_query($conexao, $sql)) {
        $row = mysqli_fetch_assoc($result);
         if ($row) {
        ?>
        <div class="card-header">Resumo</div>
        <div class="data-label">Total de Funcionários</div>
        <div class="data-value" id="total-funcionarios"><?php echo $row["totalfun"] ?></div>

        

        <div class="data-label">Salário Total</div>
        <div class="data-value" id="salario-total"><?php echo $row["salariototal"] ?></div>
        <?php
    } else {
        echo "No data found";
    }

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>