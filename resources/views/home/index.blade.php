 @extends('layout.main')

 @section('title', 'Página inicial')

 @section('content')
     <!-- Carrousel -->

     <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
             <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
             <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
             <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <img src="./img/capa1.png" class="d-block w-100" alt="...">

             </div>
             <div class="carousel-item">
                 <img src="./img/capa2.png" class="d-block w-100" alt="...">
             </div>
             <div class="carousel-item">
                 <img src="./img/capa3.png" class="d-block w-100" alt="...">
                 <div class="carousel-caption d-none d-md-block">
                     <h5>Third slide label</h5>
                     <p>Some representative placeholder content for the third slide.</p>
                 </div>
             </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
             <i class="fa fa-chevron-circle-left primary-blue-text" style="font-size: 2.5em;" aria-hidden="true"></i>
             <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
             <i class="fa fa-chevron-circle-right primary-blue-text" style="font-size: 2.5em;" aria-hidden="true"></i>
             <span class="sr-only"></span>
         </a>
     </div>


     <!-- Ofertas do dia -->
     <div class="promo-box box-shaded">
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

     <!-- Produtos -->
     <div>
         <div class="box-text">
             <h3 class="font-kalam primary-blue-text font-weight-bold">Produtos</h3>
         </div>
         <div class="nav-products container-fluid w-75">
             <ul class="nav nav-tabs justify-content-center">
                 <li class="nav-item">
                     <a class="nav-link active primary-blue-text font-kalam" href="#">Todos</a>
                 </li>
                 @foreach ($categorias as $categoria)
                     <li class="nav-item">
                         <a class="nav-link primary-blue-text font-kalam" href="{{ url('products/filter/?category=' . mb_strtolower($categoria->descricao_categoria)) }}">
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
