<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class ProdutosController extends Controller
{
    function index(){

        $expira = 1;
        $produtos =  cache::remember('todosprodutos',$expira,function(){
            info('aqui');
            return Produto::with('Categorias')->get();
        });

        // $produtos = Produto::with('Categorias')->get();

         return view('produtos',compact(['produtos']));
    }
}
