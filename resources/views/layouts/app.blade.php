<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>CBT</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

      <!-- Estilos CSS -->
    <style>       
           button{
            box-shadow: 0 0 5px rgb(0, 76, 255),
                        0 0 25px rgb(0, 76, 255);
        }
            button:hover{
                box-shadow: 0 0 5px rgb(0, 76, 255),
                            0 0 25px rgb(0, 76, 255), 
                            0 0 50px rgb(0, 76, 255),
                            0 0 100px rgb(0, 76, 255), 
                            0 0 200px rgb(0, 76, 255);                                   
        }

        .card-header {
            background-image: url('https://img.freepik.com/vector-premium/fondo-moderno-lujo-forma-geometrica-vector-tema-color-azul-marino-oscuro-premium_13125-230.jpg');
                color: white;
                    font-weight: bold;
                        padding: 40px;
                            font-size: 46px; 
                    }
                    input{
                        background-color: black;
                        max-width: 190px;
                        height: 30px;
                        padding: 8px;
                        border: 2px solid white;
                        border-radius: 5px;
                    }
                    .input:focus{
                        color: rgb(0, 255, 255);
                        background-color: black;
                        outline-color: rgb(0, 255, 255);
                        box-shadow: 0px 0px 35px  rgb(0, 255, 255);
                        transition: 1s;
                    }
                    label{
                        background: linear-gradient(90deg,
                        #000000,
                        #747427,
                        #5c385a,
                        #051244,
                        #60024a,
                        #530000);
                        background-size: 70px;
                        font-family: "Arial", sans-serif;
                        word-spacing: 5px;
                        -webkit-text-fill-color: transparent;
                        -webkit-background-clip: text;
                        animation: animate 10s linear infinite;                    
                    }
                    @keyframes animate{
                        0%{
                            background-position: 0%;
                        }
                        100%{
                            background-position: 400%;
                        }
                    }
                    
                    .navbar-brand img {
                        width: 100px; /* Ajusta el ancho */
                        height: 100px; /* Ajusta la altura */
                        object-fit: contain; /* Ajusta la imagen dentro del contenedor sin distorsionarla */
                        object-position: center; /* Posiciona la imagen en el centro del contenedor */
                        border-radius: 50%; /* borde circular */
                    }




                    
    </style>
    <!-- END Estilos CSS -->

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
            <a class="navbar-brand" href="{{ url('/') }}">
            <img src="IMAGE/ESC.jpg" alt="Inventario">

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
