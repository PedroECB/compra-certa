
@extends('layout.main')


@section('linkcss')

    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">

@endsection

@section('title', 'Avaliar compra')

@section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Compra - #{{$compra->id_compra}}</h4>
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

                                            <li class="list-group-item header">Informações adicionais - #1323</li>
                                            <li class="list-group-item">{{count($compra->produtosCompra) }} Item(s) - Total <span class="green-price"
                                                    style="font-size: 1em;">R$ {{ number_format($compra->total, 2, ',', '.') }}</span></li>
                                            <li class="list-group-item">Pagamento - Cartão de crédito </li>
                                            <li class="list-group-item font-weight-bold">Status - {{ $compra->descricao_status }} </li>
                                            <li class="list-group-item">Data do pedido - {{ date_format(new DateTime($compra->hora_compra),'d/m/y H:i') }} </li>

                                            <li class="list-group-item header">Endereço de entrega da compra</li>
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
                                        @if($session['usuario']->perfil_id_perfil == 2)
                                            <div>
                                                <a href="{{url('/compras/enviar-para-conferencia/'.$compra->id_compra)}}" class="btn btn-sm btn-info btn-primary-blue" style="font-size: 0.9em;">
                                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                                    Enviar para conferência
                                                </a>
                                            </div>
                                        @endif

                                        @if($session['usuario']->perfil_id_perfil == 3)
                                            <a href="{{url('/compras/enviar-para-preparacao/'.$compra->id_compra)}}" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-undo" aria-hidden="true"></i>
                                                Retornar para preparação
                                            </a>

                                            <a href="{{url('/compras/enviar-para-entrega/'.$compra->id_compra)}}" class="btn btn-sm btn-info btn-primary-blue" style="font-size: 0.9em;">
                                                <i class="fa fa-truck" aria-hidden="true"></i>
                                                Enviar para entrega
                                            </a>
                                        @endif

                                        @if($session['usuario']->perfil_id_perfil == 4)
                                        <div>
                                            <a href="{{url('/compras/entregar/'.$compra->id_compra)}}" class="btn btn-sm btn-success font-weight-bold" style="font-size: 0.9em;">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Confirmar entrega
                                            </a>
                                        </div>
                                        @endif


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
