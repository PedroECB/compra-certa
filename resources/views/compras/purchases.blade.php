@extends('layout.main')


@section('linkcss')

    <link rel="stylesheet" href="{{ asset('css/purchases.css') }}">

@endsection

@section('title', 'Minhas compras')

@section('content')


    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Compras</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    FILA DE COMPRAS</h3>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead class="bg-dark-blue text-white font-weight-bold font-kalam">
                                        <tr>
                                            <td>ID</td>
                                            <td>STATUS</td>
                                            <td>QNT ITENS</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody class="font-kalam">
                                        @foreach($compras as $compra)
                                        <tr>
                                            <td>#{{$compra->id_compra}}</td>

                                            @if($compra->id_status == 1)
                                                <td class="font-weight-bold text-primary"><i class="fa fa-dropbox" aria-hidden="true"></i>Em preparação</td>
                                            @endif

                                            @if($compra->id_status == 2)
                                            <td class="font-weight-bold text-info"><i class="fa fa-gift" aria-hidden="true"></i>
                                                Conferência e Embalagem
                                            </td>
                                            @endif

                                            @if($compra->id_status == 3)
                                            <td class="font-weight-bold text-dark"><i class="fa fa-truck" aria-hidden="true"></i>
                                                Entrega
                                            </td>
                                            @endif

                                            @if($compra->id_status == 4)
                                            <td class="font-weight-bold text-success">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Finalizada
                                            </td>
                                            @endif
                                            <td>{{$compra->qntItens}}</td>
                                            <td><a href="{{url('/compras/visualizar/'.$compra->id_compra)}}" class="btn btn-link btn-sm">Visualizar</a></td>
                                        </tr>
                                        @endforeach

                                        @if(count($compras) == 0)
                                            <td colspan="4">
                                                <h3 class="text-center"> Nenhuma compra disponível </h3>
                                            </td>
                                        @endif
                                    </tbody>
                                </table>

                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>


                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-link font-weight-bold" onclick="window.history.back()"> Voltar</button>
                                        </div>


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