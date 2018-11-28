<html>
   <head>
       <title>Excluir Categorias</title>
       <link rel="stylesheet" href="/css/app.css"/>
   </head>
   <body>
       <div class="container">
          <h1>Excluir Livro</h1>
          <form action="" method="POST">

                         @csrf

                         @method('DELETE')

            <label>Nome da Categoria</label>
            <input type="text" name="titulo" value="{{$livro->titulo}}" readonly='true'>
            <button type="submit" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
           </form>
       </div>
   </body>
</html>
