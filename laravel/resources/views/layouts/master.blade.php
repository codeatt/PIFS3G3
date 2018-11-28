<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
   integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <title>Livraria Global - FAQ</title>
</head>
<body>
<nav class="navbar navbar-inverse menubar">
  <div id="navfixed">
    <div class="navbar-header   col-sm-4 col-xs-12"> <!--Boostrap Responsive 1-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <!--Este é o botão minimizado-->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="/home"><img src="/foto/logo.png" alt="logo" id="logo"></a>
    </div>

    <div class=" col-md-4 col-sm-8 col-xs-12"> <!--Boostrap Responsive 1.2-->
      <div class="row">
        <div class="col-xs-12"> <!--Boostrap Responsive xs mobile-->
          <form class="form-inline"> <!--Campo de busca-->
            <div class="form-group">
              <div class="input-group form-busca">
                <input type="text" class="form-control" name="search" id="search" maxlength="50" placeholder="Buscar" required >
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
    <div class="collapse navbar-collapse  col-sm-4 col-xs-12 text-right" id="myNavbar"> <!--Boostrap Responsive1.3-->
        <ul class="nav navbar-nav">
          <li class="active"><a href="/livros/lista">produtos</a></li>
          <li><a href="/faq">FAQ</a></li>
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">Cadastro</a>
                  @endif
              </li>
          @else
              <li class="nav-item dropdown">
                  <a class="nav-link">
                      {{ Auth::user()->name }}
                  </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" title="Sair">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')
  <footer>
    <div class="container">
      <div class="col-xs-12 text-center">
        <p>Livraria Global - 2018</p>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
