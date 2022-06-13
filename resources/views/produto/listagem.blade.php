@extends('layout.principal')
@section('conteudo')

@if(empty($produtos))
	<div class="alert alert-danger">
		Você não tem nenhum produto cadastrado.
	</div>
	@else
		<h1>Listagem de produtos</h1>
		<table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>
                        <a href="/produtos/mostra?id={{ $p->id }}"><span class="glyphicon glyphicon-search"></span></a>
                        //<a href="/produtos/mostra/{{ $p->id }}"><span class="glyphicon glyphicon-search"></span></a>
                        <a href="{{action('ProdutoController@remove', $p->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                        <!--
                            ?id={{ $p->id }}, ou seja, estamos passando um parâmetro na requisição chamado id, com o valor
                            do id do produto
                        -->
                    </td>
                </tr>
            @endforeach
        </table>
		@foreach ($produtos as $p)
			<!-- continuação do código -->
		@endforeach
@endif
<h4>
    <span class="label label-danger pull-right">
        Um ou menos itens no estoque
    </span>
</h4>

@if(old('nome'))
    <div class="alert alert-success">
        <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
    </div>
@endif

@stop

/*
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Listagem de Produtos</h1>

        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{$p->quantidade<=1 ? 'danger' : ''}}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td>
                        <a href="/produtos/mostra?id={{ $p->id }}"><span class="glyphicon glyphicon-search"></span></a>
                        //<a href="/produtos/mostra/{{ $p->id }}"><span class="glyphicon glyphicon-search"></span></a>
                        <!--
                            ?id={{ $p->id }}, ou seja, estamos passando um parâmetro na requisição chamado id, com o valor
                            do id do produto
                        -->
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
*/