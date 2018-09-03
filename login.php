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
    <title>EXERCÍCIO BOOTSTRAP</title>
  </head>
  <body>
    
    <?php include "header.php"; ?>

<!-- LOGIN -->
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center">Faça seu Login</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuário" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Lembre-me</label>
            <a href="#" class="pull-right">Esqueceu sua senha?</a>
        </div>
    </form>
    <p class="text-center"><a href="cadastro.php">Criar uma conta</a></p>
</div>
</body>
</html>
