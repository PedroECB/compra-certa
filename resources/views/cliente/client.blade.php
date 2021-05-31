@extends('layout.main')


@section('linkcss')
  <link rel="stylesheet" href="{{ asset('/css/client.css') }}">
@endsection

@section('title', 'Cliente')


@section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-user" aria-hidden="true"></i> Cliente - João Cordeiro dos Santos </h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    Informações do cliente</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush font-kalam" style="border-radius: 5px;">
                                            <li class="list-group-item header">Dados </li>
                                            <li class="list-group-item">Nome: {{ $cliente->nome }}</li>
                                            <li class="list-group-item">Email: {{ $cliente->email }}</li>
                                            <li class="list-group-item">CPF: {{ $cliente->cpf }}</li>
                                            {{-- <li class="list-group-item">Senha - ***********</li> --}}

                                            <li class="list-group-item header">Endereço de entrega padrão</li>
                                            <li class="list-group-item">Cidade: {{ $enderecoPadrao->cidade }}</li>
                                            <li class="list-group-item">Bairro: {{ $enderecoPadrao->bairro }}</li>
                                            <li class="list-group-item">Rua: {{ $enderecoPadrao->rua }}</li>
                                            <li class="list-group-item">CEP: {{ $enderecoPadrao->cep }}</li>
                                            <li class="list-group-item">Nº: {{ $enderecoPadrao->numero }}</li>
                                            <li class="list-group-item"> Ponto de Referência: <span style="font-size: 0.9em; color: gray;"> {{ $enderecoPadrao->ponto_de_referencia }} </span></li>

                                            <li class="list-group-item">
                                                <span style="font-size: 0.9em; color: gray;">
                                                    {{ $enderecoPadrao->rua}}, Nº {{$enderecoPadrao->numero}}, {{ $enderecoPadrao->bairro }}, {{$enderecoPadrao->cidade}}, {{$enderecoPadrao->cep}}
                                                </span>
                                             </li>


                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>
                                            <a href="{{url('/clientes/edit/'.$cliente->id_usuario)}}" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                        </div>
                                        <div>
                                            <a href="{{url('/clientes/listar')}}" onclick="window.history.back()" class="btn btn-sm btn-default font-weight-bold" style="font-size: 0.9em;">
                                                Voltar
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- DADOS DO ENDEREÇO -->
                </div>

            </div>
        </div>
    </div>

@endsection