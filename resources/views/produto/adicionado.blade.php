@extends('templates.principal')

@section('conteudo')

<div class="alert alert-success">
    <strong>Sucesso!</strong> O produto {{$nome}} foi adicionado.
</div>

@stop

/*
    Nao sei em que arquivo adiciona essa parte

    <h1>Novo produto</h1>
    <form action="/produtos/adiciona" method="post">
    <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control"/>
    </div>
*/