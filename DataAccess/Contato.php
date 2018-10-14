<?php

class Contato {

  public const TELEFONE_RESIDENCIAL = 1;
  public const TELEFONE_COMERCIAL = 2;
  public const EMAIL = 3;

  private $id;
  private $tipoContatoId;
  private $contato;
  private $ativo;

  public function __construct($id, $tipoContatoId, $contato, $ativo)
  {
    $this->id = $id;
    $this->tipoContatoId = $tipoContatoId;
    $this->contato = $contato;
    $this->ativo = true;
  }

  public function getTipoContatoId()
  {
    return $this->tipoContatoId;
  }
  public function getContato()
  {
    return $this->contato;
  }
  public function getContato()
  {
    return $this->contato;
  }

}
