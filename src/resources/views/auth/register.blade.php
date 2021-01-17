<!DOCTYPE html>
<html lang="pt-BR" style="height: 100%">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/531a3b7b08.js" crossorigin="anonymous"></script>

</head>

<body class="h-100">

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-sm-12 col-md-6 d-flex justify-content-center">
            <div class="login-form align-self-center">
                <form action="{{ route('user.register') }}" method="post">
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                                <br>
                            @endforeach
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">Cadastrar</button>
                    <p class="text-center mt-3">
                        Já tem conta? <a href="{{ route('user.login') }}">Fazer login</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bg-dark d-flex justify-content-center">
            <div class="align-self-center text-light text-center">
                <h1>Registrar</h1>
                <p class="lead text-light">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
