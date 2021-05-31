<?php

namespace App\Http\Controllers;

use App\Models\EnderecoUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function listarClientes()
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }



        $clientes = DB::table('usuario')->where('perfil_id_perfil', '=', 5)->get();

        // dd($clientes);


        return view('cliente.clients', ['session' => $_SESSION, 'clientes' => $clientes]);
    }


    public function show($id)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $cliente = DB::table('usuario')->where('id_usuario', '=', $id)->first();

        $enderecoPadrao = DB::table('endereco_usuario')
            ->where('usuario_id_usuario', '=', $cliente->id_usuario)
            ->orderBy('id_endereco_usuario', 'desc')
            ->first();

        return view('cliente.client', ['session' => $_SESSION, 'cliente' => $cliente, 'enderecoPadrao' => $enderecoPadrao]);
        // dd($enderecoPadrao);

    }

    public function edit($id)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $cliente = DB::table('usuario')->where('id_usuario', '=', $id)->first();

        $enderecoPadrao = DB::table('endereco_usuario')
            ->where('usuario_id_usuario', '=', $cliente->id_usuario)
            ->orderBy('id_endereco_usuario', 'desc')
            ->first();

        return view('cliente.client-edit', ['session' => $_SESSION, 'cliente' => $cliente, 'enderecoPadrao' => $enderecoPadrao]);
        // dd($enderecoPadrao);

    }


    public function saveEdit(Request $request)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }

        $usuarioEditado = DB::table('usuario')
            ->where('id_usuario', (int) $request->idUsuario)
            ->update(
                [
                    'nome' => $request->nome,
                    'cpf' => $request->cpf,
                    'email' => $request->email
                ]
            );

        $enderecoEditado = DB::table('endereco_usuario')
            ->where('id_endereco_usuario', '=', (int) $request->idEnderecoPadrao)
            ->update(
                [
                    'cidade' => $request->cidade,
                    'bairro' => $request->bairro,
                    'rua' => $request->rua,
                    'numero' => $request->numero,
                    'cep' => $request->cep,
                    'ponto_de_referencia' => $request->pontoDeReferencia
                ]
            );

        $usuario = DB::table('usuario')->where('id_usuario', '=', (int) $request->idUsuario)->first();
        $enderecoPadrao = DB::table('endereco_usuario')->where('id_endereco_usuario', '=', (int) $request->idEnderecoPadrao)->first();

        $mensagemSucesso = "As informações do cliente foram salvas com sucesso!";
        return view('cliente.client-edit', ['session' => $_SESSION, 'cliente' => $usuario, 'enderecoPadrao' => $enderecoPadrao, 'mensagemSucesso' => $mensagemSucesso]);

        unset($mensagemSucesso);
    }



    public function delete($id)
    {
        if (!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3) {
            return redirect('/login');
            exit;
        }
        // echo "Deletando usuário com id ".$id;
        DB::table('usuario')->where('id_usuario', '=', (int) $id)->delete();
        return redirect('/clientes/listar');
    }
}
