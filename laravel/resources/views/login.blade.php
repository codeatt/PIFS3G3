@extends('layouts.master')

@section('content')

<body>

   

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

@stop
