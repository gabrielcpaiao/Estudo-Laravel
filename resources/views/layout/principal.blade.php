<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/produtos">
                    Estoque Laravel
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ action('ProdutoController@lista') }}">Listagem</a></li>
                    <li><a href="{{ action('ProdutoController@novo') }}">Novo</a></li>
                </ul>
            </div>
        </nav>
        @yield(’conteudo’)
        <footer class="footer">
            <p>© Livro de Laravel da Casa do Código.</p>
        </footer>
    </div>

    <!-- 
        Esse codigo tem que ir em algum lugar mas não sei onde
    
        protected $fillable = array(’nome’, ’descricao’, ’valor’, ’quantidade’);
    
        <?php namespace estoque;
        use Illuminate\Database\Eloquent\Model;
        class Produto extends Model {
            protected $table = ’produtos’;
            public $timestamps = false;
            protected $fillable = array(’nome’, ’descricao’, ’valor’, ’quantidade’);
        }
    -->

</body>
</html>