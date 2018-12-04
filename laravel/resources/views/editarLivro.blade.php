@extends('layouts.master')

@section('content')
<div class="container">


<h1> Editar Livros </h1>
<form method="post" action='/livros/editar/{{$resultado->livro_id}}'  enctype="multipart/form-data">
  <div class="col-md-6">
    @csrf

    {{method_field('PUT')}}
    <label for="">Título </label><br>
    <input class="form-control" type="text" name="titulo" value="{{ $resultado->titulo }}"><br>

    <label for="">Autor</label><br>
    <input class="form-control" type="text" name="autor" value="{{$resultado->autor}}"><br>

    <label for="">Preco</label><br>
    <input class="form-control" type="text" name="preco" value="{{$resultado->preco}}"><br>

    <label for="">QtdEstoque</label><br>
    <input class="form-control" type="text" name="QtdEstoque" value="{{$resultado->QtdEstoque}}"><br>

    <label for="">Edicao</label><br>
    <input class="form-control" type="text" name="edicao" value="{{$resultado->edicao}}"><br>

    <label for="">Ativo</label><br>
    <input class="form-control" type="text" name="ativo" value="{{$resultado->ativo}}"><br>

    <label for="">EditoraId</label><br>
    <input class="form-control" type="text" name="EditoraId" value="{{$resultado->EditoraId}}"><br>

    <label for="">CategoriaId</label><br>
    <input class="form-control" type="text" name="CategoriaId" value="{{$resultado->CategoriaId}}"><br>

    <label for="">Sinopse</label><br>
    <input class="form-control" type="text" name="sinopse" value="{{$resultado->sinopse}}" maxlength="500"><br>
  </div>
  <div class="col-md-6">
    <label for="">Foto</label><br>
    <input class="form-control" type="file" name="foto"><br><br>
    <img src="{{url("storage/livros/{$resultado->fotoUrl}")}}" class="img-responsive" alt="">
  </div>

  <div class="col-xs-12">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>

</div>

@stop
