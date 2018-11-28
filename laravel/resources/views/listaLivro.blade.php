@extends('layouts.master')

@section('content')
<div class="container lista-livro">
  <div class="col-xs-12">
    <h1>TODOS OS PRODUTOS</h1>
  </div>
  @foreach ($lista as $livro)
  <div class="livro-item col-md-3 col-sm-6 col-xs-12">
    <div class="foto-livro" style="background-image: url('{{ url("storage/livros/{$livro->fotoUrl}") }}')" title="{{$livro->Titulo}}">
    </div>
    <h3> <a href="/livros/{{$livro->livro_id}}">{{$livro->titulo}}</a></h3>
    <p>Autor: {{$livro->autor}}</p>
    <p class="preco">R${{$livro->preco}}</p>
    <a class="btn btn-primary" href="/livros/editar/{{$livro->livro_id}}">Editar</a>
    <a class="btn btn-primary" href="/livros/excluir/{{$livro->livro_id}}">Excluir</a>
  </div>
  @endforeach

  <div class="col-xs-12">
    {{ $lista->links() }}
  </div>
</div>
@endsection
