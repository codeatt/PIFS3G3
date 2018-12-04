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
            <label class="form-label-required" for="pais">Pais</label>
            <select id="pais" name="pais" class="form-control">
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
<script type="text/javascript">

window.onload = function() {
  let btnSubmit = document.getElementById('cadastro-enviar');
  if(btnSubmit) {
    btnSubmit.addEventListener('click',validarDados);
  }

  carregarPaises();
}

function validarDados() {
  let form = document.getElementById('formCadastro');
  let erros = [];
  if(form) {
      if(form.elements.name.value == '' || form.elements.name.value.length < 5){
        erros.push('Informe corretamente o nome');
      }
      if(form.elements.sobrenome.value == '' || form.elements.sobrenome.value.length < 5)
      {
        erros.push('Informe corretamente o sobrenome');
      }
      if(form.elements.data_de_nascimento.value == '') {
        erros.push('Informe corretamente a data de nascimento');
      }
      if(form.elements.email.value == '') {
        erros.push('Informe corretamente o e-mail');
      }
      if(form.elements.email.value == '' || form.elements.email.value.length < 10) {
        erros.push('Informe corretamente o e-mail');
      }
      if(form.elements.sexo.value == '') {
        erros.push('Informe corretamente o sexo');
      }
      if(form.elements.password.value == '' || form.elements.password.value.length < 8) {
        erros.push('Informe corretamente a senha');
      }
      if(form.elements.confirmarSenha.value == '' || form.elements.confirmarSenha.value.length < 8) {
        erros.push('Informe corretamente a confirmacao de senha senha');
      }
      if(form.elements.password.value !== form.elements.confirmarSenha.value) {
        erros.push('Senha e confirmação de senha devem ser iguais');
      }
      if(form.elements.cpf.value != '' && !validarCpf(form.elements.cpf.value)) {
        erros.push('CPF incorreto');
      }

      document.getElementById('divErro').style.display = 'none';
      document.getElementById('listaErro').innerHTML = '';
      if(erros.length > 0) {
        document.getElementById('divErro').style.display = 'block';
        for(let e of erros) {
          let li = document.createElement("li");
          li.innerHTML = e;
          document.getElementById('listaErro').appendChild(li);
        }

        return false;
      }
      else {
        form.submit();
      }

    }
}

function validarCpf(num)
{
  var cpf = num.replace('-','').replace('.','');
  if (num.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
    return false;
  add = 0;
  for (i=0; i < 9; i ++)
    add += parseInt(cpf.charAt(i)) * (10 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(9)))
    return false;
  add = 0;
  for (i = 0; i < 10; i ++)
    add += parseInt(cpf.charAt(i)) * (11 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(10)))
    return false;

  return true;
}

function carregarPaises() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText) {
        for(let i = 0; i < this.responseText.length; i++)
        {
          let opt = document.createElement("option");
          opt.text = this.responseText[i].name;
          opt.value = this.responseText[i].id;
          document.getElementById("pais").appendChild(opt);
        }
      }
    }
  };
  xhttp.open("GET", "/api/paises", true);
  xhttp.send();
}
</script>
@stop
