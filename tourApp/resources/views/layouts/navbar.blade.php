<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour App - MPV</title>
    @vite(['resources/css/app.css', 'resources/css/tour-app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- iconos de bootstrap --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- ...existing code... -->
    </svg>
    <header>
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="#" class="nav-link text-secondary">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#home" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/reservas') }}" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="20" height="20">
                                    <use xlink:href="#table" />
                                </svg>
                                Reservas
                            </a>
                        </li>
                        <!-- ...existing code... -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- ...existing code... -->
    </header>

    <div class="b-example-divider"></div>

    @yield('contenido')

    @vite('resources/js/app.js')
</body>
</html>
