@extends('layouts.master')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
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
  <img src="imagens/f2.jpg" alt="Produto B" id="carousel">
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

@foreach ($lista as $livro)
<div class="livro_item col-md-3">
  <img src="{{ url("storage/livros/{$livro->fotoUrl}") }}" style="width: 50px; height: 50px;" class="img-responsive" alt="{{$livro->Titulo}}">
  <h3> <a href="/livros/{{$livro->livro_id}}">{{$livro->titulo}}</a></h3>
  <p>{{$livro->autor}}</p>
  <p>Edição {{$livro->edicao}}</p>
  <p class="preco">{{$livro->preco}}</p>
  <a href="#">Comprar</a>
</div>
@endforeach
@endsection
