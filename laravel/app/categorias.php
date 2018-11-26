<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'categoria_id';
    protected $fillable = ['Ativo', 'Descricao'];

}
