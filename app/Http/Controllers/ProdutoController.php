<?php namespace App\Http\Controllers;

//namespace App\Http\Controllers; funcionou com esse
//namespace estoque\Http\Controllers; estava assim

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller {


    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */

    public function lista(){

        $produtos = Produto::all();

        /*
            deixar a variavel produtos acessível pela view com auxilio do método with:

            passamos para o método with uma chave e valor (produtos, nesse caso) e o valor associado a ele
        */

        //return view('listagem')->with('produtos', $produtos);
        //view(’listagem’)->withProdutos($produtos);
        
        /*
            $data = ['produtos' => $produtos];
            return view('listagem', $data);
        */

        /*
            $data = [];
            $data['produtos'] = $produtos;
            return view('listagem', $data);
        */

        return view('produto.listagem', ['produtos' => $produtos]);

        /*
            verificar se uma view existe:
            if (view()->exists('listagem'))
            {
                return view('listagem');
            }
        */

        /*
            gerar a view a partir de um diretorio diferente    
            view()->file('/caminho/para/view');
        */


        //Para buscar uma lista de produtos em branco
        //return view('listagem')->with('produtos', array());
    }

    public function mostra(Request $request){
        //retorna uma view

        $id = $request->input('id','0'); //pegando o id
        //$id = $request::route('id');

        $resposta = Produto::where('id', $id);

        if(!$resposta->exists()){
            return "Esse produto nao existe";
        }
        return view('produto.detalhes')->with('p', $resposta->get()[0]);
        //return view('detalhes')->with('p', $resposta);
    }


    /*
        antes de adicionar um produto no banco de dados, precisamos abrir uma página com formulário para que o usuário possa preencher
        os dados. Retornará uma view chamada formulario, que será criada dentro da pasta produto
    */
    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){
        //pegar os parâmetros digitados no formulário
        //adicionar os produtos no banco de dados
        //retornar alguma view
        //A classe request pega os parametros da requisicao
        //$nome = Request::input(’o_que_passar_aqui_?’);

        // salvar no banco de dados
        // retornar alguma view

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('INSERT INTO produtos(nome,quantidade,valor,descricao) VALUES (?,?,?,?)', array($nome, $valor, $descricao, $quantidade));

        return view('produto.adicionado')->with('nome', $nome);
        //return implode(',', array($nome,$descricao, $valor, $quantidade));
        //implode faz imprimir os valores impresso separado por virgula
    }
}