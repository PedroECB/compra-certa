@extends('layout.main')


@section('linkcss')

  <link rel="stylesheet" href="{{ asset('/css/clients.css') }}">

@endsection

@section('title', 'Consulta Gerente')


@section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-line-chart" aria-hidden="true"></i>
                                Relatório de compras</h4>
                        </div>
                        <hr>
                        {{-- <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    Lista de Compras Ativas</h3>
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
                                        <tr>
                                            <td>#1423</td>
                                            <td class="font-weight-bold text-primary">
                                                <i class="fa fa-dropbox" aria-hidden="true"></i>
                                                Em preparação
                                            </td>
                                            <td>2</td>
                                            <td><a href="./purchase.html" class="btn btn-link btn-sm">Visualizar</a></td>
                                        </tr>
                                        <tr>
                                            <td>#1413</td>
                                            <td class="font-weight-bold text-info"><i class="fa fa-gift" aria-hidden="true"></i>
                                                Conferência e Embalagem
                                            </td>
                                            <td>1</td>
                                            <td><a href="./purchase.html" class="btn btn-link btn-sm">Visualizar</a></td>
                                        </tr>
                                        <tr>
                                            <td>#1321</td>
                                            <td class="font-weight-bold text-success">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Entregue
                                            </td>
                                            <td>1</td>
                                            <td><a href="./purchase.html" class="btn btn-link btn-sm">Visualizar</a></td>
                                        </tr>
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
                        </div> --}}

                        <!-- Indicadores -->
                        <div class="card mt-2">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    <i class="fa fa-area-chart" aria-hidden="true"></i> Indicadores </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush font-kalam" style="border-radius: 5px;">
                                            <li class="list-group-item header">Indicadores de tempo de entrega </li>
                                            <li class="list-group-item">Tempo médio de entrega -  <span class="green-price" style="font-size: 1em;"> 1 hora e 20 minutos</span> </li>
                                            <li class="list-group-item">Menor tempo de entrega registrado -  <span class="green-price" style="font-size: 1em;"> 35 minutos</span> </li>
                                            <li class="list-group-item">Maior tempo de entrega registrado -  <span class="green-price" style="font-size: 1em;"> 2 hora e 27 minutos</span> </li>

                                            <li class="list-group-item header">Tempo médio de retenção de mercadoria dos setores </li>
                                            <li class="list-group-item">Preparação -  <span class="green-price" style="font-size: 1em;"> 19 minutos</span> </li>
                                            <li class="list-group-item">Conferência e embalagem -  <span class="green-price" style="font-size: 1em;"> 13 minutos</span> </li>
                                            <li class="list-group-item">Entrega -  <span class="green-price" style="font-size: 1em;"> 45 minutos</span> </li>

                                            <li class="list-group-item header">Bairros mais atendidos </li>
                                            <li class="list-group-item"> #1 Pituba -  <span class="green-price" style="font-size: 1em;"> 62 compras realizadas</span> </li>
                                            <li class="list-group-item">#2 Itaigara -  <span class="green-price" style="font-size: 1em;"> 37 compras realizadas</span> </li>
                                            <li class="list-group-item">#3 Pernambués -  <span class="green-price" style="font-size: 1em;"> 21 compras realizadas</span> </li>

                                            <li class="list-group-item header">Produtos mais vendidos </li>
                                            <li class="list-group-item">#1 Cachaça 51 -  <span class="green-price" style="font-size: 1em;"> 83 unidades vendidas</span> </li>
                                            <li class="list-group-item">#2 Corote -  <span class="green-price" style="font-size: 1em;"> 63 unidades vendidas</span> </li>
                                            <li class="list-group-item">#3 Bolo de Tapioca -  <span class="green-price" style="font-size: 1em;"> 52 unidades vendidas</span> </li>

                                            <li class="list-group-item header"><i class="fa fa-usd" aria-hidden="true"></i> Indicadores de receita por categoria  </li>
                                            <li class="list-group-item">Bebidas-  <span class="green-price" style="font-size: 1em;"> R$ 22.421,92</span> </li>
                                            <li class="list-group-item">Açougue -  <span class="green-price" style="font-size: 1em;"> R$ 12.231,92</span> </li>
                                            <li class="list-group-item">Padaria -  <span class="green-price" style="font-size: 1em;"> R$ 7.121,92</span> </li>

                                            <li class="list-group-item">Total arrecadado -  <span class="green-price" style="font-size: 1em;"> R$ 42.321,92</span> </li>


                                        </ul>
                                    </div>
                                </div>

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

