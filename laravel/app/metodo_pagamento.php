<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metodo_pagamento extends Model
{
  protected $table = 'metodo_pagamento';
  protected $primaryKey = 'metodo_pagamento_id';
  protected $fillable = ['nome'];
}
