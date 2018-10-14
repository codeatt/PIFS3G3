<?php

class Endereco {
  private $id;
  private $logradouro;
  private $numero;
  private $complemento;
  private $bairro;
  private $cidade;
  private $uf;
  private $cep;
  private $entrega;
  private $fiscal;
  private $ativo;

  public function __construct($id, $logradouro, $numero, $complemento, $bairro, $cidade, $cidade, $cidade, $entrega, $fiscal)
  {
    $this->id = $id;
    $this->logradouro = $logradouro;
    $this->numero = $numero;
    $this->complemento = $complemento;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->uf = $cidade;
    $this->cep = $cidade;
    $this->entrega = $entrega;
    $this->fiscal = $fiscal;
    $this->ativo = true;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getLogradouro()
  {
    return $this->logradouro;
  }
  public function getNumero()
  {
    return $this->numero;
  }
  public function getComplemento()
  {
    return $this->complemento;
  }
  public function getBairro()
  {
    return $this->bairro;
  }
  public function getCidade()
  {
    return $this->cidade;
  }
  public function getUf()
  {
    return $this->uf;
  }
  public function getCep()
  {
    return $this->cep;
  }
  public function getEntrega()
  {
    return $this->entrega;
  }
  public function getFiscal()
  {
    return $this->fiscal;
  }
  public function getAtivo()
  {
    return $this->ativo;
  }
}
