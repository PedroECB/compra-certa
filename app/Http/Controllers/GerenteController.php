<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\EnderecoUsuario;

class GerenteController extends Controller
{
    public function exibirConsultas()
    {
        if(!Controller::verifySession() || $_SESSION['usuario']->nvlAcesso !== 1)
        {
            return redirect('/login');
            exit;
        }

        return view('gerente.manager-query', ['session'=> $_SESSION]);

    }
}
