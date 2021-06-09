<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS / + -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/cadastre-se.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <title>Mercadinho Compra Certa - Cadastre-se</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white-side">
                <div class="logo">
                    <a href="./index.html">
                        <img src="./img/CompraCertaLogoMini.png" alt="">
                    </a>
                    <a href="#" onclick="window.history.back()" style="text-decoration: none;">
                        <i class="fa fa-chevron-circle-left arrow-back" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 gray-side">
                <div class="form" method="post">

                    <!-- DADOS PESSOAIS -->
                    <h4 class="text-center font-kalam font-weight-bold">DADOS PESSOAIS</h4>
                    <form method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" name="nome" class="form-control font-kalam" placeholder="Nome" required value="{{ isset($request->nome) ? $request->nome : ''}}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="email" name="email" class="form-control font-kalam" placeholder="E-mail" required value="{{ isset($request->email) ? $request->email : ''}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" name="cpf" class="form-control font-kalam" placeholder="CPF" maxlength="14" required value="{{ isset($request->cpf) ? $request->cpf : ''}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="password" id="senhaInput" name="senha" class="form-control font-kalam" placeholder="Senha" autocomplete="on" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="password" id="confirmSenhaInput" name="confirmacaoSenha" class="form-control font-kalam" placeholder="Confirmar senha" autocomplete="on" required>
                                </div>
                            </div>
                        </div>

                        <!-- ENDEREÇO -->
                        <h4 class="text-center font-kalam font-weight-bold mt-3">ENDEREÇO</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="cidade" class="form-control font-kalam" placeholder="Cidade" required value="{{ isset($request->cidade) ? $request->cidade : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-map" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="bairro" class="form-control font-kalam" placeholder="Bairro" required value="{{ isset($request->bairro) ? $request->bairro : ''}}">
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
                                    <input type="tel" name="cep" class="form-control font-kalam" placeholder="CEP" required value="{{ isset($request->cep) ? $request->cep : ''}}">
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="rua" class="form-control font-kalam" placeholder="Rua" required value="{{ isset($request->rua) ? $request->rua : ''}}">
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
                                    <input type="number" name="numeroEndereco" class="form-control font-kalam" placeholder="Número" required value="{{ isset($request->numeroEndereco) ? $request->numeroEndereco : ''}}">
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control font-kalam" name="pontoReferencia" placeholder="Ponto de referência" required value="{{ isset($request->pontoReferencia) ? $request->pontoReferencia : ''}}">
                                </div>
                            </div>
                        </div>

                        @if(isset($mensagemSucessoCadastro))
                            <div class="alert bg-success text-white text-center">
                                {{$mensagemSucessoCadastro}}<br>
                                <a href="{{ url('/login') }}" class="text-white text-decoration-underline">Clique aqui para fazer login</a>
                            </div>
                        @endif

                        @if(isset($error))
                            <div class="alert bg-danger text-white text-center">
                                {{$error}}
                            </div>
                        @endif

                        <button type="submit" class="btn btn-block btn-primary-blue" style="font-size: 1em;">CONFIRMAR CADASTRO</button>
                    </form>
                    <a href="{{url('/login')}}">
                        <button class="btn btn-link btn-block font-kalam primary-blue-text">Fazer login</button>
                    </a>
                </div>

            </div>
        </div>

    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/884b02690d.js"></script>
    <script>

        (function(){
            let inputSenha = document.getElementById('senhaInput');
            let confirmSenhaInput = document.getElementById('confirmSenhaInput')

            confirmSenhaInput.addEventListener('blur', function(){
                let senha = inputSenha.value;
                let confirmacaoSenha = confirmSenhaInput.value;

                if(senha !== confirmacaoSenha){
                    alert('As senhas digitadas não correspondem..');
                    inputSenha.value = "";
                    confirmSenhaInput.value = "";
                }
            })
        })()


    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>

</html>