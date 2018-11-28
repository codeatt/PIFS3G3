@extends('layouts.master')

@section('content')
       <div class="container">
          <h1>Excluir Livro</h1>
          <form action="" method="POST">

                         @csrf

                         @method('DELETE')

            <label>Nome da Categoria</label>
            <p>{{$livro->titulo}}</p>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
           </form>
       </div>
@stop
