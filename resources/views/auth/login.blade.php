<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LKSA | BRAYAT PINUJI</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-1" src="img/logo_lksa.png" alt="" width="122" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Silahkan Masuk</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <div class="col-md-14">
            <input id="email" type="inputEmail" placeholder="Email address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <div class="col-md-14">
            <input id="inputPassword" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> {{ __('Remember Me') }}
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> {{ __('MASUK') }}</button>
        <p class="mt-5 mb-3 text-muted">&copy; LKSA BRAYAT PINUJI 2019</p>
    </form>
</body>

</html>