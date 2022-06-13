<?php namespace App\Http\Controllers;

use estoque\Http\Request;
use estoque\Http\Controllers\Controller;

class LoginController extends Controller {
    public function login()
    {
        $credenciais = Request::only('email', 'passaword');
        
        if(Auth::validate($credenciais, true)){
            return "Usuario".Auth::user()->name." logado com sucesso";
        }

        return "As credenciais nao sao validas";
    }

    public function remove($id){
        if (Auth:guest())
        {
            return redirect('/auth/login');
        }
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }
}