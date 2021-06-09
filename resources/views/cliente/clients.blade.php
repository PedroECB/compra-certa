@extends('layout.main')


@section('linkcss')

    <link rel="stylesheet" href="{{ asset('/css/clients.css') }}">

@endsection

@section('title', 'Clientes')


@section('content')


    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-users"
                                    aria-hidden="true"></i>
                                Clientes</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    LISTA DE CLIENTES</h3>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead class="bg-dark-blue text-white font-weight-bold font-kalam">
                                        <tr>
                                            <td><i class="fa fa-user" aria-hidden="true"></i> NOME</td>
                                            <td><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL</td>
                                            <td></td>

                                        </tr>
                                    </thead>
                                    <tbody class="font-kalam">
                                        @foreach ($clientes as $cliente)
                                            <tr>
                                                <td>{{$cliente->nome}}</td>
                                                <td class="font-weight-bold text-primary">
                                                   {{$cliente->email}}
                                                </td>
                                                <td><a href="{{ url('/clientes/show/'.$cliente->id_usuario) }}" class="btn btn-link btn-sm">Visualizar</a></td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>Maria Costa de Oliveira</td>
                                            <td class="font-weight-bold text-primary">
                                                mariazinha@hotmail.com
                                            </td>
                                            <td><a href="./client.html" class="btn btn-link btn-sm">Visualizar</a></td>

                                        </tr>
                                        <tr>
                                            <td>Paulo Silveira Mendes</td>
                                            <td class="font-weight-bold text-primary">
                                                paulinho@yahoo.com.br
                                            </td>
                                            <td><a href="./client.html" class="btn btn-link btn-sm">Visualizar</a></td>

                                        </tr> --}}
                                    </tbody>
                                </table>

                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        {{-- <div>
                                            <a href="./client-create.html"
                                                class="btn btn-info btn-sm font-weight-bold bg-dark-blue"><i
                                                    class="fa fa-plus"></i> Adicionar Cliente</a>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-link font-weight-bold"
                                                onclick="window.history.back()"> Voltar</button>
                                        </div> --}}


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
