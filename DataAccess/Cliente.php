
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
  private $senha;
  private $confirmacao;

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

      $this->senha = isset($_POST["senha"]) ? $dados["senha"] : "";
      $this->confirmacao = isset($dados["confirmacao"]) ? $dados["confirmacao"] : "";

      $this->adicionarEndereco($endereco,$numero,$complemento,$bairro,$cidade,$uf,$cep,true,true);


  	  $this->autorizacaoEmail = isset($dados["autorizacaoContato"]) ? $dados["autorizacaoContato"] : "";
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

				if(!Funcoes::validarArquivo($nomeArquivo,array('png','jpg'))) {
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

	  if (strlen($this->senha) < '8') {
			$this->senha = "";
			$this->mensagemErros[] = "Deve ter no mínimo 8 caracteres";
	  }
	  elseif(!Funcoes::possuiNumeros($this->senha)) {
			$this->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos um número";
	  }
	  elseif(!Funcoes::possuiLetrasMaiusculas($this->senha)) {
			$this->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos uma letra maiuscula";
	  }
	  elseif(!Funcoes::possuiLetrasMinusculas($this->senha)) {
			$this->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos uma letra minuscula";
	  }
	  elseif(!Funcoes::possuiCaracterEspecialValido($this->senha)) {
			$this->senha = "";
			$this->mensagemErros[] = "Deve ter pelo menos um caracter especial: !@#$%&*-+.?";
	  }
	  else if ($this->confirmacao !== $this->senha) {
			$this->confirmacao = "";
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
    $this->autorizacaoEmail;
  }

  public function adicionarEndereco($logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $entrega, $fiscal)
  {
    $this->endereco = new Endereco(0, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $entrega, $fiscal);
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

      $this->IncluirCliente();
      if(isset($this->endereco))
      {
        $this->IncluirEndereco();
      }

      if(count($this->contatos) > 0)
      {
        $this->IncluirContatos();
      }
      $this->IncluirUsuario();

      parent::commit();
    } catch(PDOException $Exception) {
      parent::rollBack();
      return $Exception->getMessage();
    }
  }

  private function IncluirCliente() {
    try{
      $query = $this->db->prepare('insert into cliente (
        Nome,
        CPF,
        DataNascimento,
        Sexo,
        FotoUrl,
        FotoDescricao,
        AutorizaEmail,
        Ativo
      ) values (
        :Nome,
        :CPF,
        :DataNascimento,
        :Sexo,
        :FotoUrl,
        :FotoDescricao,
        :AutorizaEmail,
        :Ativo
      )');
      $query->bindValue(':Nome', $this->getNome());
      $query->bindValue(':CPF', $this->getCpf());
      $query->bindValue(':DataNascimento', $this->getDataNascimento());
      $query->bindValue(':Sexo', $this->getSexo());
      $query->bindValue(':FotoUrl', $this->getFotoUrl());
      $query->bindValue(':FotoDescricao', $this->getFotoDescricao());
      $query->bindValue(':AutorizaEmail', $this->getAutorizacaoEmail() ? 1 : 0);
      $query->bindValue(':Ativo', true);
      $query->execute();

      $this->clienteId = $this->db->lastInsertId();

    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir cliente: " . $Exception->getMessage());
    }
  }

  private function EditarCliente() {
    try{
      $query = $this->db->prepare('update cliente set
          Nome = :Nome,
          CPF = :CPF,
          DataNascimento = :DataNascimento,
          Sexo = :Sexo,
          FotoUrl = :FotoUrl,
          FotoDescricao = :FotoDescricao,
          AutorizaEmail = :AutorizaEmail,
          Ativo = :Ativo
        where
          ClienteId = :ClienteId');
      $query->bindValue(':Nome', $this->getNome());
      $query->bindValue(':CPF', $this->getCpf());
      $query->bindValue(':DataNascimento', $this->getDataNascimento());
      $query->bindValue(':Sexo', $this->getSexo());
      $query->bindValue(':FotoUrl', $this->getFotoUrl());
      $query->bindValue(':FotoDescricao', $this->getFotoDescricao());
      $query->bindValue(':AutorizaEmail', $this->getAutorizacaoEmail());
      $query->bindValue(':Ativo', true);
      $query->execute();
    }catch(PDOException $Exception) {
      throw new Exception("Erro ao alterar cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarCliente($id) {
    $query = $this->db->prepare('select * from cliente where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  private function IncluirEndereco()
  {
    try{

      $query = $this->db->prepare('insert into ClienteEndereco (
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

      $query->bindValue(':ClienteId',$this->getClienteId());
      $query->bindValue(':Logradouro',$this->endereco->getLogradouro());
      $query->bindValue(':Numero', $this->endereco->getNumero());
      $query->bindValue(':Complemento', $this->endereco->getComplemento());
      $query->bindValue(':Bairro', $this->endereco->getBairro());
      $query->bindValue(':Cidade', $this->endereco->getCidade());
      $query->bindValue(':UF', $this->endereco->getUf());
      $query->bindValue(':Entrega', $this->endereco->getEntrega() ? 1 : 0);
      $query->bindValue(':Fiscal', $this->endereco->getFiscal() ? 1 : 0);
      $query->bindValue(':Ativo', $this->endereco->getAtivo() ? 1 : 0);
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir endereco do cliente: " . $Exception->getMessage());
    }
  }

  private function AlterarEndereco()
  {
    try{

      $query = $this->db->prepare('update ClienteEndereco set
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

      $query->bindValue(':ClienteId',$this->getClienteId());
      $query->bindValue(':Logradouro',$this->endereco->getLogradouro());
      $query->bindValue(':Numero', $this->endereco->getNumero());
      $query->bindValue(':Complemento', $this->endereco->getComplemento());
      $query->bindValue(':Bairro', $this->endereco->getBairro());
      $query->bindValue(':Cidade', $this->endereco->getCidade());
      $query->bindValue(':UF', $this->endereco->getUf());
      $query->bindValue(':Entrega', $this->endereco->getEntrega() ? 1 : 0);
      $query->bindValue(':Fiscal', $this->endereco->getFiscal() ? 1 : 0);
      $query->bindValue(':Ativo', $this->endereco->getAtivo() ? 1 : 0);
      $query->bindValue(':ClienteEnderecoId',$this->endereco->getId());
      $query->execute();
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao alterar endereco do cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarEnderecos($clienteId) {
    $query = $this->db->prepare('select * from ClienteEndereco where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  private function IncluirContatos()
  {
    try{
      $query = $this->db->prepare('insert into ClienteContato (
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

      foreach ($this->contatos as $contato) {
        $query->bindValue(':ClienteId',$this->getClienteId());
        $query->bindValue(':TipoContatoId',$contato->getTipoContatoId());
        $query->bindValue(':Contato', $contato->getContato());
        $query->bindValue(':Ativo', true);
        $query->execute();
      }
    } catch(PDOException $Exception) {
      throw new Exception("Erro ao incluir contato do cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarContatos() {
    $query = $this->db->prepare('select * from ClienteContato where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$this->clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

  public function IncluirUsuario()
  {
    try{
      $hashSenha = password_hash($this->senha,PASSWORD_DEFAULT);
      $query = $this->db->prepare('insert into Usuario (
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
