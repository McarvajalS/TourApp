@extends('layouts.navbar')
@section('title', 'Rutas - TourApp')
@section('contenido')
    <div class="container mt-5 mb-5">

        <!-- Horarios/Idiomas -->
        <div class="container mb-5" id="CargarHorariosIdiomas" style="display: none;">
            <div class="row">

                <div class="col-6">

                    <div class=" mt-5 mb-5">
                        <div class="d-flex justify-content-start">
                            <div class="me-4 ">
                                <h1>HORARIOS</h1>
                            </div>
                            <div class="me-2">
                                <a href="" class="bi bi-plus-circle-dotted btn btn-danger me-2 icono-vista"
                                    data-bs-toggle="modal" data-bs-target="#ModalCrearHorario">
                                </a>
                            </div>
                        </div>

                        <!-- Tabla de horarios -->
                        <div class="col-12 mb-5 table-responsive" id="">
                            <table class="mt-5  table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Horario</th>
                                        <th scope="col">Edición</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarios as $horario)
                                        <tr>
                                            <td>{{ $horario->id_horario }}</td>
                                            <td>{{ $horario->hora_inicio }}</td>


                                            <td class="d-flex align-items-end">
                                                <div class="d-flex">
                                                    <a href="" class="btn btn-warning mb-1 me-3 icono-tabla"
                                                        data-bs-toggle="modal" data-bs-target="#ModalEditarHorario"
                                                        data-bs-whatever="{{ $horario->id_horario }}|{{ $horario->hora_inicio }}">
                                                        <i class="bi-pencil-square" aria-hidden="true"></i>
                                                    </a>
                                                    <form class="mb-1 me-3"
                                                        action="{{ action([App\Http\Controllers\HorarioController::class, 'destroy'], ['horario' => $horario->id_horario]) }}"
                                                        method="POST" onsubmit="return confirmarBorrado(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title=""
                                                            class="bi bi-trash btn btn-secondary icono-tabla"></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mt-5 mb-5">
                        <div class="d-flex justify-content-start">
                            <div class="me-4 ">
                                <h1>IDIOMAS</h1>
                            </div>
                            <div class="me-2">
                                <a href="" class="bi bi-plus-circle-dotted btn btn-danger me-2 icono-vista"
                                    data-bs-toggle="modal" data-bs-target="#ModalCrearidioma">
                                </a>
                            </div>
                        </div>

                        <!-- Tabla de idiomas -->
                        <div class="col-12 mb-5 table-responsive" id="">
                            <table class="mt-5  table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Idioma
                                        <th scope="col">Edición</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($idiomas as $idioma)
                                        <tr>
                                            <td>{{ $idioma->id_idioma }}</td>
                                            <td>{{ $idioma->nombre }}</td>

                                            <td class="d-flex align-items-end">
                                                <div class="d-flex">
                                                    <a href="" class="btn btn-warning mb-1 me-3 icono-tabla"
                                                        data-bs-toggle="modal" data-bs-target="#ModalEditaridioma"
                                                        data-bs-whatever="{{ $idioma->id_idioma }}|{{ $idioma->nombre }}">



                                                        <i class="bi-pencil-square" aria-hidden="true"></i>
                                                    </a>
                                                    <form class="mb-1 me-3"
                                                        action="{{ action([App\Http\Controllers\IdiomaController::class, 'destroy'], ['idioma' => $idioma->id_idioma]) }}"
                                                        method="POST" onsubmit="return confirmarBorrado(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title=""
                                                            class="bi bi-trash btn btn-secondary icono-tabla"></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <!-- NavBar Tabla -->
        <div class="d-flex justify-content-start">
            <div class="me-4 ">
                <h1>RUTAS</h1>
            </div>
            <div class="me-2">
                <a href="" class="bi bi-plus-circle-dotted btn btn-danger me-2 icono-vista" data-bs-toggle="modal"
                    data-bs-target="#ModalCrearRuta">
                </a>
            </div>
            <div class="me-2">
                <a href="javascript:void(0);" class="bi bi-table btn btn-info me-2 icono-navbar" onclick="esconderTabla()">
                </a>
            </div>

            <div class="ms-auto">

                <a href="javascript:void(0);" class="bi bi-sliders btn btn-success me-2 icono-navbar"
                    onclick="esconderContenedor()">
                </a>
            </div>
        </div>

        <!-- Tabla de rutas -->
        <div class="col-12 mb-5 table-responsive" id="CargarTabla">
            <table class="mt-5  table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class=" ">ID</th>
                        <th scope="col" class="">Nombre Ruta</th>
                        <th scope="col" class=" ">Estado</th>
                        <th scope="col" class="col-3">Idiomas</th>
                        <th scope="col" class="">Horarios</th>
                        <th scope="col" class="">Imagen</th>
                        <th scope="col" class="">Edición</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rutas as $ruta)
                        <tr>
                            <td>{{ $ruta->id_rutas }}</td>
                            <td>{{ $ruta->nombre }}</td>
                            <td>{{ $ruta->estado }}</td>                        

                            <!-- Mostrar Idiomas Asociados -->
                            <td>
                                @foreach ($ruta->rutaHorarioIdiomas->groupBy('id_idioma') as $idioma)
                                    <span class="badge bg-info me-1">{{ $idioma->first()->idioma->nombre }}</span>
                                @endforeach
                            </td>

                            <!-- Mostrar Horarios Asociados -->
                            <td>

                                @foreach ($ruta->rutaHorarioIdiomas->groupBy('id_horario') as $horario)
                                    @if ($horario->first() && $horario->first()->horario)
                                        <span class="badge bg-success mb-1">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $horario->first()->horario->hora_inicio)->format('H:i') }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger mb-1">Sin horario</span>
                                    @endif
                                @endforeach


                                {{-- @foreach ($ruta->rutaHorarioIdiomas as $relacion)
                                   <span class="badge bg-warning mb-1">{{ $relacion->horario->hora_inicio }}</span>                                     
                                    <br>
                                @endforeach --}}
                            </td>

                            <td>
                                @if ($ruta->imagen)
                                    <img src="{{ asset($ruta->imagen) }}" alt="{{ $ruta->nombre }}"
                                        style=" border-radius: 25%; max-width: 50px; height: auto;">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>

                            <td class="d-flex align-items-end">
                                <div class="d-flex">

                                    <a href="#" class="btn btn-warning mb-1 me-3 icono-tabla"
                                        data-bs-toggle="modal" data-bs-target="#ModalEditarRuta"
                                        data-bs-whatever="{{ $ruta->id_rutas }}|{{ $ruta->nombre }}|{{ $ruta->estado }}|{{ asset($ruta->imagen) }}"
                                        data-horarios-idiomas="{{ json_encode(
                                            $ruta->rutaHorarioIdiomas->map(function ($item) {
                                                return [
                                                    'id_horario' => $item->id_horario,
                                                    'idiomas' => $item->idioma ? [$item->idioma->id_idioma] : [],
                                                ];
                                            }),
                                        ) }}">
                                        <i class="bi-pencil-square" aria-hidden="true"></i>
                                    </a>
                                    <form class="mb-1 me-3"
                                        action="{{ action([App\Http\Controllers\RutaController::class, 'destroy'], ['ruta' => $ruta->id_rutas]) }}"
                                        method="POST" onsubmit="return confirmarBorrado(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title=""
                                            class="bi bi-trash btn btn-secondary icono-tabla"></button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Card-->
        <div>
            <div class="container mt-5">
                <div class="row">
                    @foreach ($rutas as $ruta)
                        <div class="col-md-3 mb-2">

                            <hr>
                            <div class="card-rutas"><img src="{{ $ruta->imagen }}" class="img img-responsive">

                                <div class="card-idioma ">
                                    @foreach ($ruta->rutaHorarioIdiomas->groupBy('id_idioma') as $idioma)
                                        <span class="badge bg-info mb-2 ">{{ $idioma->first()->idioma->nombre }}</span>
                                    @endforeach
                                </div>

                                <!-- Horarios Asociados -->
                                <div class="card-horario">

                                    @foreach ($ruta->rutaHorarioIdiomas->groupBy('id_horario') as $horario)
                                        @if ($horario->first() && $horario->first()->horario)
                                            <span class="badge bg-warning mb-1">
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $horario->first()->horario->hora_inicio)->format('H:i') }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger mb-1">Sin horario</span>
                                        @endif
                                    @endforeach

                                    {{-- @foreach ($ruta->rutaHorarioIdiomas->groupBy('id_horario') as $horario)
                                        <span
                                            class="badge bg-warning mb-2">{{ $horario->first()->horario->hora_inicio }}</span>
                                    @endforeach --}}
                                </div>

                                <div class="card-nombre">{{ $ruta->nombre }}</div>
                                {{-- <div class="card-subtitulo">RUTA</div> --}}
                                <div class="card-estado"> {{ $ruta->estado }}</div>


                                <div class="card-icons">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-warning mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarRuta"
                                            data-bs-whatever="{{ $ruta->id_rutas }}|{{ $ruta->nombre }}|{{ $ruta->estado }}|{{ asset($ruta->imagen) }}"
                                            data-horarios-idiomas="{{ json_encode(
                                                $ruta->rutaHorarioIdiomas->map(function ($item) {
                                                    return [
                                                        'id_horario' => $item->id_horario,
                                                        'idiomas' => $item->idioma ? [$item->idioma->id_idioma] : [],
                                                    ];
                                                }),
                                            ) }}">
                                            <i class="bi-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        {{-- <form class="mb-1"
                                                        action="{{ action([App\Http\Controllers\RutaController::class, 'destroy'], ['ruta' => $ruta->id_rutas]) }}"
                                                        method="POST" onsubmit="return confirmarBorrado(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title=""
                                                            class="bi bi-trash btn btn-secondary icono-tabla"></button>
                                                    </form> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <div>
        <!-- Modal Nuevo Ruta -->
        <div class="modal fade" id="ModalCrearRuta" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Ruta</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action([App\Http\Controllers\RutaController::class, 'store']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="form-group mt-3">

                                <div class="row">
                                    <label>Horarios e Idiomas:</label>
                                    <br>
                                    @foreach ($horarios as $horario)
                                        <div class="col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input horario-checkbox" type="checkbox"
                                                    id="horario_{{ $horario->id_horario }}" name="horarios[]"
                                                    value="{{ $horario->id_horario }}">
                                                <label
                                                    class="form-check-label"><strong>{{ $horario->hora_inicio }}</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="idiomas-container" data-horario="{{ $horario->id_horario }}">
                                                {{-- <label>Selecciona Idiomas:</label><br> --}}
                                                @foreach ($idiomas as $idioma)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="horarios_idiomas[{{ $horario->id_horario }}][]"
                                                            value="{{ $idioma->id_idioma }}">
                                                        <label class="form-check-label">{{ $idioma->nombre }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" required>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.querySelectorAll(".horario-checkbox").forEach(function(checkbox) {
                                        checkbox.addEventListener("change", function() {
                                            let horarioId = this.value;
                                            let container = document.querySelector(".idiomas-container[data-horario='" +
                                                horarioId + "']");

                                            if (this.checked) {
                                                container.style.display = "block";
                                            } else {
                                                container.style.display = "none";
                                            }
                                        });
                                    });
                                });
                            </script>

                            <div class="form-group mt-3">
                                <label for="estado">Estado</label>
                                <select class="form-select form-group" id="estado" name="estado"
                                    aria-label="Default select example" required>
                                    <option class="form-group" value="" selected disabled>Seleccione Estado
                                    </option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                    <option value="3">Pendiente</option>
                                </select>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar Ruta -->
        <div class="modal fade" id="ModalEditarRuta" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5">Editar Ruta</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rutas.update', $ruta->id_rutas) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div style="display: none">
                                <label for="id_rutasEditar">ID</label>
                                <input type="text" readonly class="form-control-plaintext" id="id_rutasEditar"
                                    name="id_rutas">
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-8">
                                    <label for="nombreEditar">Nombre</label>
                                    <input type="text" class="form-control" id="nombreEditar" name="nombre"
                                        required>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-end">
                                    <img id="imagenActual" alt="Imagen actual" class="img-thumbnail"
                                        style="border-radius: 25%; max-width: 120px; height: auto;">
                                </div>
                            </div>

                            <!-- Input para subir nueva imagen -->
                            <div class="form-group mt-3">
                                <label for="imagenEditar">¿Cambiar Imagen?</label>
                                <input type="file" class="form-control" id="imagenEditar" name="imagen">
                            </div>

                            <div class="form-group mt-3">
                                <label>Horarios e Idiomas:</label>
                                <div class="row">
                                    @foreach ($horarios as $horario)
                                        <div class="col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input horario-checkbox" type="checkbox"
                                                    id="horarioEditar_{{ $horario->id_horario }}" name="horarios[]"
                                                    value="{{ $horario->id_horario }}">
                                                <label
                                                    class="form-check-label"><strong>{{ $horario->hora_inicio }}</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="idiomas-container" data-horario="{{ $horario->id_horario }}">
                                                @foreach ($idiomas as $idioma)
                                                    <div class="form-check">
                                                        <input class="form-check-input idioma-checkbox" type="checkbox"
                                                            name="horarios_idiomas[{{ $horario->id_horario }}][]"
                                                            value="{{ $idioma->id_idioma }}">
                                                        <label class="form-check-label">{{ $idioma->nombre }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="estadoEditar">Estado</label>
                                <select class="form-select" id="estadoEditar" name="estado" required>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                    <option value="3">Pendiente</option>
                                </select>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Nuevo Horario -->
        <div class="modal fade" id="ModalCrearHorario" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Horario</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action([App\Http\Controllers\HorarioController::class, 'store']) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="hora_inicio" class="form-label mb-4">Nuevo Horario</label>
                                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control"
                                    min="00:00" max="23:59" required>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Nuevo Idioma -->
        <div class="modal fade" id="ModalCrearidioma" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Idioma</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action([App\Http\Controllers\IdiomaController::class, 'store']) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nombre">Idioma</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar  Horario -->
        <div class="modal fade" id="ModalEditarHorario" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Horario</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ action([App\Http\Controllers\HorarioController::class, 'update'], ['horario' => $horario->id_horario]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div style="display: none">
                                <label for="id_horarioEditar">ID</label>
                                <input type="text" readonly class="form-control-plaintext" id="id_horarioEditar"
                                    name="id_horarioEditar">
                            </div>
                            <div class="form-group">
                                <label for="horaEditar" class="form-label mb-4">Horario</label>
                                <input type="time" id="horaEditar" name="hora" class="form-control"
                                    min="00:00" max="23:59" required>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar Idioma -->
        <div class="modal fade" id="ModalEditaridioma" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Idioma</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ action([App\Http\Controllers\IdiomaController::class, 'update'], ['idioma' => $idioma->id_idioma]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div style="display: none">
                                <label for="id_idiomaEditar">ID</label>
                                <input type="text" readonly class="form-control-plaintext" id="id_idiomaEditar"
                                    name="id_idioma">
                            </div>
                            <div class="form-group">
                                <label for="nombreEditar" class="form-label mb-4">Idioma</label>
                                <input type="text" id="nombreEditar" name="nombre" class="form-control" required>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script-->
        <script>
            const ModalEditarRuta = document.getElementById('ModalEditarRuta');
            if (ModalEditarRuta) {
                ModalEditarRuta.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const data = button.getAttribute('data-bs-whatever').split('|');
                    const id_rutas = data[0];
                    const nombre = data[1];
                    const estado = data[2];
                    const imagen = data[3];
                    

                    // Actualiza los campos del formulario
                    ModalEditarRuta.querySelector('#id_rutasEditar').value = id_rutas;
                    ModalEditarRuta.querySelector('#nombreEditar').value = nombre;
                  
                    // ModalEditarRuta.querySelector('#estadoEditar').value = estado;
                    ModalEditarRuta.querySelector('#imagenActual').src = imagen;


                    // Seleccionar la opción correspondiente en el select de estado
                    let selectEstado = ModalEditarRuta.querySelector('#estadoEditar');
                    selectEstado.value = estado; // Asigna directamente el valor

                    // Resetear los checkboxes
                    document.querySelectorAll('.horario-checkbox, .idioma-checkbox').forEach(cb => cb.checked = false);

                    // Obtener los horarios e idiomas desde el botón
                    const horariosIdiomas = JSON.parse(button.getAttribute('data-horarios-idiomas'));

                    horariosIdiomas.forEach(horario => {
                        const horarioCheckbox = document.querySelector(`#horarioEditar_${horario.id_horario}`);
                        if (horarioCheckbox) {
                            horarioCheckbox.checked = true;
                        }
                        horario.idiomas.forEach(idioma_id => {
                            const idiomaCheckbox = document.querySelector(
                                `.idiomas-container[data-horario="${horario.id_horario}"] .idioma-checkbox[value="${idioma_id}"]`
                            );
                            if (idiomaCheckbox) {
                                idiomaCheckbox.checked = true;
                            }
                        });
                    });
                });
            }

            const ModalEditarHorario = document.getElementById('ModalEditarHorario');
            if (ModalEditarHorario) {
                ModalEditarHorario.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const data = button.getAttribute('data-bs-whatever').split('|');
                    const id_horario = data[0];
                    const hora_inicio = data[1];

                    // Actualiza los campos del formulario con los datos del usuario
                    ModalEditarHorario.querySelector('#id_horarioEditar').value = id_horario;
                    ModalEditarHorario.querySelector('#horaEditar').value = hora_inicio;

                });
            }

            const ModalEditarIdioma = document.getElementById('ModalEditaridioma');
            if (ModalEditarIdioma) {
                ModalEditarIdioma.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const data = button.getAttribute('data-bs-whatever').split('|');
                    const id = data[0];
                    const nombre = data[1];

                    const modalIdInput = ModalEditarIdioma.querySelector('#id_idiomaEditar');
                    const modalNombreInput = ModalEditarIdioma.querySelector('#nombreEditar');

                    modalIdInput.value = id;
                    modalNombreInput.value = nombre;
                });
            }

            function esconderTabla() {
                var tabla = document.getElementById('CargarTabla');
                if (tabla.style.display === 'none' || tabla.style.display === '') {
                    tabla.style.display = 'block';
                } else {
                    tabla.style.display = 'none';
                }
            }

            function esconderContenedor() {
                var tabla = document.getElementById('CargarHorariosIdiomas');
                if (tabla.style.display === 'block' || tabla.style.display === '') {
                    tabla.style.display = 'none';
                } else {
                    tabla.style.display = 'block';
                }
            }

            function confirmarBorrado(event) {
                event.preventDefault(); // Evita el comportamiento predeterminado

                Swal.fire({
                    title: "Atencion",
                    text: "¿Estas de seguro de borrar?.",
                    // icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#6C757D",
                    cancelButtonColor: "#ffd700",
                    confirmButtonText: "Sí, borrar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = event.target.closest('form');
                        if (form) {
                            form.submit();
                        } else {
                            console.error("No se encontró un formulario para borrar.");
                        }
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>


@endsection

<html>

</html>
