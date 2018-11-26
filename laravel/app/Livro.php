<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
  protected $table = 'livro';
  protected $primaryKey = 'livro_id';
  protected $fillable = ['titulo', 'autor', 'preco', 'QtdEstoque',
'edicao', 'ativo', 'EditoraId', 'CategoriaId', 'fotoUrl'];
  public $timestamps = false;
}
