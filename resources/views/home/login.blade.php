<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS / + -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <title>Mercadinho Compra Certa - Login</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white-side">
                <div class="logo-login">
                    <img src="./img/CompraCertaLogoMini.png" alt="">
                    <a href="{{ url('/') }}" style="text-decoration: none;">
                        <i class="fa fa-chevron-circle-left arrow-back" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 gray-side">
                <div class="form" method="post">
                    <h4 class="text-center font-kalam font-weight-bold">LOGIN</h4>
                    <form method="POST" action="/login">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control font-kalam" name="email" placeholder="E-mail" value="{{ isset($email) ? $email : '' }}" required>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control font-kalam" name="senha" placeholder="Senha" required>
                        </div>
                        @if(isset($error_login))
                        <div class="alert bg-danger text-white">
                            {{ $error_login }}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-block btn-primary-blue">ENTRAR</button>
                    </form>
                    <a href="{{ url('/register')}}">
                        <button class="btn btn-link btn-block font-kalam primary-blue-text">Cadastre-se</button>
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


    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>

</html>