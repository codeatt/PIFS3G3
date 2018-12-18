<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;
use App\editora;
use App\categorias;
use Auth;

public function Pesquisar()
{
  $livros = Input::get('texto');
  $pesquisa = Livros::where('erp_status', 'like', '%'.$livros.'%')
 ->orWhere('erp_cost','like','%'.$livros.'%')
 ->orWhere('erp_productid','like','%'.$livros.'%')
 ->orWhereHas('descricao', function ($query) use ($livros) {
     $query->where('erp_name', 'like', '%'.$livros.'%');
 })
 ->orderBy('erp_status')
 ->paginate(20);
