@extends('layouts.master')

<form class="navbar-form navbar-left" role="search" action="{!! url('/pesquisar') !!}" method="post" style="margin-left: 25%;margin-bottom: 3%;">

    <div class="form-group">
      {!! csrf_field() !!}
      <input type="text" name="texto" class="form-control" placeholder="Pesquisar" style="width: 600px;">

    </div>
    <div id="demo" class="collapse">
      <label class="checkbox-inline">
       <input type="checkbox" id="semimagem" value="semimagem" name="semimagem"> Sem imagem
      </label>
      <select class="form-control" id="status">
        <option value="1">Ativo</option>
        <option value="0">Desabilitado</option>
      </select>
    </div>
