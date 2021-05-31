@extends('layout.main')


@section('linkcss')
  <link rel="stylesheet" href="{{ asset('/css/client.css') }}">
@endsection

@section('title', 'Editar Cliente')


@section('content')

    <div class="container">
        <div class="cart-product-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-payment">
                        <div class="d-flex justify-content-center px-2 font-kalam">
                            <h4 class="font-weight-bold primary-blue-text text-center"><i class="fa fa-user" aria-hidden="true"></i> Cliente - {{$cliente->nome}} </h4>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header d-flex justify-content-center bg-dark-blue text-white">
                                <h5 class="font-kalam font-weight-bold">
                                    Edição de cliente</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="text-center font-kalam font-weight-bold">DADOS PESSOAIS</h5>
                                <div class="row">
                                    <div class="col-12">
                                        <form method="POST">
                                            @csrf
                                            <input type="hidden" name="idUsuario" value="{{ $cliente->id_usuario }}">
                                            <input type="hidden" name="idEnderecoPadrao" value="{{ $enderecoPadrao->id_endereco_usuario }}">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="nome" class="form-control font-kalam" placeholder="Nome" required value="{{$cliente->nome}}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="email" class="form-control font-kalam" placeholder="E-mail" required value="{{$cliente->email}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="cpf" class="form-control font-kalam" placeholder="CPF" maxlength="14" value="{{$cliente->cpf}}" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control font-kalam" placeholder="Senha" disabled value="12345678" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-md-0">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control font-kalam" placeholder="Confirmar senha" disabled value="12345678" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ENDEREÇO -->
                                            <h5 class="text-center font-kalam font-weight-bold mt-3">ENDEREÇO</h5>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="cidade" class="form-control font-kalam" placeholder="Cidade" value="{{ $enderecoPadrao->cidade }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-0">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-map" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="bairro" class="form-control font-kalam" placeholder="Bairro" value="{{ $enderecoPadrao->bairro }}" required>
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
                                                        <input type="tel" name="cep" class="form-control font-kalam" placeholder="CEP" value="{{ $enderecoPadrao->cep }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 pl-md-0">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="rua" class="form-control font-kalam" placeholder="Rua" value="{{ $enderecoPadrao->rua }}" required>
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
                                                        <input type="number" name="numero" class="form-control font-kalam" placeholder="Número" value="{{ $enderecoPadrao->numero }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 pl-md-0">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="pontoDeReferencia" class="form-control font-kalam" placeholder="Ponto de referência" value="{{ $enderecoPadrao->ponto_de_referencia }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <div>
                                                        <button type="submit" class="btn btn-sm btn-info font-weight-bold"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                                                        <a href="{{url('clientes/delete/'.$cliente->id_usuario)}}" onclick="return confirm('Deseja realmente remover o cliente do sistema?')" class="btn btn-sm btn-danger font-weight-bold" style="font-size: 0.9em;">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            Remover
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/clientes/listar" onclick="window.history.back()" class="btn btn-sm btn-default font-weight-bold" style="font-size: 0.9em;">
                                                            Voltar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(isset($mensagemSucesso))
                                                <div class="alert bg-success text-white text-center mt-2">
                                                    {{ $mensagemSucesso }}
                                                </div>
                                            @endif
                                        </form>
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

{{--

    <footer class="mt-2">
        <img src="./img/CompraCertaLogoMini.png" alt="">
        <span class="d-block">Mercadinho CompraCerta - Todos os direitos reservados <i class="fa fa-copyright"
                aria-hidden="true"></i></span>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/884b02690d.js"></script>

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


        function submitForm(form) {
            console.log(form)
        }

    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->

</body>

</html> --}}