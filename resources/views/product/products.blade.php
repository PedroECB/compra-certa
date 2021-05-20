@extends('layout.main')

@section('title', 'Página inicial')

@section('content')
    <!-- Ofertas do dia -->

    @if (Request::query('category') == null)

        <div class="promo-box box-shaded" style="margin-top: 100px;">
            <div class="box-text">
                <h3 class="font-kalam primary-blue-text font-weight-bold">Promoção do dia</h3>
            </div>
            <div class="cards-promo">


                <!-- Card Promo 1 -->
                @foreach ($produtosPromocao as $produto)
                    <div class="card">
                        <div class="ribbon-wrapper-green">
                            <div class="ribbon-green"> {{ $produto->desconto }}% OFF</div>
                        </div>
                        {{-- <img src="./img/produtos/feature-1.jpg" alt=""> --}}
                        <img src="{{ asset('img/produtos/' . $produto->url_img) }}" alt="">

                        <div>
                            <h4 class="text-center product-name">{{ $produto->nome_produto }}</h4>
                            <span class="d-block text-center price"><span class="line-trough-price font-kalam">R$
                                    {{ number_format($produto->valor, 2, ',', '.') }}</span></span>
                            <span class="d-block text-center price"><span class="green-price font-kalam"> R$
                                    {{ number_format($produto->valor * ((100 - $produto->desconto) / 100), 2, ',', '.') }}
                                </span></span>
                        </div>
                        <a href="./product.html" class="btn btn-lg btn-primary-blue btn-buy">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Comprar
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

    @endif


    <!-- Produtos -->
    <div {{ Request::query('category') != null ? 'style=margin-top:100px;' : '' }}>
        <div class="box-text">
            <h3 class="font-kalam primary-blue-text font-weight-bold">Produtos</h3>
        </div>
        <div class="nav-products container-fluid w-75">
            <ul class="nav nav-tabs justify-content-center mt-1">
                <li class="nav-item">
                    <a class="nav-link primary-blue-text font-kalam {{ Request::query('category') == null ? 'active' : '' }}"
                        href="/products">Todos </a>
                </li>
                @foreach ($categorias as $categoria)
                    <li class="nav-item">
                        <a class="nav-link primary-blue-text font-kalam {{ Request::query('category') == mb_strtolower($categoria->descricao_categoria) ? 'active' : '' }}"
                            href="{{ url('products/filter/?category=' . mb_strtolower($categoria->descricao_categoria)) }}">
                            {{ $categoria->descricao_categoria }}
                        </a>
                    </li>
                @endforeach


            </ul>
        </div>

        <!-- PRODUTOS PRINCIPAIS -->
        <div class="products">

            @foreach ($produtos as $produto)
                <div class="card">
                    <img src="{{ asset('img/produtos/' . $produto->url_img) }}" alt="">
                    <div>
                        <h4 class="text-center product-name">{{ $produto->nome_produto }}</h4>
                        <span class="d-block text-center price"><span class="green-price font-kalam"> R$
                                {{ number_format($produto->valor, 2, ',', '.') }}</span></span>
                    </div>
                    <button class="btn btn-lg btn-primary-blue btn-buy">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Comprar
                    </button>
                </div>
            @endforeach

        </div>
    </div>

@endsection
