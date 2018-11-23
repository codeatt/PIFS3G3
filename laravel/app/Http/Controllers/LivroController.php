<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;
use App\Editora;
use App\Categorias;

class LivroController extends Controller
{
    public function lista() {
      $livros = Livro::all();
      return view('listaLivro')->with('listaLivros', $livros);
    }

    public function inserir(){
      $editoras = Editora::all();
      $categorias = Categorias::all();
      return view('adicionarLivro')->with('editoras',$editoras)->with('categorias', $categorias);
    }

    public function gravarLivro(Request $request){

      $filename = 'default.jpg';

      if($request->hasfile('foto-livro')){
        $file = $request->file('foto-livro');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().'.'.$extension;
        $file->move('/imagens/livros/', $filename);
      }

      $livros = Livro::create([
        'titulo' => $request->input('titulo'),
        'autor' => $request->input('autor'),
        'preco' => $request->input('preco'),
        'QtdEstoque' => $request->input('QtdEstoque'),
        'edicao' => $request->input('edicao'),
        'ativo'=> $request->input('ativo'),
        'fk_editora_id'=>$request->input('fk_editora_id'),
        'fk_categoria_id' => $request->input('fk_categoria_id'),
        'imagem' => $filename
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
      $livro->titulo = $request->input('titulo');
      $livro->autor = $request->input('autor');
      $livro->preco = $request->input('preco');
      $livro->QtdEstoque = $request->input('QtdEstoque');
      $livro->edicao = $request->input('edicao');
      $livro->ativo = $request->input('ativo');
      $livro->fk_editora_id=$request->input('fk_editora_id');
      $livro->fk_categoria_id = $request->input('fk_categoria_id');

      $livro->save();

      return redirect('/livros');
    }

    public function excluir ($id) {
      $livro=Livro::find($id);
      return view('livroExcluir')->with('livro',$livro);
    }

    public function excluirLivros(Request $request, $id) {
      $livro=Livro::find($id);
      $livro->delete();
      return redirect('/livros');
    }
}
