<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])     
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    
</head>

<body>
    
 
    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                          <img src="{{ asset('img/logo_app.png') }}" alt="Logo" width="50" height="auto"> 
                          
                        </a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            <li>
                                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-house icono-navbar "></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>    
                            <li>
                                <a href="{{ url('usuarios') }}" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-people icono-navbar "></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>   
                            <li>
                                <a href="{{ url('rutas') }}" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-sign-turn-right icono-navbar "></i>
                                    <span>Rutas</span>
                                </a>
                            </li>   
                            <li>
                                <a href="{{ url('reservas') }}" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-chat-square-text icono-navbar "></i>
                                    <span>Reservas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('tours') }}" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-bookmark-star icono-navbar "></i>
                                    <span>Tours</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-cash-coin icono-navbar "></i>
                                    <span>Rendiciones</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-file-earmark-bar-graph icono-navbar "></i>
                                    <span>Informes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('login') }}" class="nav-link text-white d-flex flex-column align-items-center">
                                    <i class="bi bi-box-arrow-in-right icono-navbar "></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="b-example-divider"></div>  

    @yield('contenido')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        @if(session('mensaje'))
            Swal.fire({
                icon: '{{ session('mensaje')['tipo'] }}',
                title: '{{ session('mensaje')['titulo'] }}',
                text: '{{ session('mensaje')['mensaje'] }}'
            });
            {{ session()->forget('mensaje') }} {{-- Limpiar la sesión después de mostrar el mensaje --}}
        @endif
    </script>

</body>

</html>