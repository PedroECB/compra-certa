
    @extends('layout.main')


    @section('linkcss')

      <link rel="stylesheet" href="{{ asset('/css/cart.css') }}">

    @endsection

    @section('title', 'Carrinho')

    @section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-cart">
                        <div class="d-flex justify-content-between px-2 font-kalam">
                            <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</h4>
                            <h5> {{ count($carrinho) }} Itens</h5>
                        </div>
                        <hr>
                        <table class="table text-center font-kalam table-cart table-striped">
                            <thead style="color: gray;">
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($carrinho as $produto)
                                <tr>
                                    <td>
                                        <div class="box-product">
                                            <img src="{{ asset('img/produtos/' . $produto->url_img) }}" alt="">
                                            <div>
                                                <span class="font-weight-bold">{{ $produto->nome_produto }}</span>
                                                <span style="color: gray;">{{ $produto->descricao_categoria }}</span>
                                                <span class="green-price font-weight-bold" style="font-size: 1.2em;">R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                                <a href="{{url('/cart/removerProduto/'.$produto->id_produto)}}" style="font-size: small; color: red;">Remover</a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold">
                                        <div class="qnt-box">
                                            {{-- <button class="btn btn-sm minus" onclick="decrementProduct(this)"><i class="fa fa-minus" aria-hidden="true"></i></button> --}}
                                            <input type="text" min="1" max="10" id="inputQnt" value="{{ $produto->qnt }}" style="border: none"
                                                class="form-control form-control-sm text-center" readonly>
                                            {{-- <button class="btn btn-sm plus" onclick="incrementProduct(this)"><i class="fa fa-plus" aria-hidden="true"></i></button> --}}
                                        </div>
                                    </td>
                                    <td class="green-price font-weight-bold" style="font-size: 1.3em;">R$ {{ number_format($produto->totalProduto, 2, ',', '.') }}</td>

                                </tr>
                                @endforeach

                                @if(count($carrinho) == 0)
                                <tr>
                                    <td colspan="3">
                                        <h3 class="text-center">Seu carrinho está vazio...</h3>
                                    </td>
                                </tr>
                                @endif
                                {{-- <tr>
                                    <td>
                                        <div class="box-product">
                                            <img src="./img/produtos/feature-1.jpg" alt="">
                                            <div>
                                                <span class="font-weight-bold">Carne Bovina Kg</span>
                                                <span style="color: gray;">Bebidas</span>
                                                <span class="green-price font-weight-bold" style="font-size: 1.2em;">R$
                                                    35,99</span>
                                                <a href="#" style="font-size: small; color: red;">Remover</a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold">
                                        <div class="qnt-box">
                                            <button class="btn btn-sm minus" onclick="decrementProduct(this)"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                            <input type="text" min="1" max="10" id="inputQnt" value="1"
                                                class="form-control form-control-sm text-center" readonly>
                                            <button class="btn btn-sm plus" onclick="incrementProduct(this)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                    <td class="green-price font-weight-bold" style="font-size: 1.3em;">R$ 35,99</td>
                                </tr> --}}

                            </tbody>
                        </table>
                        <div style="display: flex; justify-content: space-between; position:absolute; bottom: 10px; width: 80%;">
                            <a href="#" onclick="window.history.back()" class="btn btn-default font-weight-bold primary-blue-text font-kalam" >
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Voltar
                            </a>
                            <a href="{{ url('/cart/limparCarrinho') }}" style="color:red; font-size: 0.9em;">Limpar carrinho</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-detail">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold">Resumo de compra</h4>
                        </div>
                        <hr>
                        <div class="px-4 font-kalam">
                            <form action="./checkout.html" method="GET">
                                <div class="d-flex justify-content-between">
                                    <span style="font-size: 1.3em;">Itens</span>
                                    <span class="font-weight-bold" style="font-size: 1.3em;">
                                        R$ {{ number_format($somaCarrinho, 2, ',', '.') }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span style="font-size: 1.3em;">Frete</span>
                                    <span class="font-weight-bold green-price" style="font-size: 1.3em;">
                                        Grátis
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <span style="font-size: 1.3em;">Total </span>
                                    <span class="font-weight-bold" style="font-size: 1.6em;">
                                        R$ {{ number_format($somaCarrinho, 2, ',', '.') }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">

                                    <button type="submit" class="btn btn-block font-weight-bold text-white" style="height: 50px; font-size: 0.9em; background-color: #149459;">
                                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                        AVANÇAR
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection