@extends('layout.main')


@section('linkcss')

    <link rel="stylesheet" href="{{ asset('css/client-purchases.css') }}">

@endsection

@section('title', 'Minhas compras')

@section('content')


    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i>
                                Minhas compras</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    LISTA DE COMPRAS</h3>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead class="bg-dark-blue text-white font-weight-bold font-kalam">
                                        <tr>
                                            <td>DATA</td>
                                            <td>QNT ITENS</td>
                                            <td>TOTAL</td>
                                            <td>STATUS</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody class="font-kalam">

                                        @foreach ($compras as $compra)
                                            <tr>
                                                <td>{{ date_format(new DateTime($compra->hora_compra), 'd/m/y') }}</td>
                                                <td>{{ $compra->qntItens }}</td>
                                                <td class="green-price" style="font-size: 1em;">R$
                                                    {{ number_format($compra->total, 2, ',', '.') }}</td>
                                                <td>
                                                    @if ($compra->id_status == 1)
                                                        <i class="fa fa-dropbox" aria-hidden="true"></i>
                                                        {{ $compra->descricao_status }}
                                                    @endif

                                                    @if ($compra->id_status == 2)
                                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                                        {{ $compra->descricao_status }}
                                                    @endif

                                                    @if ($compra->id_status == 3)
                                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                                        Em trânsito
                                                    @endif

                                                    @if ($compra->id_status == 4)
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        {{ $compra->descricao_status }}
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('/clientes/minhas-compras/' . $compra->id_compra) }}"
                                                        class="btn btn-link btn-sm">Visualizar</a></td>
                                            </tr>
                                        @endforeach

                                        @if (count($compras) == 0)
                                            <tr>
                                                <td colspan="5">
                                                    <h3 class="text-center">Nenhuma compra realizada</h3>
                                                </td>
                                            </tr>
                                        @endif

                                        {{-- <tr>
                                            <td>#1523</td>
                                            <td>07/03/2021</td>
                                            <td>1</td>
                                            <td class="green-price" style="font-size: 1em;">R$ 8,98</td>
                                            <td><a href="./client-purchase.html" class="btn btn-link btn-sm">Visualizar</a></td>

                                        </tr>
                                        <tr>
                                            <td>#1813</td>
                                            <td>09/03/2021</td>
                                            <td>1</td>
                                            <td class="green-price" style="font-size: 1em;">R$ 44,98</td>
                                            <td><a href="./client-purchase.html" class="btn btn-link btn-sm">Visualizar</a></td>
                                        </tr> --}}
                                    </tbody>
                                </table>

                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>


                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-link font-weight-bold"
                                                onclick="window.history.back()"> Voltar</button>
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
