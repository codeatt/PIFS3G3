@extends('layouts.master')

@section('content')
<div class="container">


<h1> Editar Produtos </h1>
<form method="post" action='/livros/editar/{{$resultado->livro_id}}'>
  <div class="col-md-6">
    @csrf

    {{method_field('PUT')}}
    <label for="">Título </label><br>
    <input type="text" name="titulo" value="{{ $resultado->titulo }}"><br><br>

    <label for="">Autor</label><br>
    <input type="text" name="autor" value="{{$resultado->autor}}"><br><br>

    <label for="">Preco</label><br>
    <input type="text" name="preco" value="{{$resultado->preco}}"><br><br>

    <label for="">QtdEstoque</label><br>
    <input type="text" name="QtdEstoque" value="{{$resultado->QtdEstoque}}"><br><br>

    <label for="">Edicao</label><br>
    <input type="text" name="edicao" value="{{$resultado->edicao}}"><br><br>

    <label for="">Ativo</label><br>
    <input type="text" name="ativo" value="{{$resultado->ativo}}"><br><br>

    <label for="">EditoraId</label><br>
    <input type="text" name="EditoraId" value="{{$resultado->EditoraId}}"><br><br>

    <label for="">CategoriaId</label><br>
    <input type="text" name="CategoriaId" value="{{$resultado->CategoriaId}}"><br><br>
  </div>
  <div class="col-md-6">
    <label for="">Foto</label><br>
    <img src="{{ url("storage/livros/{$resultado->fotoUrl}") }}" class="img-responsive" alt="">
    <input type="file" name="fotoUrl"><br><br>
  </div>

  <input type="submit" name="" value="Enviar">
</form>

</div>

@stop
