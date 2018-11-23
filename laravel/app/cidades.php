<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cidades extends Model
{
  protected $table = 'cidades';
  protected $primaryKey = 'cidade_id';
  protected $fillable = ['nome', 'ddd', 'fk_uf_id'];
}
