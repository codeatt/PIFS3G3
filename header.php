<nav class="navbar navbar-inverse menubar" >
  <div id="navfixed">
  <div class="navbar-header   col-md-4 col-xs-12"> <!--Boostrap Responsive 1-->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <!--Este é o botão minimizado-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="#"><img src="foto/logo.png" alt="logo" id="logo"></a>
  </div>

      <div class=" col-md-4 col-xs-12"> <!--Boostrap Responsive 1.2-->
        <div class="row">
          <div class="col-xs-12"> <!--Boostrap Responsive xs mobile-->
            <form class="form-inline"> <!--Campo de busca-->
              <div class="form-group">
                <label class="sr-only" for="exampleInputAmount">Amount</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="pesquisa" id="exampleInputAmount" maxlength="50" placeholder="Buscar" required >
                  <div class="input-group-addon">
                    <button id="lupa" type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search" aria-hidden="true"><!--Lupa de busca<span>-->
                      </span>
                      </button>
                   </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="collapse navbar-collapse  col-md-4 col-xs-12 text-right" id="myNavbar"> <!--Boostrap Responsive1.3-->
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Início</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Inscreva-se</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
</nav>
