
<?php
require 'Endereco.php';
require 'Contato.php';

class Cliente {
  private $clienteId;
  private $nome;
  private $cpf;
  private $dataNascimento;
  private $sexo;
  private $fotoUrl;
  private $fotoDescricao;
  private $autorizacaoEmail;
  private $ativo;
  private $enderecos;
  private $contatos;

  public function setClienteId($clienteId)
  {
    $this->clienteId = $clienteId;
  }
  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  public function setCpf($cpf)
  {
    $this->cpf = $cpf;
  }
  public function setDataNascimento($dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
  }
  public function setSexo($sexo)
  {
    $this->sexo = ($sexo === 'F') ? 'F' : 'M';
  }
  public function setFoto($fotoUrl, $fotoDescricao)
  {
    $this->fotoUrl = $fotoUrl;
    $this->fotoDescricao = $fotoDescricao;
  }
  public function setAutorizacaoEmail($autoriza)
  {
    $this->autorizacaoEmail = false;
    if($autoriza)
      $this->autorizacaoEmail = true;
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

  public function adicionarEndereco($logradouro, $numero, $complemento, $bairro, $cidade, $cidade, $cidade, $entrega, $fiscal)
  {
    this->enderecos = new Endereco($logradouro, $numero, $complemento, $bairro, $cidade, $cidade, $cidade, $entrega, $fiscal);
  }

  public function getEnderecos()
  {
    return this->enderecos;
  }

  public function adicionarTelefone($contato)
  {
    this->contatos = new Contato(0, Contato::TELEFONE_RESIDENCIAL, $contato, true);
  }

  public function adicionarEmail($contato)
  {
    this->contatos = new Contato(0, Contato::EMAIL, $contato, true);
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

}

?>
