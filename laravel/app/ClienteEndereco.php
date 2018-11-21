<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteEndereco extends Model
{
    protected $table = 'ClienteEndereco';
    protected $primaryKey = 'ClienteEnderecoId';
    protected $fillable = ['Logradouro','Numero','Complemento','Bairro','Cidade','UF','CEP','Entrega','Fiscal','Ativo'];
    public $timestamps = false;
}
