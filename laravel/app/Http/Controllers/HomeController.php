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
        $livros = Livro::take(4)->get();
        return view('home')->with('lista', $livros);
    }
}
