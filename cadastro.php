<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "comum/funcoes.php";

	if($_POST) {
	  $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
	  $email = isset($_POST["email"]) ? $_POST["email"] : "";
	  $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
	  $confirmacao = isset($_POST["confirmacao"]) ? $_POST["confirmacao"] : "";
	  $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
	  $dataNascimento = isset($_POST["dataNascimento"]) ? $_POST["dataNascimento"] : "";
	  $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
	  $celular = isset($_POST["celular"]) ? $_POST["celular"] : "";
	  $cep = isset($_POST["cep"]) ? $_POST["cep"] : "";
	  $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : "";
	  $numero = isset($_POST["numero"]) ? $_POST["numero"] : "";
	  $complemento = isset($_POST["complemento"]) ? $_POST["complemento"] : "";
	  $bairro = isset($_POST["bairro"]) ? $_POST["bairro"] : "";
	  $cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : "";
	  $uf = isset($_POST["uf"]) ? $_POST["uf"] : "";
	  $autorizacaoContato = isset($_POST["autorizacaoContato"]) ? $_POST["autorizacaoContato"] : "";
	  $mensagemErros = [];

	  if (empty($nome)) {
			$mensagemErros[] = "Nome não informado";
	  }
	  else if(strpos($nome, ' ') === false || strlen($nome) < 10) {
			$nome = "";
			$mensagemErros[] = "Nome inválido";
	  }

	  if(empty($email)) {
			$email = "";
			$mensagemErros[] = "E-mail não informado";
	  }
	  else if (!validarEmail($email)) {
			$email = "";
			$$mensagemErros[] = "E-mail inválido";
	  }

	  if (strlen($senha) < '8') {
			$senha = "";
			$mensagemErros[] = "Deve ter no mínimo 8 caracteres";
	  }
	  elseif(!possuiNumeros($senha)) {
			$senha = "";
			$mensagemErros[] = "Deve ter pelo menos um número";
	  }
	  elseif(!possuiLetrasMaiusculas($senha)) {
			$senha = "";
			$mensagemErros[] = "Deve ter pelo menos uma letra maiuscula";
	  }
	  elseif(!possuiLetrasMinusculas($senha)) {
			$senha = "";
			$mensagemErros[] = "Deve ter pelo menos uma letra minuscula";
	  }
	  elseif(!possuiCaracterEspecialValido($senha)) {
			$senha = "";
			$mensagemErros[] = "Deve ter pelo menos um caracter especial: !@#$%&*-+.?";
	  }
	  else if ($confirmacao !== $senha) {
			$confirmacao = "";
			$mensagemErros[] = "As senhas informadas devem ser iguais";
	  }

	  if(empty($cpf)) {
			$cpf = "";
			$mensagemErros[] = "CPF não informado";
	  }
	  // else if(validarCPF($cpf)) {
		// 	$mensagemErros[] = "CPF inválido";
	  // }

	  if(empty($dataNascimento)) {
			$dataNascimento = "";
			$mensagemErros[] = "Data não informada";
	  }
	  else if(!validarData($dataNascimento)) {
			$dataNascimento = "";
			$mensagemErros[] = "Data inválida";
	  }

	  if(!empty($celular)) {
		  if(!validarTelefone($celular)) {
			$celular = "";
			$mensagemErros[] = "Celular inválido";
		  }
	  }

	  if(!empty($cep)) {
		  if(!validarCEP($cep)) {
			$cep = "";
			$mensagemErros[] = "CEP inválido";
		  }
	  }
		//validar arquivo UPLOAD FOTO
		$caminhoFoto = "";
		if($_FILES) {
		 	if($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
				$nomeArquivo = $_FILES["foto"]["name"];
				$arquivoTemporario = $_FILES["foto"]["tmp_name"];
				$caminhoFoto = "foto/$nomeArquivo";

				if(!validarArquivo($nomeArquivo,array('png','jpg'))) {
					$mensagemErros[] = "Somente arquivos do tipo PNG ou JPG";
				}
		 	}
		}

		//gravar DADOS DE CADASTRO
		if(!isset($mensagemErros)) {

			$hashSenha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

			try {
				$filename = 'dados/usuarios.json';
				if (file_exists($filename)) { // file_get_contents para file_exists
				  $json=file_get_contents($filename);
				  $dados=json_decode($json,true); // para array associativo // adicionei , true para tornar o array associativo// sem ele ele retorna um objeto.
				} else {
				  $dados=["usuarios"=>[]];
				}

				$dados['usuarios'][] = [
				  'nome' => $nome,
				  'email' => $email,
				  'senha' => $hashSenha,
				  'cpf' => $cpf,
				  'dataNascimento' => $dataNascimento,
				  'sexo' => $sexo,
				  'celular' => $celular,
				  'cep' => $cep,
				  'endereco' => $endereco,
				  'numero' => $numero,
				  'complemento' => $complemento,
				  'bairro' => $bairro,
				  'cidade' => $cidade,
				  'uf' => $uf,
				  'autorizacaoContato' => $autorizacaoContato,
				  'foto' => $caminhoFoto
				];

				$dadosemjson=json_encode($dados); //json string
				file_put_contents($filename,$dadosemjson);

			} catch (Exception $e) {
				$mensagemErros[] = "Não foi possivel gravar os dados: " . $e->getMessage();
				$erros = true;
			}
			//gravar foto
			if($caminhoFoto) {
				try {
					$status = move_uploaded_file($arquivoTemporario, $caminhoFoto);
				} catch (Exception $e) {
					$mensagemErros[] = "Não foi possivel gravar a foto: " . $e->getMessage();
				}
			}

			if(count($mensagemErros) <= 0) {
				header('Location: login.php?cadastro=true');
			}
		}

	}
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
    <title>Livraria Global - Registro</title>
    <style type="text/css">
      body {
        overflow: hidden;
      }

      .cadastro-main {
        height: 90%;
        width: 100%;
        position: absolute;
        overflow: auto;
      }

      .cadastro-main-form {
        background-color: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }

      #cadastro-enviar{
        position: relative;
        width: 50%;
        margin: 0 auto;
      }

    </style>
		<script language="javascript" type="text/javascript">
			function exibirSenha() {
				if(document.getElementById('mostrarSenha').checked) {
					document.getElementById('senha').type = 'text';
					document.getElementById('confirmacao').type = 'text';
				} else {
					document.getElementById('senha').type = 'password';
					document.getElementById('confirmacao').type = 'password';
				}
			}

			function mascaraCelular(num){
				var e = window.event;
				if(e.keyCode < 48)
				{
					e.preventDefault();
					return false;
				}

				if(e.keyCode > 57)
				{
					e.preventDefault();
					return false;
				}

				if (e.keyCode == 8)
				{
					return false;
				}


				if (num.value.length == 0){
					num.value = "(" + num.value; }
				if (num.value.length == 3){
					num.value = num.value + ")"; }
				if (num.value.length == 9){
					num.value = num.value + "-";}
			}

			function mascaraCpf(num) {
					var e = window.event;
	 				if(e.keyCode < 48)
					{
						e.preventDefault();
						return false;
					}

					if(e.keyCode > 57)
					{
						e.preventDefault();
						return false;
					}

					if (e.keyCode == 8)
					{
						return false;
					}

					if (num.value.length == 3) {
						num.value = num.value + '.';
					}
					if (num.value.length == 7) {
						num.value = num.value + '.';
					}
					if (num.value.length == 11) {
						num.value = num.value + '-';
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

			function mascaraCep(num) {
					var e = window.event;
	 				if(e.keyCode < 48)
					{
						e.preventDefault();
						return false;
					}

					if(e.keyCode > 57)
					{
						e.preventDefault();
						return false;
					}

					if (e.keyCode == 8)
					{
						return false;
					}

					if (num.value.length == 5) {
						num.value = num.value + '-';
					}
			}

			function validarDados() {
				if(!validarCpf(document.getElementById("cpf").value))
				{
					document.getElementById('av-cpf').innerText = 'CPF inválido';
					return false;
				}
				return true;
			}
		</script>
</head>
<body>
<?php include "header.php"; ?>
<section class="container-fluid cadastro-main">
    <div class="container cadastro-main-form">
    <center><h1>CADASTRE-SE</h1></center>
	<?php if(isset($mensagemErros)) { ?>
		<?php if(count($mensagemErros) > 0) { ?>
			<div class="alert alert-danger alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<ul>
				<?php foreach($mensagemErros as $msg) { ?>
				<li><?php echo $msg; ?></li>
				<?php } ?>
				</ul>
			</div>
		<?php } ?>
	<?php } ?>

    <form id="formCadastro" name="formCadastro" action="cadastro.php" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDados();">
        <div class="row">
          <div class="col-md-12 form-group">
            <label class="form-label-required" for="nome">Nome Completo:</label>
            <input type="text" class="form-control" name="nome" id="nome" maxlength="50" placeholder="Digite seu nome completo aqui" value="<?php echo(isset($nome) ? $nome : '') ?>" required />
						<span class="erro-form"><?php echo isset($erroNome) ? $erroNome : "";?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
            <label class="form-label-required" for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="Ex.: email@dominio.com" value="<?php echo(isset($email) ? $email : '') ?>" required />
						<span class="erro-form"><?php echo isset($erroEmail) ? $erroEmail : "";?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" maxlength="20" placeholder="Digite sua senha aqui" value="<?php echo(isset($senha) ? $senha : '') ?>"  required />
						<label><input type="checkbox" id="mostrarSenha" name="mostrarSenha" onclick="exibirSenha();" />Exibir senha</label>
						<span class="erro-form"><?php echo isset($erroSenha) ? $erroSenha : "";?></span>
          </div>
          <div class="col-md-6 form-group">
            <label class="form-label-required" for="confirmacao">Confirmar Senha:</label>
            <input type="password" class="form-control" id="confirmacao" name="confirmacao" maxlength="20" placeholder="Repita sua senha aqui" value="<?php echo(isset($confirmacao) ? $confirmacao : '') ?>"  required />
						<span class="erro-form"><?php echo isset($erroConfirmacao) ? $erroConfirmacao : "";?></span>
          </div>
        </div>
        <div class="row">
  		  <div class="col-md-4 form-group">
            <label class="form-label-required" for="cpf">CPF:</label>
						<!-- INPUT apos maxlength onkeypress="mascaraCpf(this);" -->
            <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" value="<?php echo(isset($cpf) ? $cpf : '') ?>" required />
			<span id="av-cpf" class="erro-form"><?php echo isset($erroCpf) ? $erroCpf : "";?></span>
          </div>
          <div class="col-md-4 form-group">
            <label class="form-label" for="dataNascimento">Data de nascimento:</label>
            <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?php echo(isset($dataNascimento) ? $dataNascimento : '') ?>" placeholder="dd/MM/yyyy" required />
						<span class="erro-form"><?php echo isset($erroDataNascimento) ? $erroDataNascimento : "";?></span>
          </div>
          <div class="col-md-4 form-group">
            <p class="form-label" for="sexo">Sexo:</p>
						<?php $sexo = isset($sexo) ? $sexo : 'M'; ?>
						<label for="sexoMasculino"><input type="radio" name="sexo" id="sexoMasculino" value="M" <?php echo $sexo === 'M' ? 'checked' : '';  ?> />Masculino</label>
						<label for="sexoFeminino"><input type="radio" name="sexo" id="sexoFeminino" value="F" <?php echo $sexo === 'F' ? 'checked' : '';  ?>/>Feminino</label>
					</div>
        </div>
        <div class="row">
		  <div class="col-md-4 form-group">
            <label class="form-label" for="celular">Celular:</label>
            <input type="text" class="form-control" name="celular" id="celular" maxlength="14" onkeypress="mascaraCelular(this);" value="<?php echo(isset($celular) ? $celular : '') ?>" />
						<span class="erro-form"><?php echo isset($erroCelular) ? $erroCelular : ""; ?></span>
          </div>
        </div>
        <div class="row">
  		  <div class="col-md-4 form-group">
            <label class="form-label" for="cep">CEP:</label>
            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" onkeypress="mascaraCep(this);" value="<?php echo(isset($cep) ? $cep : '') ?>" />
						<span class="erro-form"><?php echo isset($erroCep) ? $erroCep : "";?></span>
          </div>
          <div class="col-md-8 form-group">
            <label class="form-label" for="endereco">Endereço:</label>
            <input type="text" class="form-control" name="endereco" id="endereco" maxlength="50" value="<?php echo(isset($endereco) ? $endereco : '') ?>" />
          </div>
        </div>
        <div class="row">
  				<div class="col-md-2 form-group">
            <label class="form-label" for="numero">Número:</label>
            <input type="text" class="form-control" name="numero" id="numero" maxlength="10" value="<?php echo(isset($numero) ? $numero : '') ?>" />
          </div>
          <div class="col-md-5 form-group">
            <label class="form-label" for="complemento">Complemento:</label>
            <input type="text" class="form-control" name="complemento" maxlength="50" id="complemento" value="<?php echo(isset($complemento) ? $complemento : '') ?>" />
          </div>
          <div class="col-md-5 form-group">
            <label class="form-label" for="bairro">Bairro:</label>
            <input type="text" class="form-control" name="bairro" id="bairro" maxlength="50" value="<?php echo(isset($bairro) ? $bairro : '') ?>" />
          </div>
        </div>
        <div class="row">
		  	<div class="col-md-8 form-group">
            <label class="form-label" for="cidade">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" maxlength="50" value="<?php echo(isset($cidade) ? $cidade : '') ?>" />
          </div>
          <div class="col-md-4 form-group">
						<?php $uf = isset($uf) ? $uf : 'X'; ?>
            <label class="form-label" for="uf">Estado:</label>
            <select class="form-control" name="uf" id="uf">
							<option value="AC" <?php echo($uf === 'AC'  ? 'selected' : '') ?>>Acre</option>
							<option value="AL" <?php echo($uf === 'AL'  ? 'selected' : '') ?>>Alagoas</option>
							<option value="AP" <?php echo($uf === 'AP'  ? 'selected' : '') ?>>Amapá</option>
							<option value="AM" <?php echo($uf === 'AM'  ? 'selected' : '') ?>>Amazonas</option>
							<option value="BA" <?php echo($uf === 'BA'  ? 'selected' : '') ?>>Baia</option>
							<option value="CE" <?php echo($uf === 'CE'  ? 'selected' : '') ?>>Ceará</option>
							<option value="DF" <?php echo($uf === 'DF'  ? 'selected' : '') ?>>Distrito Federal</option>
							<option value="ES" <?php echo($uf === 'ES'  ? 'selected' : '') ?>>Espirito Santo</option>
							<option value="GO" <?php echo($uf === 'GO'  ? 'selected' : '') ?>>Goiás</option>
							<option value="MA" <?php echo($uf === 'MA'  ? 'selected' : '') ?>>Maranhão</option>
							<option value="MT" <?php echo($uf === 'MT'  ? 'selected' : '') ?>>Mato Grosso</option>
							<option value="MS" <?php echo($uf === 'MS'  ? 'selected' : '') ?>>Mato Grosso do Sul</option>
							<option value="MG" <?php echo($uf === 'MG'  ? 'selected' : '') ?>>Minas Gerais</option>
							<option value="PA" <?php echo($uf === 'PA'  ? 'selected' : '') ?>>Pará</option>
							<option value="PB" <?php echo($uf === 'PB'  ? 'selected' : '') ?>>Paraiba</option>
							<option value="PR" <?php echo($uf === 'PR'  ? 'selected' : '') ?>>Paraná</option>
							<option value="PE" <?php echo($uf === 'PE'  ? 'selected' : '') ?>>Pernambuco</option>
							<option value="PI" <?php echo($uf === 'PI'  ? 'selected' : '') ?>>Piauí</option>
							<option value="RJ" <?php echo($uf === 'RJ'  ? 'selected' : '') ?>>Rio de Janeiro</option>
							<option value="RN" <?php echo($uf === 'RN'  ? 'selected' : '') ?>>Rio Grande do Norte</option>
							<option value="RS" <?php echo($uf === 'RS'  ? 'selected' : '') ?>>Rio Grande do Sul</option>
							<option value="RO" <?php echo($uf === 'RO'  ? 'selected' : '') ?>>Rondônia</option>
							<option value="RR" <?php echo($uf === 'RR'  ? 'selected' : '') ?>>Roraima</option>
							<option value="SC" <?php echo($uf === 'SC'  ? 'selected' : '') ?>>Santa Catarina</option>
							<option value="SE" <?php echo($uf === 'SE'  ? 'selected' : '') ?>>Sergipe</option>
							<option value="SP" <?php echo(($uf === 'SP' || $uf === 'X')  ? 'selected' : '') ?>>São Paulo</option>
							<option value="TO" <?php echo($uf === 'TO'  ? 'selected' : '') ?>>Tocantins</option>
						</select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
						<label class="form-label-required" for="foto">Foto:</label>
						<input type="file" class="form-control" name="foto" id="foto" />
						<span class="erro-form"><?php echo isset($erroArquivo) ? $erroArquivo : "";?></span>
          </div>
          <div class="col-md-6 form-group">
            <br/>
            <label class="form-label" for="autorizacaoContato">
							<input type="checkbox" name="autorizacaoContato" id="autorizacaoContato" <?php echo(isset($autorizacaoContato) ? 'checked' : '') ?> />
							<span>Autorizo o envio de noticias e promoções da Livraria Global em meu e-mail</span>
						</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
		        <button id="cadastro-enviar" type="submit" class="btn btn-primary btn-block">Enviar</button>
						<br/>
						<?php if(isset($notificacao)) { ?>
							<div class="alert alert-success">
								<span><?php echo $notificacao;?></span>
							</div>
						<?php } ?>
          </div>
        </div>
        </form>
      </div>
    </section>

    <footer>

    </footer>
</body>

</html>
