@extends('layouts.master')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
<li data-target="#myCarousel" data-slide-to="3"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
<div class="item active">
  <img src="imagens/f1.jpg" alt="Produto A" id="carousel">
  <div class="carousel-caption" id="carouselcolor">
    <h2>Livraria Global</h2>
    <p>---</p>
  </div>
</div>

<div class="item">
  <img src="imagens/carrosel-teste1.jpg" alt="Produto B" id="carousel">
  <div class="carousel-caption" id="carouselcolor">
    <h2>Livraria Global</h2>
    <p>---</p>
  </div>
</div>

<div class="item">
  <img src="imagens/f3.jpg" alt="Produto C" id="carousel">
  <div class="carousel-caption" id="carouselcolor">
    <h2>Promoção da madrugada</h2>
    <p>---</p>
  </div>
</div>

<div class="item">
  <img src="imagens/palmeiras.jpg" alt="Produto B" id="carousel">
  <div class="carousel-caption" id="carouselcolor">
    <h2>Livraria Global</h2>
    <p>---</p>
  </div>
</div>


</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

<div class="container lista-livro">
  <div class="col-xs-12">
    <h1>NOVIDADES</h1>
  </div>
  @foreach ($lista as $livro)
  <div class="livro-item col-md-3 col-sm-6 col-xs-12">
    <div class="foto-livro" style="background-image: url('{{ url("storage/livros/{$livro->fotoUrl}") }}')" title="{{$livro->Titulo}}">
    </div>
    <h3> <a href="/livros/{{$livro->livro_id}}">{{$livro->titulo}}</a></h3>
    <p>Autor: {{$livro->autor}}</p>
    <p class="preco">R${{$livro->preco}}</p>
    <a class="btn btn-primary" href="/livros/editar/{{$livro->livro_id}}">Editar</a>
    <a class="btn btn-primary" href="/livros/excluir/{{$livro->livro_id}}">Excluir</a>
  </div>
  @endforeach
</div>
@endsection
