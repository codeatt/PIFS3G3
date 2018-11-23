<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
  protected $table = 'endereco';
  protected $primaryKey = 'end_id';
  protected $fillable = ['cep', 'bairro', 'numero', 'complemento', 'endereco_de_entrega',
  'endereco', 'fk_usuario_id', 'fk_uf_id', 'fk_cidades_id'];
}
