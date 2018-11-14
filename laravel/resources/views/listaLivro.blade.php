@extends('layouts.master')

@section('content')
    <div class="container">
      <h1>Lista Livro </h1>
          @foreach($listaLivros as $livro)
            <p>
              Titulo: {{$livro->Titulo}}
              Autor: {{$livro->Autor}}
              Preço: {{$livro->Preco}}
              Quantidade de Estoque: {{$livro->QtdEstoque}}
              Edição: {{$livro->Edicao}}
              Ativo: {{$livro->Ativo}}
              EditoraId: {{$livro->EditoraId}}
              CategoriaId: {{$livro->CategoriaId}}
            </p>
          @endforeach
  </div>
@endsection
