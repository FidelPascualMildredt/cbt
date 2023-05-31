
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

      <!-- Estilos CSS -->
    <style>
        
        .card-header {
            background-image: url('https://img.freepik.com/vector-premium/fondo-moderno-lujo-forma-geometrica-vector-tema-color-azul-marino-oscuro-premium_13125-230.jpg');
                color: white;
                font-weight: bold;
                padding: 40px;
                font-size: 36px; 
                    }
                    input{ background-color: white; max-width: 190px; height: 30px; padding: 8px; border: 2px solid white; border-radius: 5px;
                    }
                    /* .input:focus{ color: rgb(0, 255, 255); background-color: black; outline-color: rgb(0, 255, 255); box-shadow: 0px 0px 35px  rgb(0, 255, 255); transition: 1s;
                    } */
                    label{ background: linear-gradient(90deg, #000000, #747427, #5c385a, #051244, #60024a, #530000); background-size: 70px; font-family: "Arial", sans-serif; word-spacing: 5px; -webkit-text-fill-color: transparent; -webkit-background-clip: text; animation: animate 10s linear infinite;                    
                    }
                    @keyframes animate{
                        0%{
                            background-position: 0%;
                        }
                        100%{
                            background-position: 400%;
                        }
                    }
                    
                    .navbar-brand img { width: 100px; /* Ajusta el ancho */ height: 100px; /* Ajusta la altura */ object-fit: contain; /* Ajusta la imagen dentro del contenedor sin distorsionarla */ object-position: center; /* Posiciona la imagen en el centro del contenedor */ border-radius: 50%; /* borde circular */ }
.buscador{ background: white; }
                   
.menu{ padding: 2rem; background-color: #fff; position: relative; width: calc(430px + 4 * 70px + 4rem); display: flex; justify-content: center; border-radius: 20px 20px; box-shadow: 0 10px 25px 0 rgba(0, 0, 0, 0.075); }
        
.link{ display: inline-flex; cursor: pointer; justify-content: center; align-items: center; width: 70px; height: 50px; border-radius: 99em; position: relative; z-index: 1; overflow: hidden; transform-origin: center left; transition: width 0.2s ease-in; text-decoration: none; color: inherit; }
.link:before{position: absolute;z-index: -1;content: "";display: block;border-radius: 99em;width: 200%;height: 200%;top: 0;transform: translateX(100%);transition: transform 0.2s ease-in;transform-origin: center right;background-color: #eee; }
.link:hover, .link:focus{ outline: 0; width: 150px; }
.link:hover:before,
.link:hover .link-title{ transform: translateX(0%); }
.link-icon{ color: var(--color); font-size: 27px !important; display: block; flex-shrink: 0; left: 18px; position: absolute; }
.link-title{ color: var(--color); transform: translateX(200%); transition: transform 0.2s ease-in; display: block; text-align: center; text-indent: 40px; width: 200%; }

.box { width: 340px; height: auto; float: left; transition: .5s linear; position: relative; display: block; overflow: hidden; padding: 15px; text-align: center; margin: 0 5px; background: transparent; text-transform: uppercase; font-weight: 900; }

.box:before { position: absolute; content: ''; left: 0; bottom: 0; height: 4px; width: 100%; border-bottom: 4px solid transparent; border-left: 4px solid transparent; box-sizing: border-box; transform: translateX(100%); }

.box:after { position: absolute; content: ''; top: 0; left: 0; width: 100%; height: 4px; border-top: 4px solid transparent; border-right: 4px solid transparent; box-sizing: border-box; transform: translateX(-100%); }

.box:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}

.box:hover:before { border-color: #262626; height: 100%; transform: translateX(0); transition: .3s transform linear, .3s height linear .3s; }

.box:hover:after { border-color: #262626; height: 100%; transform: translateX(0); transition: .3s transform linear, .3s height linear .5s; }

button { color: black; text-decoration: none; cursor: pointer; outline: none; border: none; background: transparent; }


/* Boton de edit o editar */
.editar {
  background-color: transparent;
  position: relative;
  border: none;
}
.editar::after { content: 'editar'; position: absolute; top: -130%; left: 50%; transform: translateX(-50%); width: fit-content; height: fit-content; background-color: rgb(255, 202, 44); padding: 4px 8px; border-radius: 5px; transition: .2s linear; transition-delay: .2s; color: white; text-transform: uppercase; font-size: 12px; opacity: 0; visibility: hidden; }
.editar:hover::after { visibility: visible; opacity: 1; top: 100%; }
/* End Boton de edit o editar */

/* Boton de show o ver */
.ver {
  background-color: transparent;
  position: relative;
  border: none;
}
.ver::after { content: 'Ver'; position: absolute; top: -130%; left: 50%; transform: translateX(-50%); width: fit-content; height: fit-content; background-color: rgb(13, 110, 253); padding: 4px 8px; border-radius: 5px; transition: .2s linear; transition-delay: .2s; color: white; text-transform: uppercase; font-size: 12px; opacity: 0; visibility: hidden; }
.ver:hover::after { visibility: visible; opacity: 1; top: 100%; }
/* End Boton de show o ver */


/* Boton de delete o eliminar */
.eliminar { background-color: transparent; position: relative; border: none; }
.eliminar::after { content: 'Eliminar'; position: absolute; top: -130%; left: 50%; transform: translateX(-50%); width: fit-content; height: fit-content; background-color: rgb(220, 53, 69); padding: 4px 8px; border-radius: 5px; transition: .2s linear; transition-delay: .2s; color: white; text-transform: uppercase; font-size: 12px; opacity: 0; visibility: hidden; }
.eliminar:hover::after { visibility: visible; opacity: 1; top: 100%; }
/* End Boton de delete o eliminar */


.E { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 0.2s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.S { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 0.4s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.P { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 0.6s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.E { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 0.8s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.R { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 1s;   letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.A { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 1.2s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.N { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 1.4s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.D { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 1.6s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.O { color: black; opacity: 0; animation: pass 2s ease-in-out infinite; animation-delay: 1.8s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.d1 { color: black; opacity: 0; animation: pass1 2s ease-in-out infinite; animation-delay: 2s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

.d2 { color: black; opacity: 0; animation: pass1 2s ease-in-out infinite; animation-delay: 2.2s; letter-spacing: 0.5em; text-shadow: 2px 2px 3px #919191; }

@keyframes pass {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
}

@keyframes pass1 {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1;}
}


.input-container { width: 220px; position: relative; }

.icon { position: absolute; right: 10px; top: calc(50% + 5px); transform: translateY(calc(-50% - 5px)); }

.input { width: 100%; height: 40px; padding: 10px; transition: .2s linear; border: 2.5px solid black; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }
.input:focus { outline: none; border: 0.5px solid black; box-shadow: -5px -5px 0px black; }

.input-container:hover > .icon { animation: anim 1s linear infinite; }

@keyframes anim {
  0%,
  100% { transform: translateY(calc(-50% - 5px)) scale(1.6); }

  50% { transform: translateY(calc(-50% - 5px)) scale(1.1); }
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"   aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

    <!-- Nabvar -->
<div class="container-fluid" >
    <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark" style="margin-left: 5px; border-radius: 10px; margin-bottom: 20px; margin-right: 20px;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i><span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="layouts" class="nav-link align-middle px-0">
                        <a href="layouts" class="link" style="--color: #9b00ff">
                        <i class="link-icon fa fa-home"></i>
                        <span class="link-title">Home</span>
                        </a>
                        </a>
                    </li>    
                    
                    <li class="nav-item">
                        <a href="/equipments" class="nav-link align-middle px-0">
                        <a href="/equipments" class="link" style="--color: #9b00ff">
                        <i class="link-icon fa fa-computer"></i>
                        <span class="link-title">Equipos</span>
                        </a>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/mouses" class="nav-link align-middle px-0">
                        <a href="/mouses" class="link" style="--color: #9b00ff ">
                        <i class="link-icon fa fa-mouse"></i>
                        <span class="link-title">Mouses</span>
                        </a>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/keyboards" class="nav-link align-middle px-0">
                        <a href="/keyboards" class="link" style="--color: #9b00ff">
                        <i class="link-icon fa fa-keyboard"></i>
                        <span class="link-title">Teclados</span>
                        </a>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/monitors" class="nav-link align-middle px-0">
                        <a href="/monitors" class="link" style="--color: #9b00ff">
                        <i class="link-icon fa fa-desktop"></i>
                        <span class="link-title">Monitores</span>
                        </a>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/ordenadores" class="nav-link align-middle px-0">
                        <a href="/ordenadores" class="link" style="--color: #9b00ff">
                        <i class="link-icon fa fa-mobile"></i>
                        <span class="link-title">Ordenadores</span>
                        </a>
                        </a>
                    </li>  

                </ul>
                <hr>
               
        </div>
        </div>

        <!-- END NABVAR -->
        <div class="col py-3">
            <main class="py-4">
            @yield('content')
        </main>
    
    </div>
    </div>
    </div>
       
    </div>
 
</body>
</html>
