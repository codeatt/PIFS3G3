<?php
session_start();
// abaixo VERIFICA LOGIN PHP SERGIO
if($_POST){
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $usuariosJson = 'dados/usuarios.json';
  $usuarios = file_get_contents($usuariosJson);
  $usuariosArray = json_decode($usuarios, true);
  $senhateste='$2y$10$Y5ZViE6vuEq.G2M6EN8NDe0e//XcP5jHTLLq65WzFERappbS4MEfi';
  foreach ($usuariosArray['usuarios'] as $key => $value) {
      if(in_array($email, $usuariosArray['usuarios'][$key])){//verifica se usuario existe
        if (password_verify($senha,$usuariosArray['usuarios'][$key]['senha'])){//verifica senha
          $_SESSION["email"]=$email;
          header('Location: logados.php');
        }else{
          header('Location: login.php?error=true');
        }
      }
   }
}
// acima VERIFICA LOGIN PHP SERGIO
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Livraria Global - Login</title>
  </head>
  <body>

    <?php include "header.php"; ?>

<!-- LOGIN -->
<div class="login-form">
    <form action="login.php" method="POST">
        <h2 class="text-center">Faça seu Login</h2><br>
        <?php
        if(isset($_GET['error'])){
          echo "<div class='alert alert-danger'>Autenticação negada</div>";
        } else   if(isset($_GET['cadastro'])){
          echo "<div class='alert alert-success'>Cadastro realizado com sucesso</div>";
        }
        ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="usuario@email.com" required="required">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" placeholder="***********" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline" for="lembrar-login">
              <input type="checkbox" name="lembrarUsuario" id="lembrar-login"> Lembre-me
            </label>
            <a href="#" class="pull-right">Esqueceu sua senha?</a>
        </div>
    </form>
    <p class="text-center"><a href="cadastro.php">Criar uma conta</a></p>
</div>
</body>
</html>
