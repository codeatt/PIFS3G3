@extends('layouts.master')

@section('content')
<div class="container">
<h1> Adicionar Produtos </h1>
<form id="formCadastro" method="post" enctype="multipart/form-data">
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
      <option value="{{$editora->editora_id}}">{{$editora->nome}}</option>
    @endforeach
  </select>
  <br><br>
  <label for="CategoriaId">Categoria</label><br>
  <select class="form-control" name="CategoriaId" required>
    <option selected disabled value="">Selecione</option>
    @foreach ($categorias as $categoria)
    <option value="{{$categoria->categoria_id}}">{{$categoria->descricao}}</option>
    @endforeach
  </select>
  <label for="sinopse">Sinopse</label><br>
  <input class="form-control" type="text" name="sinopse" value=""><br><br>


  <br><br>
  <label for="foto">Foto</label><br>
  <input type="file" name="foto">
  <br><br>
  <button type="button" id="cadastro-enviar" class="btn btn-primary">Enviar</button>

  <div id="divErro" class="alert alert-danger alert-dismissible fade in" style="display: none; margin: 25px 0px;">
    <ul id="listaErro">
    </ul>
  </div>

</form>

</div>
<script type="text/javascript" src="/js/livroCadastro.js"></script>

@stop
