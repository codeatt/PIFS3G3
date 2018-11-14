<div class="container">


<h1> Editar Produtos </h1>
<form method="post" action='/livros/editar/{{$resultado->LivroId}}'>
  @csrf

  {{method_field('POST')}}
  <label for="">Título </label><br>
  <input type="text" name="Titulo" value="{{ $resultado->Titulo }}"><br><br>

  <label for="">Autor</label><br>
  <input type="text" name="Autor" value="{{$resultado->Autor}}"><br><br>

  <label for="">Preco</label><br>
  <input type="text" name="Preco" value="{{$resultado->Preco}}"><br><br>

  <label for="">QtdEstoque</label><br>
  <input type="text" name="QtdEstoque" value="{{$resultado->QtdEstoque}}"><br><br>

  <label for="">Edicao</label><br>
  <input type="text" name="Edicao" value="{{$resultado->Edicao}}"><br><br>

  <label for="">Ativo</label><br>
  <input type="text" name="Ativo" value="{{$resultado->Ativo}}"><br><br>

  <label for="">EditoraId</label><br>
  <input type="text" name="EditoraId" value="{{$resultado->EditoraId}}"><br><br>

  <label for="">CategoriaId</label><br>
  <input type="text" name="CategoriaId" value="{{$resultado->CategoriaId}}"><br><br>

  <input type="submit" name="" value="Enviar">
</form>

</div>
