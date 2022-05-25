<?php namespace App\Http\Controllers;

//namespace App\Http\Controllers; funcionou com esse
//namespace estoque\Http\Controllers; estava assim

use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller {
    public function lista(){

        $produtos = DB::select('select * from produtos;');

        /*
            deixar a variavel produtos acessível pela view com auxilio do método with:

            passamos para o método with uma chave e valor (produtos, nesse caso) e o valor associado a ele
        */

        return view('listagem')->with('produtos', $produtos);
        //view(’listagem’)->withProdutos($produtos);
    }
}