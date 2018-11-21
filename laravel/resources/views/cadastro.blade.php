@extends('layouts.master')

@section('content')
<section class="container-fluid cadastro-main">
    <div class="container cadastro-main-form">
    <center><h1>CADASTRE-SE</h1></center>

    <form id="formCadastro" name="formCadastro" action="/cadastro" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDados();">
        <div class="row">
          <div class="col-md-12 form-group">
            <label class="form-label-required" for="nome">Nome Completo:</label>
            <input type="text" class="form-control" name="nome" id="nome" maxlength="50" placeholder="Digite seu nome completo aqui" value="" required />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
            <label class="form-label-required" for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="Ex.: email@dominio.com" value="" required />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" maxlength="20" placeholder="Digite sua senha aqui" value="" required />
            <label><input type="checkbox" id="mostrarSenha" name="mostrarSenha" onclick="exibirSenha();" />Exibir senha</label>
          </div>
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="confirmacao">Confirmar Senha:</label>
            <input type="password" class="form-control" id="confirmacao" name="confirmacao" maxlength="20" placeholder="Repita sua senha aqui" value="" required />
          </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label class="form-label-required" for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" value="" required />
            </div>
            <div class="col-md-4 form-group">
                <label class="form-label" for="dataNascimento">Data de nascimento:</label>
                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="" placeholder="dd/MM/yyyy" required />
            </div>
            <div class="col-md-4 form-group">
                <p class="form-label" for="sexo">Sexo:</p>
                <label for="sexoMasculino"><input type="radio" name="sexo" id="sexoMasculino" value="M" checked="" />Masculino</label>
                <label for="sexoFeminino"><input type="radio" name="sexo" id="sexoFeminino" value="F" />Feminino</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label class="form-label" for="celular">Celular:</label>
                <input type="text" class="form-control" name="celular" id="celular" maxlength="14" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label class="form-label" for="cep">CEP:</label>
                <input type="text" class="form-control" name="cep" id="cep" maxlength="9" value="" />
            </div>
            <div class="col-md-8 form-group">
                <label class="form-label" for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" id="endereco" maxlength="50" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 form-group">
                <label class="form-label" for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" id="numero" maxlength="10" value="" />
            </div>
            <div class="col-md-5 form-group">
                <label class="form-label" for="complemento">Complemento:</label>
                <input type="text" class="form-control" name="complemento" maxlength="50" id="complemento" value="" />
            </div>
            <div class="col-md-5 form-group">
                <label class="form-label" for="bairro">Bairro:</label>
                <input type="text" class="form-control" name="bairro" id="bairro" maxlength="50" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 form-group">
                <label class="form-label" for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" maxlength="50" value="" />
            </div>
          <div class="col-md-4 form-group">
              <label class="form-label" for="uf">Estado:</label>
              <select class="form-control" name="uf" id="uf">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Baia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espirito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraiba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SE">Sergipe</option>
                <option value="SP" selected="">São Paulo</option>
                <option value="TO">Tocantins</option>
              </select>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label class="form-label-required" for="foto">Foto:</label>
		<input type="file" class="form-control" name="foto" id="foto" />
            </div>
            <div class="col-md-6 form-group">
                <br>
                <label class="form-label" for="autorizacaoContato">
                    <input type="checkbox" name="autorizacaoContato" id="autorizacaoContato">
                    <span>Autorizo o envio de noticias e promoções da Livraria Global em meu e-mail</span>
		</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button id="cadastro-enviar" type="submit" class="btn btn-primary btn-block">Enviar</button>
		<br>
            </div>
        </div>
    </form>

    </div>
</section>
@stop
