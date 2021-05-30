<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {

        if(!Controller::verifySession())
        {
            return redirect('/login');
            exit;
        }

        $produto = DB::table('produto')
        ->join('categoria_produto', 'produto.categoria_produto_id_categoria_produto', '=','categoria_produto.id_categoria_produto')
        ->where('produto.id_produto','=', $request->idProduto)->first();




        $produto->valor = (double) $request->valorProduto;
        $produto->qnt = (int) $request->qntProduto;
        $produto->totalProduto = $produto->valor * $produto->qnt;

        $flag = -1;
        $index = 0;

        foreach($_SESSION['carrinho'] as $produtoNoCarrinho)
        {
            if($produtoNoCarrinho->id_produto == $request->idProduto)
            {
                $flag = $index;
            }

            $index++;
        }

        if($flag > -1)
        {
            // Já existe produto no carrinho -> Acumulando quantidade"
            echo "Já existe o produto no carrinho indice ".$flag;
            $_SESSION['carrinho'][$flag]->qnt += (int) $request->qntProduto;
            $_SESSION['carrinho'][$flag]->totalProduto = $_SESSION['carrinho'][$flag]->qnt * (double) $request->valorProduto;

        }else{
            // Não existe o produto no carrinho
            array_push($_SESSION['carrinho'], $produto);
        }

        // dd($_SESSION['carrinho']);
        $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        $_SESSION['somaCarrinho'] = $somaCarrinho;

        return view('cart.cart', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho'=> $somaCarrinho]);
        // echo "Adicionando ID ".$request->idProduto." -> ".$request->qntProduto." unidades a ".$request->valorProduto;

    }

    public function show()
    {
        if(!Controller::verifySession())
        {
            return redirect('/login');
            exit;
        }

        $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        $_SESSION['somaCarrinho'] = $somaCarrinho;

        return view('cart.cart',['carrinho' => $_SESSION['carrinho'], 'somaCarrinho'=> $somaCarrinho, 'session'=>$_SESSION]);
    }



    public function limparCarrinho()
    {
        if(!Controller::verifySession())
        {
            return redirect('/login');
            exit;
        }

        $_SESSION['carrinho'] = array();
        $_SESSION['somaCarrinho'] = 0.0;

        return view('cart.cart',['carrinho' => $_SESSION['carrinho'], 'somaCarrinho'=> $_SESSION['somaCarrinho'], 'session'=>$_SESSION]);
    }

    public function removerProduto($id)
    {
        if(!Controller::verifySession())
        {
            return redirect('/login');
            exit;
        }

        foreach($_SESSION['carrinho'] as $key => $produto)
        {
            if($produto->id_produto == $id)
            {
                $flag = $key;
                unset($_SESSION['carrinho'][$key]);

                $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
                $_SESSION['somaCarrinho'] = $somaCarrinho;

                return view('cart.cart',['carrinho' => $_SESSION['carrinho'], 'somaCarrinho'=> $somaCarrinho]);
            }
        }

    }


    //Static function

    public static function somaTotalCarrinho($carrinho)
    {
        $soma = 0;
        foreach($carrinho as $produto)
        {
            $soma += $produto->totalProduto;
        }

        return $soma;
    }




}
