@extends('layout.main')


@section('linkcss')

  <link rel="stylesheet" href="{{ asset('/css/product.css') }}">

@endsection

@section('title', 'Produto')


@section('content')

  <div class="container">
    <div class="card-product-container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('img/produtos/' . $produto->url_img) }}" class="product-img" alt="">
        </div>
        <div class="col-md-6" >
          <div class="card-detail">
            <h4 class="font-kalam primary-blue-text product-name font-weight-bolder">{{$produto->nome_produto}}</h5>
              <hr>
              @if(isset($produto->desconto))
              {{-- Produto com desconto --}}
              De: R$ {{ number_format($produto->valor, 2, ',', '.') }} por apenas
              <h5 class="font-kalam"><span class="green-price font-weight-bolder">R$ {{ number_format($produto->valor * ((100 - $produto->desconto) / 100), 2, ',', '.') }}</span></h5>
              @else
              {{-- Produto sem desconto --}}
              <h5 class="font-kalam"><span class="green-price font-weight-bolder">R$ {{ number_format($produto->valor, 2, ',', '.') }}</span></h5>
              @endif

              <div class="">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item font-kalam"> {{ $produto->descricao_produto }}</li>
                  <li class="list-group-item font-kalam" style="font-size: 1em;"><b>Categoria:</b> {{$produto->descricao_categoria}}</li>

                  @if(isset($produto->desconto))
                    <li class="list-group-item font-kalam font-weight-bolder" style="font-size: 1em;">
                      <b>Total:</b>
                      <span class="green-price" style="font-size: 1.2em;">R$ <span id="spanValor" data-price="{{ number_format($produto->valor * ((100 - $produto->desconto) / 100), 2, ',', '.') }}"></span>{{ number_format($produto->valor * ((100 - $produto->desconto) / 100), 2, ',', '.') }}</span>
                    </li>
                  @else
                  <li class="list-group-item font-kalam font-weight-bolder" style="font-size: 1em;">
                    <b>Total:</b>
                    <span class="green-price" style="font-size: 1.2em;">R$ <span id="spanValor" data-price="{{ number_format($produto->valor, 2, ',', '.') }}"></span>{{ number_format($produto->valor, 2, ',', '.') }}</span>
                  </li>
                  @endif
                </ul>
              </div>
              <form method="POST" action="/cart/addproduct">
                @csrf
                <span class="text-qnt font-kalam">Quantidade</span>
                <div class="qnt-box">
                  <input type="hidden" name="idProduto" value="{{ $produto->id_produto }}">
                  <input type="hidden" name="valorProduto" value="{{ isset($produto->desconto) ? $produto->valor * ((100 - $produto->desconto) / 100) : $produto->valor }}">
                  {{-- <button class="btn btn-sm minus" onclick="decrementProduct()"><i class="fa fa-minus" aria-hidden="true"></i></button> --}}
                  <input type="number" min="1" max="10" name="qntProduto" id="inputQnt" maxlength="2" value="1" class="form-control form-control-sm text-center">
                  {{-- <button class="btn btn-sm plus" onclick="incrementProduct()"><i class="fa fa-plus"  aria-hidden="true"></i></button> --}}
                </div>
                <div style="display: flex; justify-content: space-between;">
                  <button type="submit" class="btn btn-primary-blue" style="font-size: 0.9em;">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    Adicionar ao carrinho
                  </button>
                  <a class="btn btn-sm btn-default font-kalam" onclick="window.history.back()">Voltar</a>
                </div>
              </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>

 var valorProduto;
 var qntProduto;

    setTimeout(()=>{
      valorProduto = document.getElementById('spanValor').getAttribute('data-price').replace(',','.')
      qntProduto = document.getElementById('inputQnt')
      // console.log(valorProduto.getAttribute('data-price'))
      // console.log(qntProduto)

    }, 1500)

  function decrementProduct(){
    console.log('Diminuindo quantidade de produto')
  }

  function incrementProduct(){
    console.log('Aumentando quantidade de produto')
    console.log(valorProduto)
    console.log(parseInt(qntProduto.value))
    let novoValor = parseFloat(valorProduto) * parseInt(qntProduto.value)

    console.log('Novo valor...')
    console.log(novoValor)

  }



  </script>
@endsection