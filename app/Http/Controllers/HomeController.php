<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\EnderecoUsuario;
use Exception;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Expr\Cast\Array_;

class HomeController extends Controller
{
    public function index()
    {
        session_start();

        // dd($_SESSION);

        $categorias = DB::table('categoria_produto')->get();

        $produtosPromocao = DB::table('promocao')
            ->join('produto', 'promocao.produto_id_produto', '=', 'produto.id_produto')
            ->get();

        // dd($produtosPromocao);

        $produtos = Produto::all();

        return view('home.index', [
            'produtos' => $produtos,
            'produtosPromocao' => $produtosPromocao,
            'categorias' => $categorias,
            'session'=>$_SESSION
        ]);
    }

    public function autenticar(Request $request)
    {
        //Buscando usuário

        $usuario = DB::table('usuario')
        ->join('perfil', 'perfil_id_perfil', '=', 'perfil.id_perfil')
        ->where('email', '=', $request->email)->first();

        if($usuario && password_verify($request->senha, $usuario->senha))
        {
            //Usuário autenticado
            session_start([
                'cookie_lifetime' => 86400,
            ]);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['carrinho'] = array();

            if($_SESSION['usuario']->nvlAcesso == 1)
            {
                return redirect('/gerente/exibirconsultas');
            }else
            {
                return redirect('/');
            }



        }else{

            //Usuário não autenticado
            $error = "Usuário inexistente ou senha inválida!";
            return view('home.login', ["error_login"=> $error, "email"=>$request->email]);
            unset($error);
        }

        // echo "<br>";
        // echo password_verify("123", $hash);
        // dd($request);
        exit;
    }


    public function registrar(Request $request)
    {
        //Cadastrando cliente
        try
        {
            //Dados do usuário

            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->senha = password_hash($request->senha, PASSWORD_DEFAULT);
            $usuario->perfil_id_perfil = 5;

            //Endereço

            $enderecoUsuario = new EnderecoUsuario();
            $enderecoUsuario->cidade = $request->cidade;
            $enderecoUsuario->bairro = $request->bairro;
            $enderecoUsuario->rua = $request->rua;
            $enderecoUsuario->numero = $request->numeroEndereco;
            $enderecoUsuario->cep = $request->cep;
            $enderecoUsuario->ponto_de_referencia = $request->pontoReferencia;

            $usuario->save();

            $enderecoUsuario->usuario_id_usuario = $usuario->id;

            $enderecoUsuario->save();

            $mensagemSucessoCadastro = "Cliente cadastrado com sucesso!";

            return view('home.register', ['mensagemSucessoCadastro'=> $mensagemSucessoCadastro, 'email'=> $request->email]);
            unset($mensagemSucessoCadastro);

        }catch(\Exception $e)
        {
            $error = $e->getMessage();
            return view('home.register', ['error'=> $error, 'request'=> $request]);
            unset($error);
        }

    }


    public function logout()
    {
        session_start();

        if(isset($_SESSION['usuario']))
        {
            session_destroy();

            return redirect('/login');
            exit;
        }
    }


    public function listarClientes()
    {
        session_start();

        if(!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso == 3)
        {

        }
    }
}
