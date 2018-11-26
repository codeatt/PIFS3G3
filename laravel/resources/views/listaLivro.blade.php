@extends('layouts.master')

@section('content')
<div class="container">
  <div class="col-xs-12">
    <h1>Livros</h1>
  </div>
  @foreach ($lista as $livro)
  <div class="livro_item col-md-3">
    <img src="{{ url("storage/livros/{$livro->fotoUrl}") }}" style="width: 50px; height: 50px;" class="img-responsive" alt="{{$livro->Titulo}}">
    <h3> {{$livro->Titulo}}</h3>
    <p>{{$livro->Autor}}</p>
    <p>{{$livro->Edicao}}</p>
    <p class="preco">{{$livro->Preco}}</p>
  </div>
  @endforeach
</div>
@endsection
