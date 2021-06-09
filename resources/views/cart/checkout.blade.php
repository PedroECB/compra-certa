
    @extends('layout.main')


    @section('linkcss')

      <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">

    @endsection

    @section('title', 'Carrinho')

    @section('content')


    <div class="container">
        <div class="cart-product-container">
            <form onsubmit="submitForm(this)" method="POST">
            @csrf
            <input type="hidden" name="idEnderecoPadrao" value="{{$enderecoPadrao->id_endereco_usuario}}">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-payment">
                        <div class="d-flex justify-content-between px-2 font-kalam">
                            <h4 class="font-weight-bold"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                Pagamento</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <img src="{{ asset('img/flags-card-credit.svg/') }}" class="" alt="">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control font-kalam" name="numCartao" maxlength="19"
                                                placeholder="Número do cartão" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control font-kalam" maxlength="3" placeholder="CVV" name="cvvCartao"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control font-kalam" maxlength="50" name="nomeCartao"
                                                placeholder="Nome no cartão" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="mesCartao" id="mes" class="form-control font-kalam" required>
                                            <option value="" disabled selected>Val/Mês</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="anoCartao" id="ano" class="form-control font-kalam" required>
                                            <option value="" disabled selected>Val/Ano</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <select name="parcela" id="Parcelas" class="form-control font-kalam" required>
                                                <option value="" disabled selected>Parcelas</option>
                                                <option value="1">1x - {{ number_format($somaCarrinho, 2, ',', '.') }} </option>
                                                <option value="2">2x - {{ number_format(($somaCarrinho/2), 2, ',', '.') }} </option>
                                                <option value="3">3x - {{ number_format(($somaCarrinho/3), 2, ',', '.') }} </option>
                                                <option value="4">4x - {{ number_format(($somaCarrinho/4), 2, ',', '.') }} </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- DADOS DO ENDEREÇO -->

                    <div class="box-payment mt-0">
                        <div class="d-flex justify-content-between px-2 font-kalam">
                            <h4 class="font-weight-bold"><i class="fa fa-home" aria-hidden="true"></i> Endereço de
                                entrega</h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <select name="enderecoTipo" id="enderecoTipo"
                                                class="form-control font-kalam" onchange="changeAddress(this)">
                                                <option value="enderecoPadrao" selected>Endereço Padrão</option>
                                                <option value="novoEndereco">Outro Endereço</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="enderecoPadrao">
                                    <div class="col-12">
                                        <div class="card px-3 py-1 font-kalam mb-3">

                                            <span>{{ $enderecoPadrao->rua }}, Nº {{$enderecoPadrao->numero}}, {{$enderecoPadrao->bairro}}, {{$enderecoPadrao->cidade}}, {{$enderecoPadrao->cep}}</span>
                                            <span class="blockquote-footer">{{ $enderecoPadrao->ponto_de_referencia }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="novoEndereco" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-building" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control font-kalam" placeholder="Cidade" name="cidadeNovoEndereco">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-md-0">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-map" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control font-kalam" placeholder="Bairro" name="bairroNovoEndereco">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-asterisk" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="tel" class="form-control font-kalam" placeholder="CEP" name="cepNovoEndereco">
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-md-0">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control font-kalam" placeholder="Rua" name="ruaNovoEndereco">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-home" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control font-kalam" name="numeroNovoEndereco"
                                                    placeholder="Número">
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-md-0">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control font-kalam" name="pontoReferenciaNovoEndereco"
                                                    placeholder="Ponto de referência">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block text-white font-weight-bold mt-2 mb-4"
                            style="background-color: #149459;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            CONFIRMAR COMPRA
                        </button>
                        <a href="./products.html" class="btn btn-default font-weight-bold primary-blue-text font-kalam">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Voltar para carrinho
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-detail">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold">Resumo de compra</h4>
                        </div>
                        <hr>
                        <div class="px-4 font-kalam">
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
                                {{-- <button class="btn btn-block bg-danger font-weight-bold text-white"
                                    style="height: 50px; font-size: 0.9em;">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                    CANCELAR COMPRA
                                </button> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>

        var divNovoEndereco = document.getElementById('novoEndereco')
        var divEnderecoPadrao = document.getElementById('enderecoPadrao')


        function changeAddress(select) {

            if (select.value == "novoEndereco") {
                divEnderecoPadrao.style.display = "none";
                divNovoEndereco.style.display = "block";
            } else {
                divNovoEndereco.style.display = "none";
                divEnderecoPadrao.style.display = "block";

            }
        }


        function submitForm(form){
            console.log(form)
        }

    </script>

@endsection