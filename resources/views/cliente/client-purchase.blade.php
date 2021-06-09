
    @extends('layout.main')


    @section('linkcss')

      <link rel="stylesheet" href="{{ asset('css/client-purchases.css') }}">

    @endsection

    @section('title', 'Visualizar Compra')

    @section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Compra - #{{ $compra->id_compra }}</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold">
                                    Detalhes da compra</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush font-kalam" style="border-radius: 5px;">
                                            <li class="list-group-item header">Itens </li>
                                            @foreach($compra->produtosCompra as $produto)
                                                <li class="list-group-item">{{ $produto->nome_produto }} - {{ $produto->qnt }} Und(s) - <span class="green-price" style="font-size: 1em;">R$ {{ number_format($produto->total, 2, ',', '.') }}</span> </li>
                                            @endforeach
                                            {{-- <li class="list-group-item">Carne Bovina kg - 1 Und(s) - <span class="green-price" style="font-size: 1em;">R$ 35,90</span> </li>
                                            <li class="list-group-item">Cachaça 51 - 1 Und(s) - <span class="green-price" style="font-size: 1em;">R$ 8,90</span> </li> --}}

                                            <li class="list-group-item header">Informações adicionais - #{{ $compra->id_compra }}</li>
                                            <li class="list-group-item">{{count($compra->produtosCompra)}} Itens - Total <span class="green-price" style="font-size: 1em;">R$ {{ number_format($compra->total, 2, ',', '.') }}</span></li>
                                            <li class="list-group-item">Pagamento - Cartão de crédito </li>
                                            <li class="list-group-item font-weight-bold text-primary">Status - {{ $compra->descricao_status }} </li>
                                            <li class="list-group-item header">Endereço de Entrega</li>
                                            <li class="list-group-item">{{ $compra->rua }}, Nº {{ $compra->numero }}, {{ $compra->bairro }}, {{ $compra->cidade }}, {{ $compra->cep }} </li>
                                            <li class="list-group-item" style="font-size: 0.9em; color: gray;">{{ $compra->ponto_de_referencia }} </li>

                                            @if($compra->avaliacao_compra_id_avaliacao_compra != null)
                                                <li class="list-group-item header">Avaliação</li>
                                                <li class="list-group-item">Experiência - {{ $compra->descricao_parecer }} </li>
                                                <li class="list-group-item">Comentário - {{ $compra->comentario }} </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>

                                            <a href="./cart.html" class="btn btn-sm btn-info btn-primary-blue disabled" style="font-size: 0.9em;"><i
                                                    class="fa fa-refresh" aria-hidden="true"></i> Repetir
                                                pedido</a>
                                            <a href="{{url('/clientes/minhas-compras')}}" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Visualizar minhas compras</a>

                                            @if(!$compra->avaliacao_compra_id_avaliacao_compra && $compra->status_id_status == 4)
                                                <a href="{{ url('/clientes/avaliar-compra/'.$compra->id_compra) }}" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-star" aria-hidden="true"></i> Avaliar</a>
                                            @endif

                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-default font-weight-bold" onclick="window.history.back()"> Voltar</button>
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