<?php

namespace App\Http\Controllers;

use App\Models\EnderecoUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\FormaPagamentoCompra;
use App\Models\AvaliacaoCompra;
use App\Models\ProdutosCompra;

class ComprasController extends Controller
{
    public function listarComprasCliente()
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $comprasUsuario = DB::table('compra')
            ->join('status', 'status_id_status', '=', 'id_status')
            ->where('usuario_id_usuario', '=', $_SESSION['usuario']->id_usuario)
            ->orderByDesc('id_compra')
            ->get();

        foreach ($comprasUsuario as $compra) {
            $produtosCompra = DB::table('produtos_compra')
                ->where('compra_id_compra', '=', $compra->id_compra)->get();

            $compra->qntItens = count($produtosCompra);
        }


        // dd($comprasUsuario);
        // $listaProdutosComprados = DB::table('compra')
        //     ->join('produtos_compra', 'produtos_compra.produto_id_produto', '=', 'produto.id_produto')
        //     ->where('produtos_compra.compra_id_compra', '=', $compra->id)->get();

        return view('cliente.client-purchases', ['session' => $_SESSION, 'compras' => $comprasUsuario]);
    }


    public function listar()
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        if ($_SESSION['usuario']->perfil_id_perfil == 2) {

            //Compras no setor de preparação

            $compras = DB::table('compra')
                ->join('status', 'status_id_status', '=', 'id_status')
                ->where('status_id_status', '=', 1)
                ->orderByDesc('id_compra')
                ->get();
        } else if ($_SESSION['usuario']->perfil_id_perfil == 3) {

            //Compras no setor de conferência

            $compras = DB::table('compra')
                ->join('status', 'status_id_status', '=', 'id_status')
                ->where('status_id_status', '=', 2)
                ->orderByDesc('id_compra')
                ->get();
        } else if ($_SESSION['usuario']->perfil_id_perfil == 4) {

            //Compras no setor de Entrega

            $compras = DB::table('compra')
                ->join('status', 'status_id_status', '=', 'id_status')
                ->where('status_id_status', '=', 3)
                ->orderByDesc('id_compra')
                ->get();
        } else {
            //Gerente
            $compras = DB::table('compra')
                ->join('status', 'status_id_status', '=', 'id_status')
                ->orderByDesc('id_compra')
                ->get();
        }

        foreach ($compras as $compra) {
            $produtosCompra = DB::table('produtos_compra')
                ->where('compra_id_compra', '=', $compra->id_compra)->get();

            $compra->qntItens = count($produtosCompra);
        }

        // dd($compras);

        return view('compras.purchases', ['session' => $_SESSION, 'compras' => $compras]);
    }

    public function visualizarCompra($id)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
            ->join('endereco_usuario', 'endereco_entrega', '=', 'id_endereco_usuario')
            ->join('status', 'status_id_status', '=', 'id_status')
            ->leftJoin('avaliacao_compra', 'avaliacao_compra_id_avaliacao_compra', '=', 'id_avaliacao_compra')
            ->leftJoin('parecer', 'parecer_id_parecer', '=', 'id_parecer')
            ->where('id_compra', '=', (int) $id)->first();

        $produtosCompra = DB::table('produtos_compra')
            ->join('produto', 'produto_id_produto', '=', 'id_produto')
            ->where('compra_id_compra', '=', $compra->id_compra)->get();

        $compra->produtosCompra = $produtosCompra;


        return view('compras.purchase', ['session' => $_SESSION, 'compra' => $compra]);
        // dd($compra);
    }

    public function enviarParaConferencia($idCompra)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
        ->where('id_compra', '=', (int) $idCompra)
        ->update(
            [
                'status_id_status' => 2
            ]
        );


        return redirect('/compras/listar');
    }

    public function enviarParaEntrega($idCompra)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
        ->where('id_compra', '=', (int) $idCompra)
        ->update(
            [
                'status_id_status' => 3
            ]
        );

        return redirect('/compras/listar');
    }

    public function enviarParaPreparacao($idCompra)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
        ->where('id_compra', '=', (int) $idCompra)
        ->update(
            [
                'status_id_status' => 1
            ]
        );

        return redirect('/compras/listar');
    }

    public function entregar($idCompra)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
        ->where('id_compra', '=', (int) $idCompra)
        ->update(
            [
                'status_id_status' => 4
            ]
        );

        return redirect('/compras/listar');
    }


    public function visualizarCompraCliente($id)
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }


        $compra = DB::table('compra')
            ->join('endereco_usuario', 'endereco_entrega', '=', 'id_endereco_usuario')
            ->join('status', 'status_id_status', '=', 'id_status')
            ->leftJoin('avaliacao_compra', 'avaliacao_compra_id_avaliacao_compra', '=', 'id_avaliacao_compra')
            ->leftJoin('parecer', 'parecer_id_parecer', '=', 'id_parecer')
            ->where('id_compra', '=', (int) $id)->first();

        // dd($compra);

        if ($compra->usuario_id_usuario != $_SESSION['usuario']->id_usuario) {
            return redirect('/clientes/minhas-compras');
            exit;
        }

        $produtosCompra = DB::table('produtos_compra')
            ->join('produto', 'produto_id_produto', '=', 'id_produto')
            ->where('compra_id_compra', '=', $compra->id_compra)->get();

        $compra->produtosCompra = $produtosCompra;

        return view('cliente.client-purchase', ['session' => $_SESSION, 'compra' => $compra]);
    }


    public function avaliarCompra($id)
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        $compra = DB::table('compra')
            ->join('endereco_usuario', 'endereco_entrega', '=', 'id_endereco_usuario')
            ->join('status', 'status_id_status', '=', 'id_status')
            ->where('id_compra', '=', (int) $id)->first();

        if ($compra->usuario_id_usuario != $_SESSION['usuario']->id_usuario) {
            return redirect('/clientes/minhas-compras');
            exit;
        }

        $listaParecer = DB::table('parecer')->get();

        $produtosCompra = DB::table('produtos_compra')
            ->join('produto', 'produto_id_produto', '=', 'id_produto')
            ->where('compra_id_compra', '=', $compra->id_compra)->get();

        $compra->produtosCompra = $produtosCompra;

        return view('compras.purchase-evaluation', ['session' => $_SESSION, 'compra' => $compra, 'listaParecer' => $listaParecer]);
    }


    public function postAvaliacaoCompra(Request $request)
    {
        if (!Controller::verifySession()) {
            return redirect('/login');
            exit;
        }

        //Criando avaliação sobre compra

        $avaliacaoCompra = new AvaliacaoCompra();
        $avaliacaoCompra->comentario = $request->comentario;
        $avaliacaoCompra->parecer_id_parecer = $request->parecer;
        $avaliacaoCompra->save();

        $compra = DB::table('compra')
            ->where('id_compra', '=', (int) $request->idCompra)
            ->update(
                [
                    'avaliacao_compra_id_avaliacao_compra' => $avaliacaoCompra->id
                ]
            );

        return redirect('/clientes/minhas-compras/' . (int)$request->idCompra);
    }
}
