@extends('layouts.master')

@section('content')
<div class="container">
<h1> Adicionar Produtos </h1>
<form method="post" enctype="multipart/form-data">
  @csrf

  {{method_field('POST')}}

  <label for="titulo">Título </label><br>
  <input class="form-control" type="text" name="titulo" value="" required><br><br>

  <label for="autor">Autor</label><br>
  <input class="form-control" type="text" name="autor" value="" required><br><br>

  <label for="preco">Preco</label><br>
  <input class="form-control" type="text" name="preco" value="" required><br><br>

  <label for="QtdEstoque">QtdEstoque</label><br>
  <input class="form-control" type="text" name="QtdEstoque" value="" required><br><br>

  <label for="edicao">Edicao</label><br>
  <input class="form-control" type="text" name="edicao" value="" required><br><br>

  <label for="EditoraId">Editora</label><br>
  <select class="form-control" name="EditoraId" required>
    <option selected disabled value="">Selecione</option>
    @foreach($editoras as $editora)
      <option value="{{$editora->EditoraId}}">{{$editora->Nome}}</option>
    @endforeach
  </select>
  <br><br>
  <label for="CategoriaId">Categoria</label><br>
  <select class="form-control" name="CategoriaId" required>
    <option selected disabled value="">Selecione</option>
    @foreach ($categorias as $categoria)
    <option value="{{$categoria->CategoriaId}}">{{$categoria->Descricao}}</option>
    @endforeach
  </select>
  <br><br>
  <label for="foto">Foto</label><br>
  <input type="file" name="foto">
  <br><br>
  <input type="submit" name="" value="Enviar">
</form>

</div>
@stop
