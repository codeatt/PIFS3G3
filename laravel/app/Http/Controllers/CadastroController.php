<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteContato;
use App\ClienteEndereco;
use App\User;

class CadastroController extends Controller
{
  public function cadastro(){
    return view('cadastro');
  }

  public function cadastrar(Request $request) {

      $request->validate([
          'nome' => 'required|unique:cliente|max:50',
          'cpf' => 'required|unique:cliente|max:11',
          'dataNascimento' => 'required',
          'email' => 'required|unique:usuario|max:25',
          'senha' => 'required|min:8|max:20'
      ]);


      return redirect('/login');
    }
}
