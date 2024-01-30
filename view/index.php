<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- login e cadastro de usuario -->
  <div class="container">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Login</button>
      <button id="btnSignup">Cadastre-se</button>
    </div>

    <form id="signin" action="../controller/controller_logar.php" method="POST">
           <input type="text" name="email" placeholder="Email" required />
            <i class="fas fa-envelope iEmail"></i>
              <input type="password" name="senha" placeholder="Password" required />
               <i class="fas fa-lock iPassword"></i>
      
              <button id="btn-login" type="submit" value="Logar" name="botao">Entrar</button>
    </form>

    <form id="signup" action="../controller/controller_cadastro_usu.php" method="POST">
           <input type="text" name="email" nameplaceholder="Email" required />
            <i class="fas fa-envelope iEmail"></i>
           <input type="password" name="senha" placeholder="Password" required />
           <i class="fas fa-lock iPassword"></i>
            <button name="acao" type="submit">Sign up</button>
    </form>
  </div>

  <script src="../index.js"></script>
</body>
</html>