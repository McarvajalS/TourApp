<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
      @vite(['resources/css/app.css','resources/js/app.js'])
     <link rel="stylesheet" href="{{ asset('css/tour-app.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
</head>

<style>
    
</style>

<body>

    {{-- iconos de bootstrap --}}
   <svg xmlns="http://www.w3.org/2000/svg" class="d-none"> 
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstasdasrap</title>
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

    <div class="b-example-divider">
    </div>  

      @yield('contenido')

</body>

</html>