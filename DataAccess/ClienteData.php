<?php
require 'Endereco.php';
require 'Cliente.php';
require 'BaseData.php';

class ClienteData extends BaseData {

  public function __construct()
  {
    parent::__construct();
  }

  public function __destruct()
  {
    parent::__destruct();
  }

  public function CriarNovoCliente($cliente)
  {
    try{
      parent::beginTransaction();
      $this->IncluirCliente();
      if(count($cliente->enderecos) > 0)
      {
        foreach ($cliente->enderecos as $endereco) {
          $this->IncluirEndereco($cliente->clienteId, $endereco);
        }
      }
      if(count($cliente->contatos) > 0)
      {
        foreach ($cliente->contatos as $contato) {
          $this->IncluirContato($cliente->clienteId, $contato);
        }
      }
      parent::commit();
    } catch(PDOException $Exception) {
      parent::rollBack();
      return $Exception->getMessage();
    }
  }

  private function IncluirCliente($cliente) {
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

  private function AlterarContato($contato)
  {
    try{
      $query = $db->prepare('update ClienteContato set
        Contato = :Contato,
        Ativo = :Ativo
      where
        ClienteContatoId = :ClienteContatoId');

      $query->bindValue(':Contato',$contato->contato);
      $query->bindValue(':Ativo', $contato->ativo);
      $query->bindValue(':ClienteEnderecoId',$contato->id);
      $query->execute();
    }catch( PDOException $Exception ) {
      throw new Exception("Erro ao alterar contato do cliente: " . $Exception->getMessage());
    }
  }

  public function ConsultarContatos($clienteId) {
    $query = $db->prepare('select * from ClienteContato where clienteId = :clienteId');
    $query->bindValue(':ClienteId',$clienteId);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_NUM);
    return $results;
  }

}
?>
