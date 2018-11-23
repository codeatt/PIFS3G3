<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
  protected $table = 'pedido';
  protected $primaryKey = 'pedido_id';
  protected $fillable = ['data_pedido', 'subtotal', 'desconto', 'total',
'data_entregue', 'codigo_de_rastreio', 'forma_de_pagamento_id', 'status_id',
'status_data', 'condicao_de_pagamento', 'fk_usuario_id', 'fk_pagamento_id'
'fk_status_id'];
}
