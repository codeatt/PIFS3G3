@extends('layouts.master')
@section('content')

<section class="container-fluid cadastro-main">
    <div class="container cadastro-main-form">
    <h1>Cadastro</h1>

    <form id="formCadastro" name="formCadastro" action="/cadastro" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

        <div class="row">
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="nome">Nome</label>
            <input type="text" class="form-control" name="name" id="name" maxlength="50" placeholder="Digite seu nome" required>
          </div>
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" maxlength="30" placeholder="Ex.: email@dominio.com" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="estado">Estado</label>
            <select id="estado" name="estado" class="form-control">
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="cidade">Cidade</label>
            <select id="cidade" name="cidade" class="form-control">
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 form-group">
              <label class="form-label" for="dataNascimento">Data de nascimento</label>
              <input type="date" class="form-control" name="data_de_nascimento" id="data_de_nascimento" placeholder="dd/MM/yyyy">
          </div>

            <div class="col-md-4 form-group">
                <label class="form-label-required" for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" placeholder="Ex: 123.456.789-12">
            </div>
      <div class="col-md-4 form-group">
        <label class="form-label-required" for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="Ex.: email@dominio.com" required>
      </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group">
            <p class="form-label" for="sexo">Sexo</p>
            <label for="sexoMasculino"><input type="radio" name="sexo" id="sexoMasculino" value="M" checked="" />Masculino</label>
            <label for="sexoFeminino"><input type="radio" name="sexo" id="sexoFeminino" value="F" />Feminino</label>
        </div>
        <div class="col-md-4 form-group">
            <label class="form-label" for="celular">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" maxlength="14" placeholder="Ex: (99) 99999-9999">
        </div>
    </div>


        <div class="row">
          <div class="col-md-4 form-group">
            <label class="form-label-required" for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" maxlength=15 placeholder="Informe sua senha" required>
          </div>

          <div class="col-md-4 form-group">
            <label class="form-label-required" for="confirmacao">Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" maxlength="20" placeholder="Confirme sua senha" required>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label class="form-label-required" for="foto">Foto:</label>
		            <input type="file" class="form-control" name="foto" id="foto" />
            </div>

            <div class="col-md-12 form-group">
                <br>
                <label class="form-label" for="autorizacaoContato">
                    <input type="checkbox" name="autorizacaoContato" id="autorizacaoContato">
                    <span>Autorizo o envio de noticias e promoções da Livraria Global em meu e-mail</span>
		            </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button id="cadastro-enviar" type="button" class="btn btn-primary ">Enviar</button>
		              <br>
            </div>
        </div>

        <div id="divErro" class="alert alert-danger alert-dismissible fade in" style="display: none; margin: 25px 0px;">
          <ul id="listaErro">
          </ul>
        </div>

    </form>

    </div>
</section>
<script type="text/javascript" src="/js/validacao.js"></script>
@stop
