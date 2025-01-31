<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour App - MPV</title>
    <!-- Incluir el CSS de Bootstrap -->
    @vite(['resources/css/app.css', 'resources/css/tour-app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 209.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
</style>

<body>

  

    {{-- iconos de bootstrap --}}
   <svg xmlns="http://www.w3.org/2000/svg" class="d-none"> 


        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 20.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.620 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H20.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V20a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
      
    </svg> 
    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">

                         <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-house icono-navbar "></i>
                                <span>Dashboard</span>
                            </a>
                        </li>    
                          <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-people icono-navbar "></i>
                                <span>Usuarios</span>
                            </a>
                        </li>   
                        <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-sign-turn-right icono-navbar "></i>
                                <span>Rutas</span>
                            </a>
                        </li>   
                         <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-chat-square-text icono-navbar "></i>
                                <span>Reservas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-bookmark-star icono-navbar "></i>
                                <span>Tours</span>
                            </a>
                        </li>
                         
                         <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-file-earmark-bar-graph icono-navbar "></i>
                                <span>Informes</span>
                            </a>
                        </li>
                            <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-cash-coin icono-navbar "></i>
                                <span>Rendiciones</span>
                            </a>
                        </li>





                        {{-- <li>
                            <a href="#" class="nav-link text-secondary">
                               <i class="bi bi-house icono-navbar"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <i class="bi bi-house icono-navbar"></i>

                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <d class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#people-circle" />
                                </d>
                                Usuarios
                            </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#grid" />
                                </svg>
                                Rutas
                            </a>
                        </li>
                       <li>
                            <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                                <i class="bi bi-house"></i>
                                <span>Rutas</span>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#grid" />
                                </svg>
                                Tours
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Informes
                                <i class="bi bi-people"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#table" />
                                </svg>
                                Rendiciones
                            </a>
                        </li> --}}

                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-center">
                <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <button type="button" class="btn btn-light text-dark me-2">Login</button>
                    <button type="button" class="btn btn-primary">Sign-up</button>
                </div>
            </div>
        </div> --}}
    </header>

    <div class="b-example-divider"></div>

    {{-- @yield('contenido') --}}

    <!-- Incluir el JS de Bootstrap -->
    @vite('resources/js/app.js')
</body>

</html>