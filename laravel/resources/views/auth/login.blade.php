@extends('layouts.master')
@section('content')

<div class="login-form">
  <form action="{{ route('login') }}" method="POST">
      <h2 class="text-center">Faça seu Login</h2><br>

@if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
<br>
  @csrf

<!-- LOGIN -->
      <div class="form-group">
          <label for="">Email:</label>
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      </div>

      <div class="form-group">
          <label for="">Senha:</label>
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
          </button>
      </div>

      <div class="clearfix">
          <label class="pull-left checkbox-inline" for="lembrar-login">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Lembre-me
          </label>

          <a  class="pull-right" href="{{ route('password.request') }}">
            {{ __('Esqueceu sua senha?') }}
          </a>
      </div>
  </form>
  <p class="text-center"><a href="/cadastro">Criar uma conta</a></p>
</div>
</body>

@stop
