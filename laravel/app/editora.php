<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class editora extends Model
{
  protected $table = 'editora';
  protected $primaryKey = 'editora_id';
  protected $fillable = ['ativo', 'nome'];
}
