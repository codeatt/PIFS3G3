<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_pedido extends Model
{
  protected $table = 'status_pedido';
  protected $primaryKey = 'status_id';
  protected $fillable = ['nome'];
}
