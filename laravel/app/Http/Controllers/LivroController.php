<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    public function lista() {
      $livros = Livro::all();
      return view('listaLivro')->with('listaLivros', $livros);
    }

    public function inserir(){
      return view('adicionarLivro');
    }

    public function gravarLivro(Request $request){

      $livros = Livro::create([
        'Titulo' => $request->input('Titulo'),
        'Autor' => $request->input('Autor'),
        'Preco' => $request->input('Preco'),
        'QtdEstoque' => $request->input('QtdEstoque'),
        'Edicao' => $request->input('Edicao'),
        'Ativo'=> $request->input('Ativo'),
        'EditoraId'=>$request->input('EditoraId'),
        'CategoriaId' => $request->input('CategoriaId')
      ]);
      $livros->save();

      return redirect('/livros');
    }
    public function editarLivro ($id){
        $livro = Livro::find($id);
        return view('editarLivro')->with('resultado', $livro);
    }

    public function atualizarLivro(Request $request, $id) {
      $livro = Livro::find($id);
      $livro->Titulo = $request->input('Titulo');
      $livro->Autor = $request->input('Autor');
      $livro->Preco = $request->input('Preco');
      $livro->QtdEstoque = $request->input('QtdEstoque');
      $livro->Edicao = $request->input('Edicao');
      $livro->Ativo = $request->input('Ativo');
      $livro->EditoraId=$request->input('EditoraId');
      $livro->CategoriaId = $request->input('CategoriaId');

      $livro->save();

      return redirect('/livros');
    }

}
