<div class="container">


<h1> Adicionar Produtos </h1>
<form method="post">
  @csrf

  {{method_field('POST')}}
  <label for="">Título </label><br>
  <input type="text" name="Titulo" value=""><br><br>

  <label for="">Autor</label><br>
  <input type="text" name="Autor" value=""><br><br>

  <label for="">Preco</label><br>
  <input type="text" name="Preco" value=""><br><br>

  <label for="">QtdEstoque</label><br>
  <input type="text" name="QtdEstoque" value=""><br><br>

  <label for="">Edicao</label><br>
  <input type="text" name="Edicao" value=""><br><br>

  <label for="">Ativo</label><br>
  <input type="text" name="Ativo" value=""><br><br>

  <label for="">EditoraId</label><br>
  <input type="text" name="EditoraId" value=""><br><br>

  <label for="">CategoriaId</label><br>
  <input type="text" name="CategoriaId" value=""><br><br>

  <input type="submit" name="" value="Enviar">
</form>

</div>
