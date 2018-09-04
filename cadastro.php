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
    <title>Livraria Global - Registro</title>
</head>
<body>

    <?php include "header.php"; ?>

    <section class="container-fluid cadastro-main" id="faqtitle1">
        <div class="container cadastro-main-form" >
            <h1>CADASTRE-SE</h1>
            <form id="formCadastro" name="formCadastro" action="cadastro.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <label class="form-label-required" for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome completo aqui" required />
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: email@dominio.com" required />
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha aqui" required />
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="confirmacao">Confirmar Senha:</label>
                    <input type="password" class="form-control" id="confirmacao" name="confirmacao" placeholder="Repita sua senha aqui" required />
                </div>
				<div class="form-group">
                    <label class="form-label-required" for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" required />
                </div>
				<div class="form-group">
                    <label class="form-label" for="dataNascimento">Data de nascimento:</label>
                    <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="dd/MM/yyyy" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="sexo">Sexo: 
						<input type="radio" name="sexo" value="M" checked />Masculino
						<input type="radio" name="sexo" value="F" />Feminino
					</label>
                </div>
				<div class="form-group">
                    <label class="form-label" for="celular">Celular:</label>
                    <input type="text" class="form-control" name="celular" id="celular" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="cep">CEP:</label>
                    <input type="text" class="form-control" name="cep" id="cep" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="numero">Número:</label>
                    <input type="text" class="form-control" name="numero" id="numero" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="complemento">Complemento:</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="complemento">Complemento:</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="bairro">Bairro:</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" />
                </div>
				<div class="form-group">
                    <label class="form-label" for="cidade">Cidade:</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" />
                </div>
				<div class="form-group">
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
						<option value="SP" selected>São Paulo</option>
						<option value="TO">Tocantins</option>
					</select>
                </div>
                <div class="checkbox">
                    <label class="form-label" for="autorizacaoContato">
						<input type="checkbox" name="autorizacaoContato" id="autorizacaoContato" />
						Autorizo o envio de noticias e promoções da Livraria Global em meu e-mail
					</label>
                </div>
				<div class="form-group">
					<label class="form-label-required" for="foto">Foto:</label>
					<input type="file" class="form-control" name="foto" id="foto" />
                </div>
                <div id="enviar">
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </div>
            </form>
        </div>
    </section>

    <footer>

    </footer>
</body>

</html>
