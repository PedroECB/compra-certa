<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = DB::table('categoria_produto')->get();

        $produtosPromocao = DB::table('promocao')
        ->join('produto', 'promocao.produto_id_produto', '=', 'produto.id_produto')
        ->get();

        // dd($produtosPromocao);

        $produtos = Produto::all();
    
        return view('home.index', ['produtos'=> $produtos, 
                                   'produtosPromocao'=> $produtosPromocao,
                                   'categorias'=>$categorias
                                   ]);
    }
}
