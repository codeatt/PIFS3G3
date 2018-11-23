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
    return view('auth.register');
  }

  public function cadastrar(Request $request) {

      // $request->validate([
      //     'name' => 'required|max:50',
      //      'sobrenome'=> 'required|max:50',
      //       'telefone'=> 'required|max:20',
      //       'sexo'=> 'required|max:20',
      //     'cpf' => 'required|unique:users|max:11',
      //     'data_de_nascimento' => 'required',
      //     'email' => 'required|unique:users|max:25',
      //     'password' => 'required|min:8|max:20'
      // ]);

      $user = User::create([
        'name' => $request->input('name'),
        'cpf' => $request->input('cpf'),
        'data_de_nascimento' => $request->input('data_de_nascimento'),
        'sobrenome'=>$request->input('sobrenome'),
        'sexo'=>$request->input('sexo'),
        'email'=>$request->input('email'),
        'telefone'=>$request->input('telefone'),
        'password'=>$request->input('password')
      ]);

      $user->save();


      return redirect('/login');
    }
}
