<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mis Metas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Principal</a>
                @else
                    <a href="{{ route('login') }}">Iniciar Sesion</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                ¡Metas!
            </div>
            <div class="px-2">
                Convierte tus obligaciones en metas y lleva un registro de estas para completarlas más fácilmente.
            </div>
            <br><br>
            <div class="links">
                <a href="{{ url('/home') }}">Iniciar</a>
                <a href="https://github.com/ricodrums/goals">Github</a>
            </div>
            <div class="bottom">
                <p class=""><i class="fas fa-info-circle"></i> &nbsp; Esta app esta en desarrollo y es de aprendizaje y
                    práctica, agradecería muchísimo si se encuentran errores reportarlos a jdrico59@misena.edu.co</p>
            </div>
        </div>
    </div>
</body>

</html>
