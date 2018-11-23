<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagamento extends Model
{
  protected $table = 'pagamento';
  protected $primaryKey = 'pagamento_id';
  protected $fillable = ['n_parcelas', 'id_transacao', 'horario_transacao',
   'fk_metodo_pagamento_id'];
}
