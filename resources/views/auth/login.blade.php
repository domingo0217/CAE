
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link rel="shortcut icon" type="image/png" href="img/logo.png">
    </head>

<body>


            @if (count($errors) > 0)
                 <div class="col-sm-12" >
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Error de Accesso
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                @endif
                    <div class="myform-bottom">

                      <form role="form" action="{{ url('/login') }}" method="post" >
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Bienbenidos a CAE</h1>
            <div class="account-wall row">

                <img class="profile-img" src="img/logo3.png" style="width:100px; height: 140px;"
                    alt="">
                <form class="form-signin" action="{{ url('/login') }}" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Entrar</button>

<a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvide mi contraseña?
                                </a>
            </div>

        </div>
    </div>
</div>

                      </form>

                    </div>


    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
  </body>
