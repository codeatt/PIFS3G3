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
        <h3>Livraria Global</h3>
        <p>---</p>
      </div>
    </div>

    <div class="item">
      <img src="imagens/f2.jpg" alt="Produto B" id="carousel">
      <div class="carousel-caption" id="carouselcolor">
        <h3>Livraria Global</h3>
        <p>---</p>
      </div>
    </div>

    <div class="item">
      <img src="imagens/f3.jpg" alt="Produto C" id="carousel">
      <div class="carousel-caption" id="carouselcolor">
        <h3>Promoção da madrugada</h3>
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

@stop