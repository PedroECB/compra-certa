<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;


class ProductController extends Controller
{
    public function index()
    {
        $categorias = DB::table('categoria_produto')->get();

        $produtosPromocao = DB::table('promocao')
        ->join('produto', 'promocao.produto_id_produto', '=', 'produto.id_produto')
        ->get();

        // dd($produtosPromocao);

        $produtos = Produto::all();
    
        return view('product.products', ['produtos'=> $produtos, 
                                   'produtosPromocao'=> $produtosPromocao,
                                   'categorias'=>$categorias
                                   ]);

    }


    public function filterByCategory(Request $request)
    {
        $category = $request->query('category');
        // echo "Retornando produto da categoria-> ".$request->query('category')." ->".$_GET['category'];
        
        $categorias = DB::table('categoria_produto')->get();

        $produtosPromocao = DB::table('promocao')
        ->join('produto', 'promocao.produto_id_produto', '=', 'produto.id_produto')
        ->get();

        // dd($produtosPromocao);

        $produtosSelecionados = Produto::select()
        ->join('categoria_produto', 'produto.categoria_produto_id_categoria_produto','=','categoria_produto.id_categoria_produto')
        ->where('categoria_produto.descricao_categoria','like',  mb_strtolower($category))
        ->get();
        
    
        return view('product.products', ['produtos'=> $produtosSelecionados, 
                                   'produtosPromocao'=> $produtosPromocao,
                                   'categorias'=>$categorias
                                   ]);
    }
}
