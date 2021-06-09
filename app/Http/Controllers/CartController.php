<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\FormaPagamentoCompra;
use App\Models\EnderecoUsuario;
use App\Models\ProdutosCompra;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {

        if (!Controller::verifySession())
        {
            return redirect('/login');
            exit;
        }

        $produto = DB::table('produto')
            ->join('categoria_produto', 'produto.categoria_produto_id_categoria_produto', '=', 'categoria_produto.id_categoria_produto')
            ->where('produto.id_produto', '=', $request->idProduto)->first();




        $produto->valor = (float) $request->valorProduto;
        $produto->qnt = (int) $request->qntProduto;
        $produto->totalProduto = $produto->valor * $produto->qnt;

        $flag = -1;
        $index = 0;

        foreach ($_SESSION['carrinho'] as $produtoNoCarrinho)
        {
            if ($produtoNoCarrinho->id_produto == $request->idProduto) {
                $flag = $index;
            }

            $index++;
        }

        if ($flag > -1) {
            // Já existe produto no carrinho -> Acumulando quantidade"
            echo "Já existe o produto no carrinho indice " . $flag;
            $_SESSION['carrinho'][$flag]->qnt += (int) $request->qntProduto;
            $_SESSION['carrinho'][$flag]->totalProduto = $_SESSION['carrinho'][$flag]->qnt * (float) $request->valorProduto;
        } else {
            // Não existe o produto no carrinho
            array_push($_SESSION['carrinho'], $produto);
        }

        // dd($_SESSION['carrinho']);
        $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        $_SESSION['somaCarrinho'] = $somaCarrinho;

        return view('cart.cart', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho' => $somaCarrinho, 'session' => $_SESSION]);
        // echo "Adicionando ID ".$request->idProduto." -> ".$request->qntProduto." unidades a ".$request->valorProduto;

    }

    public function show()
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        $_SESSION['somaCarrinho'] = $somaCarrinho;
        return view('cart.cart', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho' => $somaCarrinho, 'session' => $_SESSION]);
    }


    public function checkout()
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $idUsuario = $_SESSION['usuario']->id_usuario;
        $enderecoPadrao = DB::table('endereco_usuario')
            ->where('usuario_id_usuario', '=', $idUsuario)
            ->orderBy('id_endereco_usuario', 'desc')
            ->first();
        // dd($enderecoPadrao);
        $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        $_SESSION['somaCarrinho'] = $somaCarrinho;

        return view('cart.checkout', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho' => $somaCarrinho, 'session' => $_SESSION, 'enderecoPadrao' => $enderecoPadrao]);
    }

    public function postCheckout(Request $request)
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }


        $formaPagamento = new FormaPagamentoCompra();
        $formaPagamento->total = $_SESSION['somaCarrinho'];
        $formaPagamento->vezes = (int) $request->parcela;
        $formaPagamento->numero_cartao = $request->numCartao;
        $formaPagamento->nome_cartao = $request->nomeCartao;
        $formaPagamento->validade_mes =  $request->mesCartao;
        $formaPagamento->validade_ano = $request->anoCartao;
        $formaPagamento->cvv =  $request->cvvCartao;

        $formaPagamento->save();




        //Persistindo dados da compra

        $compra = new Compra();
        $compra->hora_compra = new DateTime('now', new \DateTimeZone( 'America/Sao_Paulo'));
        $compra->total = $_SESSION['somaCarrinho'];
        $compra->status_id_status = 1;
        $compra->usuario_id_usuario = $_SESSION['usuario']->id_usuario;
        $compra->id_forma_pagamento = $formaPagamento->id;
        //Verificando a inserção de um novo endereço

        if ($request->cepNovoEndereco != "")
        {
            //Se houver um novo endereço de entrega
            $enderecoUsuario = new EnderecoUsuario();
            $enderecoUsuario->cidade = $request->cidadeNovoEndereco;
            $enderecoUsuario->bairro = $request->bairroNovoEndereco;
            $enderecoUsuario->rua = $request->ruaNovoEndereco;
            $enderecoUsuario->numero = (int) $request->numeroNovoEndereco;
            $enderecoUsuario->cep = $request->cepNovoEndereco;
            $enderecoUsuario->ponto_de_referencia = $request->pontoReferenciaNovoEndereco;
            $enderecoUsuario->usuario_id_usuario = $_SESSION['usuario']->id_usuario;

            $enderecoUsuario->save();

            $compra->endereco_entrega = $enderecoUsuario->id;
        }
        else
        {
            //Atribuindo entrega a endereço padrão
            $compra->endereco_entrega = (int) $request->idEnderecoPadrao;
        }


        $compra->save();

        // dd($_SESSION['carrinho']);

        foreach($_SESSION['carrinho'] as $produto)
        {
            $produto_compra = new ProdutosCompra();
            $produto_compra->compra_id_compra = $compra->id;
            $produto_compra->produto_id_produto = $produto->id_produto;
            $produto_compra->qnt = $produto->qnt;
            $produto_compra->total = $produto->totalProduto;

            $produto_compra->save();
        }

        // $listaProdutosComprados = DB::table('produtos_compra')
        // ->join('produto','produtos_compra.produto_id_produto','=','produto.id_produto')
        // ->where('produtos_compra.compra_id_compra', '=', $compra->id)->get();


        // dd($listaProdutosComprados);

        // $idUsuario = $_SESSION['usuario']->id_usuario;
        // $enderecoPadrao = DB::table('endereco_usuario')
        // ->where('usuario_id_usuario', '=', $idUsuario)
        // ->orderBy('id_endereco_usuario', 'desc')
        // ->first();
        // // dd($enderecoPadrao);
        // $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
        // $_SESSION['somaCarrinho'] = $somaCarrinho;

        return redirect('/cart/finalizacao-compra');
        // ['carrinho' => $_SESSION['carrinho'], 'session'=>$_SESSION]
    }



    public function finalizacaoCompra()
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $carrinho = $_SESSION['carrinho'];
        $somaCarrinho = $_SESSION['somaCarrinho'];

        $_SESSION['carrinho'] = array();
        $_SESSION['somaCarrinho'] = 0.0;

        return view('cart.buy-performed', ['carrinho' => $carrinho, 'somaCarrinho' => $somaCarrinho, 'session' => $_SESSION]);
    }



    public function limparCarrinho()
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $_SESSION['carrinho'] = array();
        $_SESSION['somaCarrinho'] = 0.0;

        return view('cart.cart', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho' => $_SESSION['somaCarrinho'], 'session' => $_SESSION]);
    }

    public function removerProduto($id)
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        foreach ($_SESSION['carrinho'] as $key => $produto) {
            if ($produto->id_produto == $id) {
                $flag = $key;
                unset($_SESSION['carrinho'][$key]);

                $somaCarrinho = self::somaTotalCarrinho($_SESSION['carrinho']);
                $_SESSION['somaCarrinho'] = $somaCarrinho;

                return view('cart.cart', ['carrinho' => $_SESSION['carrinho'], 'somaCarrinho' => $somaCarrinho]);
            }
        }
    }


    //Static function

    public static function somaTotalCarrinho($carrinho)
    {
        $soma = 0;
        foreach ($carrinho as $produto) {
            $soma += $produto->totalProduto;
        }

        return $soma;
    }
}
