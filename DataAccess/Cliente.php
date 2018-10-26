
<?php

class Cliente extends BaseData {
  private $clienteId;
  private $nome;
  private $cpf;
  private $dataNascimento;
  private $sexo;
  private $fotoUrl;
  private $fotoDescricao;
  private $autorizacaoEmail;
  private $ativo;
  private $endereco;
  private $contatos;
  private $usuario;

  public function __construct($dados)
  {
    if($dados) {
      $this->clienteId = isset($dados["id"]) ? $dados["id"] : 0;
  	  $this->nome = isset($dados["nome"]) ? $dados["nome"] : "";
  	  $this->email = isset($dados["email"]) ? $dados["email"] : "";
  	  $this->cpf = isset($dados["cpf"]) ? $dados["cpf"] : "";
  	  $this->dataNascimento = isset($dados["dataNascimento"]) ? $dados["dataNascimento"] : "";
  	  $this->sexo = isset($dados["sexo"]) ? $dados["sexo"] : "";
  	  $this->celular = isset($dados["celular"]) ? $dados["celular"] : "";


  	  $endereco = isset($dados["endereco"]) ? $dados["endereco"] : "";
  	  $numero = isset($dados["numero"]) ? $dados["numero"] : "";
  	  $complemento = isset($dados["complemento"]) ? $dados["complemento"] : "";
  	  $bairro = isset($dados["bairro"]) ? $dados["bairro"] : "";
  	  $cidade = isset($dados["cidade"]) ? $dados["cidade"] : "";
  	  $uf = isset($dados["uf"]) ? $dados["uf"] : "";
      $cep = isset($dados["cep"]) ? $dados["cep"] : "";

      $senha = isset($_POST["senha"]) ? $dados["senha"] : "";
      $confirmacao = isset($dados["confirmacao"]) ? $dados["confirmacao"] : "";
      $this->usuario = new Usuario($this->email, $senha, $confirmacao);

      $this->adicionarEndereco($endereco,$numero,$complemento,$bairro,$cidade,$cep,$uf,true,true);


  	  $this->autorizacaoContato = isset($dados["autorizacaoContato"]) ? $dados["autorizacaoContato"] : "";
    }

    $this->mensagemErros = [];

    parent::__construct();
  }

  public function __destruct()
  {
    parent::__destruct();
  }

  public function Upload($arquivoFoto)
  {
    //validar arquivo UPLOAD FOTO
		$this->caminhoFoto = "";
		if($arquivoFoto) {
		 	if($arquivoFoto["foto"]["error"] == UPLOAD_ERR_OK) {
				$nomeArquivo = $arquivoFoto["foto"]["name"];

        $this->arquivoTemporario = $arquivoFoto["foto"]["tmp_name"];
				$this->caminhoFoto = "foto/$nomeArquivo";

				if(!validarArquivo($nomeArquivo,array('png','jpg'))) {
					$mensagemErros[] = "Somente arquivos do tipo PNG ou JPG";
				}
		 	}

      if($caminhoFoto) {
    		try {
    			$status = move_uploaded_file($arquivoTemporario, $caminhoFoto);
    		} catch (Exception $e) {
    			$mensagemErros[] = "Não foi possivel gravar a foto: " . $e->getMessage();
    		}
    	}
		}
  }

  public function ValidarDados()
  {
    if (empty($this->nome)) {
			$this->mensagemErros[] = "Nome não informado";
	  }
	  else if(strpos($this->nome, ' ') === false || strlen($this->nome) < 10) {
			$this->nome = "";
			$this->mensagemErros[] = "Nome inválido";
	  }

	  if(empty($this->email)) {
			$this->email = "";
			$this->mensagemErros[] = "E-mail não informado";
	  }
	  else if (!Funcoes::validarEmail($this->email)) {
			$this->email = "";
			$this->mensagemErros[] = "E-mail inválido";
	  }

	  if (strlen($this->usuario->senha) < '8') {
			$this->usuario->senha = "";
			$this->mensagemErros[] = "Deve ter no mínimo 8 caracteres";
	  }
	  elseif(!Funcoes::possuiNumeros($this->senha)) {
			$this->usuario->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos um número";
	  }
	  elseif(!Funcoes::possuiLetrasMaiusculas($this->usuario->senha)) {
			$this->usuario->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos uma letra maiuscula";
	  }
	  elseif(!Funcoes::possuiLetrasMinusculas($this->usuario->senha)) {
			$this->usuario->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos uma letra minuscula";
	  }
	  elseif(!Funcoes::possuiCaracterEspecialValido($this->usuario->senha)) {
			$this->usuario->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos um caracter especial: !@#$%&*-+.?";
	  }
	  else if ($this->usuario->confirmacao !== $this->usuario->senha) {
			$this->usuario->confirmacao = "";
			$this->mensagemErros[] = "As senhas informadas devem ser iguais";
	  }

	  if(empty($this->cpf)) {
			$this->cpf = "";
			$this->mensagemErros[] = "CPF não informado";
	  }
	  // else if(validarCPF($cpf)) {
		// 	$mensagemErros[] = "CPF inválido";
	  // }

	  if(empty($this->dataNascimento)) {
			$this->dataNascimento = "";
			$this->mensagemErros[] = "Data não informada";
	  } else if(!Funcoes::validarData($this->dataNascimento)) {
			$this->dataNascimento = "";
			$this->mensagemErros[] = "Data inválida";
	  }

	  if(!empty($this->celular)) {
		  if(!Funcoes::validarTelefone($this->celular)) {
			$this->celular = "";
			$this->mensagemErros[] = "Celular inválido";
		  }
	  }

	  if(!empty($this->cep)) {
		  if(!Funcoes::validarCEP($this->cep)) {
  			$this->cep = "";
  			$this->mensagemErros[] = "CEP inválido";
		  }
	  }
  }




  public function getClienteId()
  {
    return $this->clienteId;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getCpf()
  {
    return $this->cpf;
  }
  public function getDataNascimento()
  {
    return $this->dataNascimento;
  }
  public function getSexo()
  {
    return $this->sexo;
  }
  public function getFotoUrl()
  {
    return $this->fotoUrl;
  }
  public function getFotoDescricao()
  {
    return $this->fotoDescricao;
  }
  public function getAutorizacaoEmail()
  {
    return $this->autorizacaoEmail;
  }

  public function adicionarEndereco($logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $entrega, $fiscal)
  {
    $this->endereco = new Endereco($logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $entrega, $fiscal);
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function adicionarTelefone($contato)
  {
    $this->contatos[] = new Contato(0, Contato::TELEFONE_RESIDENCIAL, $contato, true);
  }

  public function adicionarEmail($contato)
  {
    $this->contatos[] = new Contato(0, Contato::EMAIL, $contato, true);
  }

  public function getTelefoneResidencial()
  {
    $resultado = null;
    foreach ($this->contatos as $contato) {
      if($contato->tipoContatoId === Contato::TELEFONE_RESIDENCIAL)
      {
        $resultado = $contato;
        break;
      }
    }
    return $resultado;
  }

  public function getEmail()
  {
    $resultado = null;
    foreach ($this->contatos as $contato) {
      if($contato->tipoContatoId === Endereco::EMAIL)
      {
        $resultado = $contato;
        break;
      }
    }
    return $resultado;
  }


  public function CadastrarCliente()
  {
    try{
      parent::beginTransaction();

      $this->clienteId = $this->IncluirCliente();

      if(isset($cliente->endereco))
      {
        $this->IncluirEndereco($this->clienteId, $this->endereco);
      }

      if(count($cliente->contatos) > 0)
      {
        foreach ($cliente->contatos as $contato) {
          $this->IncluirContato($cliente->clienteId, $contato);
        }
      }
      $this->IncluirUsuario();

      parent::commit();
    } catch(PDOException $Exception) {
      parent::rollBack();
      return $Exception->getMessage();
    }
  }

  private function IncluirCliente($cliente) {
    $id = 0;
    try{
      $query = $db->prepare('insert into cliente (
        Nome,
        CPF,
        DataNascimento,
        Sexo,
        FotoUrl,
        FotoDescricao,
        AutoriyacaoEmail,
        Ativo
      ) values (
        :Nome,
        :CPF,
        :DataNascimento,
        :Sexo,
        :FotoUrl,
        :FotoDescricao,
        :AutorizacaoEmail,
        :Ativo
      )');
      $query->bindValue(':Nome', $cliente->getNome());
      $query->bindValue(':CPF', $cliente->getCpf());
      $query->bindValue(':Sexo', $cliente->getSexo());
      $query->bindValue(':FotoUrl', $cliente->getFotoUrl());
      $query->bindValue(':FotoDescricao', $cliente->getFotoDescricao());
      $query->bindValue(':AutorizacaoEmail', $cliente->getAutorizacaoEmail());
      $query->bindValue(':Ativo', true);
      $query->execute();

      $id = $db->lastInsertId();

    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir cliente: " . $Exception->getMessage());
    }
  }

  private function EditarCliente($cliente) {
    try{
      $query = $db->prepare('update cliente set
          Nome = :Nome,
          CPF = :CPF,
          DataNascimento = :DataNascimento,
          Sexo = :Sexo,
          FotoUrl = :FotoUrl,
          FotoDescricao = :FotoDescricao,
          AutorizacaoEmail = :AutoriyacaoEmail,
          Ativo = :Ativo
        where
          ClienteId = :ClienteId');
      $query->bindValue(':Nome', $cliente->getNome());
      $query->bindValue(':CPF', $cliente->getCpf());
      $query->bindValue(':Sexo', $cliente->getSexo());
      $query->bindValue(':FotoUrl', $cliente->getFotoUrl());
      $query->bindValue(':FotoDescricao', $cliente->getFotoDescricao());
      $query->bindValue(':AutorizacaoEmail', $cliente->getAutorizacaoEmail());
      $query->bindValue(':Ativo', true);
      $query->execute();
    }catch(PDOException $Exception) {
      throw new Exception("Erro ao alterar cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarCliente($id) {
    $query = $db->prepare('select * from cliente where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  private function IncluirEndereco($clienteId, $endereco)
  {
    try{
      $query = $db->prepare('insert into ClienteEndereco (
        ClienteId,
        Logradouro,
        Numero,
        Complemento,
        Bairro,
        Cidade,
        UF,
        Entrega,
        Fiscal,
        Ativo
      ) values (
        :ClienteId,
        :Logradouro,
        :Numero,
        :Complemento,
        :Bairro,
        :Cidade,
        :UF,
        :Entrega,
        :Fiscal,
        :Ativo
      )');

      $query->bindValue(':ClienteId',$clienteId);
      $query->bindValue(':Logradouro',$endereco->logradouro);
      $query->bindValue(':Numero', $endereco->numero);
      $query->bindValue(':Complemento', $endereco->complemento);
      $query->bindValue(':Bairro', $endereco->bairro);
      $query->bindValue(':Cidade', $endereco->cidade);
      $query->bindValue(':UF', $endereco->uf);
      $query->bindValue(':Entrega', $endereco->entrega);
      $query->bindValue(':Fiscal', $endereco->fiscal);
      $query->bindValue(':Ativo', $endereco->ativo);
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir endereco do cliente: " . $Exception->getMessage());
    }
  }

  private function AlterarEndereco($clienteId, $endereco)
  {
    try{
      $query = $db->prepare('update ClienteEndereco set
        Logradouro = :Logradouro,
        Numero = :Numero,
        Complemento = :Complemento,
        Bairro = :Bairro,
        Cidade = :Cidade,
        UF = :UF,
        Entrega = :Entrega,
        Fiscal = :Fiscal,
        Ativo = :Ativo
      where
        ClienteEnderecoId = :ClienteEnderecoId');

      $query->bindValue(':Logradouro',$endereco->logradouro);
      $query->bindValue(':Numero', $endereco->numero);
      $query->bindValue(':Complemento', $endereco->complemento);
      $query->bindValue(':Bairro', $endereco->bairro);
      $query->bindValue(':Cidade', $endereco->cidade);
      $query->bindValue(':UF', $endereco->uf);
      $query->bindValue(':Entrega', $endereco->entrega);
      $query->bindValue(':Fiscal', $endereco->fiscal);
      $query->bindValue(':Ativo', $endereco->ativo);
      $query->bindValue(':ClienteEnderecoId',$endereco->id);
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao alterar endereco do cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarEnderecos($clienteId) {
    $query = $db->prepare('select * from ClienteEndereco where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  private function IncluirContato($clienteId, $contato)
  {
    try{
      $query = $db->prepare('insert into ClienteContato (
        ClienteId,
        TipoContatoId,
        Contato,
        Ativo
      ) values (
        :ClienteId,
        :TipoContatoId,
        :Contato,
        :Ativo
      )');

      $query->bindValue(':ClienteId',$clienteId);
      $query->bindValue(':TipoContatoId',$contato->tipoContatoId);
      $query->bindValue(':Contato', $contato->contato);
      $query->bindValue(':Ativo', $contato->ativo);
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir contato do cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarContatos() {
    $query = $db->prepare('select * from ClienteContato where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$this->clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  public function IncluirUsuario()
  {
    try{
      $hashSenha = password_hash($this->senha,PASSWORD_DEFAULT);
      $query = $db->prepare('insert into Usuario (
        ClienteId,
        Login,
        Senha,
        Ativo
      ) values (
        :ClienteId,
        :Login,
        :Senha,
        :Ativo
      )');

      $query->bindValue(':ClienteId',$this->clienteId);
      $query->bindValue(':Login',$this->getEmail());
      $query->bindValue(':Senha', $hashSenha);
      $query->bindValue(':Ativo', true);
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir contato do cliente: " . $Exception->getMessage());
    }



  }

}

?>
