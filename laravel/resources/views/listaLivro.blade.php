@extends('layouts.master')

@section('content')
<div class="container">
  <div class="col-xs-12">
    <h1>Livros</h1>
  </div>
  @foreach ($lista as $livro)
  <div class="livro_item col-md-3">
    <img src="{{ url("storage/livros/{$livro->fotoUrl}") }}" style="width: 50px; height: 50px;" class="img-responsive" alt="{{$livro->Titulo}}">
    <h3> <a href="/livros/{{$livro->livro_id}}">{{$livro->titulo}}</a></h3>
    <p>{{$livro->autor}}</p>
    <p>Edição {{$livro->edicao}}</p>
    <p class="preco">{{$livro->preco}}</p>
  </div>
  @endforeach
</div>
@endsection
