
    @extends('layout.main')


    @section('linkcss')

      <link rel="stylesheet" href="{{ asset('/css/buy-performed.css') }}">

    @endsection

    @section('title', 'Carrinho')

    @section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold text-success text-center"><i class="fa fa-check"
                                    aria-hidden="true"></i>
                                Compra realizada com sucesso</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <h5 class="font-kalam font-weight-bold"><i class="fa fa-dropbox" aria-hidden="true"></i>
                                    EM PREPARAÇÃO</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 box-icon-prepare">
                                        <img src="./img/undraw_empty_xct9.png" class="" alt="">
                                        <h5 class="font-kalam">Estamos preparando a sua compra</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush font-kalam" style="border-radius: 5px;">
                                            <li class="list-group-item header">Itens </li>

                                            @foreach($carrinho as $produtoCarrinho)
                                            <li class="list-group-item">{{$produtoCarrinho->nome_produto }} - {{$produtoCarrinho->qnt}} Und(s) - <span class="green-price" style="font-size: 1em;">R$ {{ number_format($produtoCarrinho->totalProduto, 2, ',', '.') }}</span> </li>
                                            @endforeach

                                            <li class="list-group-item header">Informações adicionais</li>
                                            <li class="list-group-item">{{count($carrinho)}} Itens - Total <span class="green-price" style="font-size: 1em;">R$ {{ number_format($somaCarrinho, 2, ',', '.') }}</span></li>
                                            <li class="list-group-item">Pagamento - Cartão de crédito </li>
                                            <li class="list-group-item">Status - Em preparação </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 d-flex justify-content-between">
                                        <div>
                                            {{-- <a href="#" class="btn btn-sm btn-info btn-primary-blue" style="font-size: 0.9em;"><i
                                                    class="fa fa-refresh" aria-hidden="true"></i> Repetir
                                                pedido</a> --}}
                                            <a href="{{url('/clientes/minhas-compras')}}" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Visualizar minhas compras</a>


                                        </div>
                                        <div>
                                            {{-- <button class="btn btn-sm btn-danger font-weight-bold" onclick="return confirm('Deseja realmente cancelar essa compra?')"><i class="fa fa-times" aria-hidden="true"></i> Cancelar compra</button> --}}
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