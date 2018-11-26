@extends('layouts.master')

@section('content')
<div class="container">

  <div class="col-md-4">
    <img src="{{ url("storage/livros/{$livro->fotoUrl}") }}" class="img-responsive" alt="{{$livro->titulo}}">
  </div>
  <div class="col-md-8">
    <h1>{{$livro->titulo}}</h1>
    <p>Autor: {{$livro->autor}}</p>
    <p>Preço: {{$livro->preco}}</p>
    <p>Edição: {{$livro->edicao}}</p>
    <p>Editora: {{$editoraNome}}</p>
    <p>Categoria: {{$categoriaNome}}</p>
  </div>
</div>
@endsection
