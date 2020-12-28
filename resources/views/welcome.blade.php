<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Goals!
            </div>
            <div>
                Track your outcomes as goals and complete them...
            </div>
            <br><br>
            <div class="links">
                <a href="{{ url('/home') }}">Get Started</a>
                <a href="https://github.com/ricodrums/goals">Github</a>
                <a href="#">Contact us</a>
            </div>
            <div class="bottom">
                <p class=""><i class="fas fa-info-circle"></i> &nbsp; This version is for testig and learning, please
                    report errors at jdrico59@misena.edu.co</p>
            </div>
        </div>
    </div>
</body>

</html>
