@extends('layouts.master')

@section('content')
<div class="container livro-detalhe">

  <div class="col-md-4">
    <img src="{{ url("storage/livros/{$livro->fotoUrl}") }}" class="img-responsive" alt="{{$livro->titulo}}">
  </div>
  <div class="col-md-8">
    <h1>{{$livro->titulo}}</h1>
    <p>Edição: {{$livro->edicao}}</p>
    <p>Autor: {{$livro->autor}}</p>
    <p>Editora: {{$editoraNome}}</p>
    <p>Categoria: {{$categoriaNome}}</p>

    <p class="preco">R$ {{$livro->preco}}</p>
    <button type="button" name="button" class="btn btn-primary">COMPRAR</button>
    <br><br><h3>Sinopse</h3><br>
    <div class="col-md-6">
    <p> {{$livro->sinopse}} </p>
    </div>

  </div>
</div>
@endsection
