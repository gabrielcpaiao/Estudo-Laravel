@extends('templates.principal')

@section('conteudo')

<h1>Novo produto</h1>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="/produtos/adiciona" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control" value="{{ old('nome') }}" />
  </div>
  <div class="form-group">
    <label>Descricao</label>
    <input name="descricao" class="form-control" value="{{ old('descricao') }}"/>
  </div>
  <div class="form-group">
    <label>Valor</label>
    <input name="valor" class="form-control" value="{{ old('valor') }}"/>
  </div>
  <div class="form-group">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}"/>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
</form>

@stop


/*
  Utilizarmos o método GET para listagens ou visualização de algum de nossos
  recursos, sempre em operações que NAO MODIFICAM OS VALORES DO SISTEMA.
  O POST deve ser utilizado para ADICAO DE INFORMACOES A UM RECUSO EXISTENTE ou adição de um novo recurso, como estamos fazendo agora com os
  produtos.
  Além disso, existem outros verbos como o PUT e DELETE, que são utilizados para atualização e remoção, respectivamente.
*/