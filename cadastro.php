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
    <title>Cadastro de Clientes</title>
</head>
<body>

    <?php include "header.php"; ?>

    <section class="container-fluid cadastro-main" id="faqtitle1">
        <div class="container cadastro-main-form" >
            <h1>CADASTRE-SE</h1>
            <form id="formCadastro" name="formCadastro" action="cadastro.php" method="post" >
                <div class="form-group">
                    <label class="form-label-required" for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome" required>
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@dominio.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="form-group">
                    <label class="form-label-required" for="confirmacao">Confirmar Senha:</label>
                    <input type="password" class="form-control" id="confirmacao" name="confirmacao" required>
                </div>
                <div class="checkbox">
                    <label class="form-label">
                      <input type="checkbox" name="autorizacaoContato" id="autorizacaoContato" />Autorizo o envio de noticias e promoções em meu e-mail</label>
                </div>
                <div id="enviar">
                  <button type="submit" class="btn btn-primary btn-block">
                      <span class="glyphicon glyphicon-ok-sign"></span>Enviar
                  </button>
                </div>
            </form>
        </div>
    </section>

    <footer>

    </footer>
</body>

</html>
