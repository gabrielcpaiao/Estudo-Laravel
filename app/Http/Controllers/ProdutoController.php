<?php namespace App\Http\Controllers;

//namespace App\Http\Controllers; funcionou com esse
//namespace estoque\Http\Controllers; estava assim

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use App\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {


    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
    */

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['adiciona', 'remove']]);
    }
    
    public function lista(){

        $produtos = Produto::all();

        /*
            $produtos = DB::SELECT('select * from produtos');
            return view('produtos.listagem')->with('produtos', $produtos);

            return redirect('/produtos');
        
            deixar a variavel produtos acessível pela view com auxilio do método with:

            passamos para o método with uma chave e valor (produtos, nesse caso) e o valor associado a ele
        
            return view('listagem')->with('produtos', $produtos);
            view(’listagem’)->withProdutos($produtos);
        
            $data = ['produtos' => $produtos];
            return view('listagem', $data);

            $data = [];
            $data['produtos'] = $produtos;
            return view('listagem', $data);
        */

        

        /*
            verificar se uma view existe:
            if (view()->exists('listagem')){
                return view('listagem');
            }
        
            gerar a view a partir de um diretorio diferente    
            view()->file('/caminho/para/view');
        
            Para buscar uma lista de produtos em branco
            return view('listagem')->with('produtos', array());

            return view('produto.listagem', ['produtos' => $produtos]);
        */

        $produtos = Produto::all();
        return view('produtos.listagem')->with('produtos', $produtos);
    }

    public function mostra(Request $request){
        //retorna uma view

        $produto = Produto::find($id);
        if(empty($produto)){
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $produto);

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

    public function adiciona(ProdutosRequest $request){
        /*
            pegar os parâmetros digitados no formulário
            adicionar os produtos no banco de dados
            retornar alguma view
            A classe request pega os parametros da requisicao
            $nome = Request::input(’o_que_passar_aqui_?’);
            salvar no banco de dados
            retornar alguma view
        
            //=========================================================================//
        
            $nome = Request::input('nome');
            $descricao = Request::input('descricao');
            $valor = Request::input('valor');
            $quantidade = Request::input('quantidade');

            DB::insert('INSERT INTO produtos(nome,quantidade,valor,descricao) VALUES (?,?,?,?)', array($nome, $valor, $descricao, $quantidade));

            return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));

            //$params = Request::all();
            //$produto->save();
        
            $valor = Request::input('valor');

            if(floatval($valor) < 0){

            }

            $valitor = Validator::make(['nome' => Request::input('nome'), 'descricao' => Request::input('descricao'), 
                'valor' => Request::input('valor'), 'quantidade' => Request::input('quantidade')], ['nome' => 'required|min:5',
                'descricao' => 'required|255', 'valor' => 'required|numeric', 'quantiadde' => 'required|numeric']);

            if($validator->fails()){
                return redirect()->action('ProdutoController@novo');
            }

            $produtos = DB::select('select * from produtos');
            return view('produto.listagem')->with('produtos', $produtos);
            return implode(',', array($nome,$descricao, $valor, $quantidade));
            implode faz imprimir os valores impresso separado por virgula

            return redirect('/usuarios')->withInput(Request::except('senha'));

        */
        
        Produto::create($request::all());

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
        //return response()->download($caminhoParaUmArquivo);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@lista');
    }
}