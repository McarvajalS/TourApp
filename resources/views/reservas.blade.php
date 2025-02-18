@extends('layouts.navbar')
@section('title', 'Reservas - TourApp')
@section('contenido')

    <head>


        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <style>
            .dataTables_filter {
                margin-bottom: 25px;

            }

            .dataTables_length,
            .dataTables_paginate {
                margin-top: 25px;
            }

            label {
                border-radius: 25px;
            }

            .table thead th {
                background-color: #98b7b8;
                /* Color de fondo para el encabezado */
                color: white;
                /* Color del texto en el encabezado */
                text-align: right;
                /* Centrar el texto en el encabezado */
            }

            .table tbody td {
                text-align: right;
                /* Centrar el texto en las celdas del cuerpo */
            }
        </style>
    </head>


    <div class="container mt-5 mb-5">
        <!-- NavBar Tabla -->
        <div class="d-flex justify-content-start">
            <div class="me-4 ">
                <h1>RESERVAS</h1>
            </div>
            <div class="me-2">
                <a href="" class="bi bi-plus-circle-dotted btn btn-danger me-2 icono-vista" data-bs-toggle="modal"
                    data-bs-target="#ModalCrearReserva">
                </a>
            </div>
            <div class="me-2">
                <a href="javascript:void(0);" class="bi bi-clock-history btn btn-info me-2 icono-navbar"
                    onclick="esconderTabla()">
                </a>
            </div>
            <div class="ms-auto">

            </div>
        </div>

        <a href="http://"></a>
        <div class="container mt-5 mb-5">
            <!-- Tabla de Reservas para Asignar -->
            <div class="col-12 table-responsive">
                <form action="{{ action([App\Http\Controllers\TourController::class, 'store']) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <table id="reservasTable" class="mt-5 table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Ruta</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Idioma</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Plataforma</th>
                                <th scope="col">Edicion</th>
                                {{-- <th scope="col">ASIGNAR</th> --}}
                                <th> <input type="checkbox" id="checkAll"></th> {{-- Seleccionar todas --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nuevas_reservas as $nueva_reserva)
                                <tr>
                                    <td>{{ $nueva_reserva->id_reserva }}</td>
                                    <td>{{ \Carbon\Carbon::parse($nueva_reserva->fecha)->format('d/m/Y') }}</td>
                                    <td>{{ $nueva_reserva->nombre_turista }}</td>
                                    <td>{{ $nueva_reserva->telefono }}</td>
                                    <td>{{ $nueva_reserva->cantidad_personas }}</td>
                                    <td>{{ optional($nueva_reserva->rutaHorarioIdioma->ruta)->nombre ?? 'Sin ruta' }}</td>
                                    <td>
                                        @if ($nueva_reserva->rutaHorarioIdioma && $nueva_reserva->rutaHorarioIdioma->horario)
                                            <span class="badge bg-warning">
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $nueva_reserva->rutaHorarioIdioma->horario->hora_inicio)->format('H:i') }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">Sin horario</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($nueva_reserva->rutaHorarioIdioma && $nueva_reserva->rutaHorarioIdioma->idioma)
                                            <span class="badge bg-info">
                                                {{ $nueva_reserva->rutaHorarioIdioma->idioma->nombre }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">Sin idioma</span>
                                        @endif
                                    </td>
                                    <td>{{ $nueva_reserva->estado }}</td>
                                    <td>{{ $nueva_reserva->plataforma }}</td>
                                  <td class="d-flex justify-content-end align-items-end">
                                    <a href="#" class="btn btn-outline-warning mb-1 me-3 icono-tabla"
                                        data-bs-toggle="modal" data-bs-target="#ModalEditarReserva"
                                        data-bs-whatever="{{ $nueva_reserva->id_reserva }}|{{ $nueva_reserva->nombre_turista }}|{{ $nueva_reserva->telefono }}|{{ $nueva_reserva->email }}|{{ $nueva_reserva->cantidad_personas }}|{{ $nueva_reserva->plataforma }}|{{ $nueva_reserva->id_ruta_horario_idioma }}|{{ $nueva_reserva->estado }}|{{ $nueva_reserva->fecha }}">
                                        <i class="bi-pencil-square" aria-hidden="true"></i>
                                    </a>
                                    <form class="mb-1 me-3"
                                        action="{{ action([App\Http\Controllers\ReservaController::class, 'destroy'], ['reserva' => $nueva_reserva->id_reserva]) }}"
                                        method="POST" onsubmit="return confirmarBorrado(event)">
                                        @csrf
                                        @method('POST')
                                        <button type="submit"
                                            class="bi bi-trash btn btn-outline-danger icono-tabla"></button>
                                    </form>
                                </td>



                                    <td><input type="checkbox" name="reservas[]" value="{{ $nueva_reserva->id_reserva }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Crear Tour</button>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#reservasTable').DataTable({
                    "paging": true, // Activar la paginación
                    "searching": true, // Activar la búsqueda
                    "ordering": true, // Activar el ordenamiento
                    "order": [
                        [0, 'asc']
                    ], // Ordenar por la primera columna (ID Ruta Horario Idioma)
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                    "dom": '<"top"f>rt<"bottom"lp><"clear">',
                    "pageLength": 25 // Número de filas por página
                });
            });
        </script>



        <div class="container mt-5 mb-5" id="CargarTablaReservasEditadas" style="display: none;">
            <!-- Tabla de Reservas con estados distintos a estado asignar -->
            <div class="col-12 table-responsive">
                <table class="mt-5 table table-hover">
                    <h1>HISTORIAL RESERVAS</h1>
                    <thead class="table-light">
                        <tr>
                           
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Pax</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Idioma</th>
                            <th scope="col">Tour</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Asistencia</th>
                            <th scope="col">Plataforma</th>
                            <th scope="col">Edicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id_reserva }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                                <td>{{ $reserva->nombre_turista }}</td>
                                <td>{{ $reserva->telefono }}</td>
                                <td>{{ $reserva->cantidad_personas }}</td>
                                <td>{{ optional($reserva->rutaHorarioIdioma->ruta)->nombre ?? 'Sin ruta' }}</td>
                                <td>
                                    @if ($reserva->rutaHorarioIdioma && $reserva->rutaHorarioIdioma->horario)
                                        <span class="badge bg-warning">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->rutaHorarioIdioma->horario->hora_inicio)->format('H:i') }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin horario</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($reserva->rutaHorarioIdioma && $reserva->rutaHorarioIdioma->idioma)
                                        <span class="badge bg-info">
                                            {{ $reserva->rutaHorarioIdioma->idioma->nombre }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin idioma</span>
                                    @endif
                                </td>
                                <td>
                                    @if (empty($reserva->id_tour))
                                        <i class="bi bi-question-circle-fill"
                                            style="font-size: 24px; color: rgb(66, 179, 141);"
                                            title="Reserva no asociada a un tour"></i>
                                    @else
                                        {{ $reserva->id_tour }}
                                    @endif
                                </td>
                                <td>{{ $reserva->estado }}</td>
                                <td>
                                    @if (empty($reserva->asistencia))
                                        <i class="bi bi-question-circle-fill"
                                            style="font-size: 24px; color: rgb(66, 139, 179);"
                                            title="Pendiente de asistencia "></i>
                                    @else
                                        {{ $reserva->asistencia }}
                                    @endif
                                </td>
                                <td>{{ $reserva->plataforma }}</td>
                               <td class="d-flex justify-content-end align-items-end">
                                    <div>
                                        <a href="#" class="btn btn-outline-danger mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarReserva"
                                            data-bs-whatever="{{ $reserva->id_reserva }}|{{ $reserva->nombre_turista }}|{{ $reserva->telefono }}|{{ $reserva->email }}|{{ $reserva->cantidad_personas }}|{{ $reserva->plataforma }}|{{ $reserva->id_ruta_horario_idioma }}|{{ $reserva->estado }}|{{ $reserva->fecha }}">
                                            <i class="bi-pencil-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <div>
        <!-- Modal Nuevo Reserva -->
        <div class="modal fade" id="ModalCrearReserva" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5">Nueva Reserva</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('reservas.store') }}" method="POST">
                            @csrf

                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <!-- Teléfono -->
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Cantidad de Personas -->
                            <div class="form-group">
                                <label for="cantidad">Cantidad de Personas</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad_personas"
                                    min="1" max="25" step="1" required>
                            </div>

                            <!-- Plataforma -->
                            <div class="form-group">
                                <label for="plataforma">Plataforma</label>
                                <select class="form-select" id="plataforma" name="plataforma" required>
                                    <option value="" selected disabled>Seleccione plataforma</option>
                                    <option value="Pictour">Pictour</option>
                                    <option value="FreeTour">FreeTour</option>
                                    <option value="GuruWalk">GuruWalk</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </div>

                            <!-- Seleccionar Ruta desde ruta_horario_idioma -->
                            <div class="form-group">
                                <label for="id_ruta_horario_idioma">Selecciona Ruta</label>
                                <select class="form-select" id="id_ruta_horario_idioma" name="id_ruta_horario_idioma"
                                    required>
                                    <option value="" selected disabled>Seleccione una Ruta</option>
                                    @foreach ($rutas_horarios_idiomas as $ruta)
                                        <option value="{{ $ruta->id_ruta_horario_idioma }}">
                                            {{ optional($ruta->ruta)->nombre ?? 'Ruta no disponible' }} -
                                            {{ optional($ruta->horario)->hora_inicio ?? 'Horario no disponible' }} -
                                            {{ optional($ruta->idioma)->nombre ?? 'Idioma no disponible' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- FECHA -->
                            <div class="form-group">
                                <label for="cantidad">fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar Reserva -->
        <div class="modal fade" id="ModalEditarReserva" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5">Editar Reserva</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form
                            action="{{ action([App\Http\Controllers\ReservaController::class, 'update'], ['reserva' => $reserva->id_reserva]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div style="">
                                <label for="id_reservaUPDATE">ID</label>
                                <input type="text" readonly class="form-control-plaintext" id="id_reservaUPDATE"
                                    name="id_reserva">
                            </div>
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre_turistaUPDATE">Nombre</label>
                                <input type="text" class="form-control" id="nombre_turistaUPDATE"
                                    name="nombre_turista" required>
                            </div>

                            <!-- Teléfono -->
                            <div class="form-group">
                                <label for="telefonoUPDATE">Teléfono</label>
                                <input type="text" class="form-control" id="telefonoUPDATE" name="telefono" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="emailUPDATE">Email</label>
                                <input type="email" class="form-control" id="emailUPDATE" name="email" required>
                            </div>

                            <!-- Cantidad de Personas -->
                            <div class="form-group">
                                <label for="cantidad_personasUPDATE">Cantidad de Personas</label>
                                <input type="number" class="form-control" id="cantidad_personasUPDATE"
                                    name="cantidad_personas" min="1" max="25" step="1" required>
                            </div>

                            <!-- Plataforma -->
                            <div class="form-group">
                                <label for="plataformaUPDATE">Plataforma</label>
                                <select class="form-select" id="plataformaUPDATE" name="plataforma" required>
                                    <option value="" selected disabled>Seleccione plataforma</option>
                                    <option value="Pictour">Pictour</option>
                                    <option value="FreeTour">FreeTour</option>
                                    <option value="GuruWalk">GuruWalk</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </div>

                            <!-- Seleccionar Ruta desde ruta_horario_idioma -->
                            <div class="form-group">
                                <label for="id_ruta_horario_idiomaUPDATE">Selecciona Ruta</label>
                                <select class="form-select" id="id_ruta_horario_idiomaUPDATE"
                                    name="id_ruta_horario_idioma" required>
                                    <option value="" selected disabled>Seleccione una Ruta</option>
                                    @foreach ($rutas_horarios_idiomas as $ruta)
                                        <option value="{{ $ruta->id_ruta_horario_idioma }}">
                                            {{ optional($ruta->ruta)->nombre ?? 'Ruta no disponible' }} -
                                            {{ optional($ruta->horario)->hora_inicio ?? 'Horario no disponible' }} -
                                            {{ optional($ruta->idioma)->nombre ?? 'Idioma no disponible' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Estado -->
                            <div class="form-group">
                                <label for="plataformaUPDATE">Estado</label>
                                <select class="form-select" id="estadoUPDATE" name="estado" required>
                                    <option value="" selected disabled>Seleccione Estado</option>
                                    <option value="asignar">asignar</option>
                                    <option value="cancelado">cancelado</option>
                                    <option value="asignado">asignado</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </div>

                            <!-- FECHA -->
                            <div class="form-group">
                                <label for="fechaUPDATE">Fecha</label>
                                <input type="date" class="form-control" id="fechaUPDATE" name="fecha" required>
                            </div>

                            <div class="modal-footer mt-4">
                                <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para pasar informacion al modal -->
    <script>
        const modalEditarReserva = document.getElementById('ModalEditarReserva');
        if (modalEditarReserva) {
            modalEditarReserva.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const data = button.getAttribute('data-bs-whatever').split('|');
                const id_reserva = data[0];
                const nombre_turista = data[1];
                const telefono = data[2];
                const email = data[3];
                const cantidad_personas = data[4];
                const plataforma = data[5];
                const id_ruta_horario_idioma = data[6];
                const estado = data[7];
                const fecha = data[8];

                // Actualiza los campos del formulario con los datos del usuario
                modalEditarReserva.querySelector('#id_reservaUPDATE').value = id_reserva;
                modalEditarReserva.querySelector('#nombre_turistaUPDATE').value = nombre_turista;
                modalEditarReserva.querySelector('#telefonoUPDATE').value = telefono;
                modalEditarReserva.querySelector('#emailUPDATE').value = email;
                modalEditarReserva.querySelector('#cantidad_personasUPDATE').value = cantidad_personas;
                modalEditarReserva.querySelector('#plataformaUPDATE').value = plataforma;
                modalEditarReserva.querySelector('#id_ruta_horario_idiomaUPDATE').value = id_ruta_horario_idioma;
                modalEditarReserva.querySelector('#estadoUPDATE').value = estado;
                modalEditarReserva.querySelector('#fechaUPDATE').value = fecha;
            });
        }

        function esconderTabla() {
            var tabla = document.getElementById('CargarTablaReservasEditadas');
            if (tabla.style.display === 'none' || tabla.style.display === '') {
                tabla.style.display = 'block';
            } else {
                tabla.style.display = 'none';
            }
        }
    </script>

    <script>
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

    <script>
        document.getElementById("checkAll").addEventListener("change", function() {
            let checkboxes = document.querySelectorAll('input[name="reservas[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

<html>

</html>
