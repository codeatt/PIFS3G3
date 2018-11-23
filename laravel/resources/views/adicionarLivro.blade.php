@extends('layouts.master')

@section('content')
<div class="container">
<h1> Adicionar Produtos </h1>
<form method="post" enctype="multipart/form-data">
  @csrf

  {{method_field('POST')}}
  <label for="">Título </label><br>
  <input class="form-control" type="text" name="titulo" value=""><br><br>

  <label for="">Autor</label><br>
  <input class="form-control" type="text" name="autor" value=""><br><br>

  <label for="">Preco</label><br>
  <input class="form-control" type="text" name="preco" value=""><br><br>

  <label for="">QtdEstoque</label><br>
  <input class="form-control" type="text" name="QtdEstoque" value=""><br><br>

  <label for="">Edicao</label><br>
  <input class="form-control" type="text" name="edicao" value=""><br><br>

  <label for="">Ativo</label><br>
  <input type="text" name="ativo" value=""><br><br>

  <label for="">EditoraId</label><br>
  <select class="form-control" name="fk_editora_id">
    @foreach($editoras as $editora)
      <option value="{{$editora->editora_id}}">{{$editora->nome}}</option>
    @endforeach
  </select>

  <label for="">CategoriaId</label><br>
  <select class="form-control" name="fk_categoria_id">
    @foreach ($categorias as $categoria)
    <option value="{{$categoria->categoria_id}}">{{$categoria->descricao}}</option>
    @endforeach

  </select>

  <input type="file" name="foto-livro">

  <input type="submit" name="" value="Enviar">
</form>

</div>
@stop
