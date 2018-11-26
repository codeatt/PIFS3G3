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
      return view('listaLivro')->with('lista', $livros);
    }

    public function inserir(){
      $editoras = Editora::all();
      $categorias = Categorias::all();
      return view('adicionarLivro')->with('editoras',$editoras)->with('categorias', $categorias);
    }

    public function gravarLivro(Request $request){

      $nameFile = 'N/A';
      if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));
        // Recupera a extensão do arquivo
        $extension = $request->foto->extension();
        // Define finalmente o nome
        $nameFile = "L{$name}.{$extension}";
        // Faz o upload:
        $upload = $request->foto->storeAs('livros', $nameFile);
      }

      $livros = Livro::create([
        'titulo' => $request->input('titulo'),
        'autor' => $request->input('autor'),
        'preco' => $request->input('preco'),
        'QtdEstoque' => $request->input('QtdEstoque'),
        'edicao' => $request->input('edicao'),
        'ativo'=> true,
        'EditoraId'=>$request->get('EditoraId'),
        'CategoriaId' => $request->get('CategoriaId'),
        'fotoUrl' => $nameFile
      ]);
      $livros->save();


      return redirect('/livros/lista');
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
