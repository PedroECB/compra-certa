@extends('layout.main')


@section('linkcss')

    <link rel="stylesheet" href="{{ asset('css/purchase-evaluation.css') }}">

@endsection

@section('title', 'Minhas compras')

@section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-star"
                                    aria-hidden="true"></i> Avaliação de compra - #{{ $compra->id_compra }}</h4>
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

                                            <li class="list-group-item">{{ count($compra->produtosCompra) }} Itens - Total <span class="green-price" style="font-size: 1em;">R$ {{ number_format($compra->total, 2, ',', '.') }}</span></li>
                                            <li class="list-group-item header">Como você avalia a sua experiência conosco?
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                {{-- FORM --}}
                                <form method="POST">
                                    @csrf
                                    <input type="hidden" name="idCompra" value="{{$compra->id_compra}}">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <select name="parecer" id="selectAvaliacao" class="form-control" required>

                                            @foreach($listaParecer as $parecer)
                                                <option value="{{$parecer->id_parecer}}">{{$parecer->descricao_parecer}}</option>
                                            @endforeach
                                            {{-- <option value="1">Ótima</option>
                                            <option value="2">Boa</option>
                                            <option value="3">Ruim</option> --}}

                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <textarea name="comentario" id="comentario" cols="30" rows="3" class="form-control"
                                            placeholder="Comentário" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>
                                            <button href="#" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-star" aria-hidden="true"></i>
                                                 Avaliar
                                            </button>
                                        </div>
                                        <div>
                                            <a class="btn btn-sm btn-link font-weight-bold" onclick="window.history.back()"> Voltar</a>
                                        </div>


                                    </div>
                                </div>
                                 </form>
                                {{-- FORM --}}
                            </div>
                        </div>
                    </div>


                    <!-- DADOS DO ENDEREÇO -->
                </div>

            </div>
        </div>
    </div>

@endsection