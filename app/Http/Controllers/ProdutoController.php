<?php namespace App\Http\Controllers;

//namespace App\Http\Controllers; funcionou com esse
//namespace estoque\Http\Controllers; estava assim

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;


class ProdutoController extends Controller {
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

        return view('listagem', ['produtos' => $produtos]);

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
        return view('detalhes')->with('p', $resposta->get()[0]);
        //return view('detalhes')->with('p', $resposta);
    }
}