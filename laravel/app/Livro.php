<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';
    protected $primaryKey = 'LivroId';

    protected $fillable = [
      'Titulo',
      'Autor',
      'Preco',
      'QtdEstoque',
      'Edicao',
      'Ativo',
      'EditoraId',
      'CategoriaId'
    ];
}
