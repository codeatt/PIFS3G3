<?php

namespace App\Http\Controllers;
use App\Livro;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();
        return view('home')->with('lista', $livros);
    }
}
