<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index');
Route::get('/faq', 'FaqController@perguntas');
Route::get('/cadastro', 'CadastroController@cadastro');
Route::get('/login', 'LoginController@login');
Route::post('/cadastro', 'CadastroController@cadastrar');

Route::get('/livros/lista', 'LivroController@lista');
Route::get('/livros/adicionar','LivroController@inserir');
Route::post('/livros/adicionar','LivroController@gravarLivro');

Route::get('/livros/editar/{id}','LivroController@editarLivro');
Route::post('/livros/editar/{id}','LivroController@atualizarLivro');

Route::get('/livros/excluir/{id}','LivroController@excluir');
Route::delete('/livros/excluir/{id}','LivroController@excluirLivros');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
