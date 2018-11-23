<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_pedido extends Model
{
  protected $table = 'item_pedido';
  protected $primaryKey = 'id_item_pedido';
  protected $fillable = ['quantidade', 'fk_pedido_id', 'livro_livro_id'];
}
