@extends('layouts.master')

@section('content')
    <div class="container">
      <div class="col-xs-12">
        <h1>Livros</h1>
      </div>
          @foreach($listaLivros as $livro)
            <div class="livro_item col-md-3">
              <img src="/livros/{{$livro->imagem}}" class="img-responsive" alt="{{$livro->titulo}}">
              <h3> {{$livro->titulo}}</h3>
              <p>{{$livro->autor}}</p>
              <p>{{$livro->edicao}}</p>
              <p class="preco">{{$livro->preco}}</p>
            </div>
          @endforeach
  </div>
@endsection
