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
          'email' => 'riqured|unique:usuario|max:25',
          'senha' => 'riquered|min:8|max:20',
          'confirmacao' => 'riquerd|min:8|max:20',
          'cep' => 'min:8|max:8',
          'endereco' => 'min:10|max:50',
          'numero' => 'max:10',
          'complemento' => 'max:50',
          'bairro' => 'max:50',
          'cidade' => 'max:50'
          
      ]);
      $cliente = Cliente::create([
          'nome' => $request->input('nome'),
          'CPF' => $request->input('cpf'),
          'DataNascimento' => $request->input('dataNascimento'),
          'Sexo' => $request->input('sexo')
      ]);
      $cliente->save();
      
      $endereco = ClienteEndereco::create([
          'ClienteId' => $cliente->ClienteId,
          'Logradouro' => $request->input('endereco'),
          'Numero' => $request->input('numero'),
          'Complemento' => $request->input('complemento'),
          'Bairro' => $request->input('bairro'),
          'Cidade' => $request->input('cidade'),
          'UF' => $request->input('uf'),
          'CEP' => $request->input('cep'),
          'Entrega' => true,
          'Fiscal' => true,
          'Ativo' => true
      ]);
      $endereco->save();
      
      if($request->input('telefone'))
      {
        $telefone = ClienteContato::create([
            'ClienteId' => $cliente->ClienteId,
            'TipoContatoId' => 1,
            'Contato' => $request->input('telefone'),
            'Ativo' => true
        ]);
        $telefone->save();
      }
      if($request->input('email'))
      {
        $email = ClienteContato::create([
            'ClienteId' => $cliente->ClienteId,
            'TipoContatoId' => 3,
            'Contato' => $request->input('email'),
            'Ativo' => true
        ]);
        $email->save();
        
        $usuario = User::create([
           'ClienteId' => $cliente->ClienteId,
            'Login' => $request->input('email'),
            'Senha' => password_hash($request->input('senha'),PASSWORD_DEFAULT),
            'Ativo' => true
        ]);
        
        $usuario->save();
      }
      
      return redirect('/login');
    }
}
