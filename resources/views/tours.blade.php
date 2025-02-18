@extends('layouts.navbar')
@section('title', 'Tours - TourApp')
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
                background-color: #e3f2fd;
                color: gray;
                text-align: right;
            }

            .table tbody td {
                text-align: right;
            }
        </style>
    </head>

    <div class="container mt-5 mb-5">
        <!-- NavBar Tabla -->
        <div class="d-flex justify-content-start">
            <div class="me-4 ">
                <h1>TOURS</h1>
            </div>
            {{-- <div class="me-2">
                <a href="" class="bi bi-plus-circle-dotted btn btn-danger me-2 icono-vista" data-bs-toggle="modal"
                    data-bs-target="#ModalCrearTour">
                </a>
            </div> --}}
            <div class="me-2">
                <a href="javascript:void(0);" class="bi bi-clock-history btn btn-info me-2 icono-navbar"
                    onclick="esconderTabla()">
                </a>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <!-- Tabla de Tours -->
            <div class="col-12 table-responsive">
                <table id="toursTable" class="mt-5 table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            {{-- <th scope="col">NOMBRE</th>
                        <th scope="col">TELEFONO</th> --}}
                            <th scope="col">NºPAX</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Idioma</th>
                            <th scope="col">Estado</th>
                            {{-- <th scope="col">PLATAFORMA</th> --}}
                            <th scope="col">Edicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td>{{ $tour->id_tour }}</td>
                                <td>{{ \Carbon\Carbon::parse($tour->fecha)->format('d/m/Y') }}</td>
                                {{-- <td>{{ $tour->nombre_turista }}</td>
                        <td>{{ $tour->telefono }}</td> --}}
                                {{-- <td>{{ $tour->cantidad_personas }}</td> --}}
                                <td>{{ $tour->totalPax() }}</td>
                                <td>{{ optional($tour->rutaHorarioIdioma->ruta)->nombre ?? 'Sin ruta' }}</td>
                                <td>
                                    @if ($tour->rutaHorarioIdioma && $tour->rutaHorarioIdioma->horario)
                                        <span class="badge bg-warning">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tour->rutaHorarioIdioma->horario->hora_inicio)->format('H:i') }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin horario</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($tour->rutaHorarioIdioma && $tour->rutaHorarioIdioma->idioma)
                                        <span class="badge bg-info">
                                            {{ $tour->rutaHorarioIdioma->idioma->nombre }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin idioma</span>
                                    @endif
                                </td>
                                <td>{{ $tour->estado }}</td>
                                {{-- <td>{{ $tour->plataforma }}</td> --}}
                                {{-- <td class="d-flex align-items-end">
                            <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-outline-success mb-1 me-3 icono-tabla" data-bs-toggle="modal"
                                    data-bs-target="#ModalEditarTour"
                                    data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                    <i class="bi bi-person-bounding-box" aria-hidden="true"></i>
                                </a>
                            </div>
                             <div class="d-flex justify-content-end">
                                <a href="#" class= "btn btn-outline-warning mb-1 me-3 icono-tabla" data-bs-toggle="modal"
                                    data-bs-target="#ModalEditarTour"
                                    data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                    <i class="bi bi-people" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td> --}}


                                <td class="d-flex justify-content-end">
                                    <div>
                                        <a href="#" class="btn btn-outline-success mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarTour"
                                            data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                            <i class="bi bi-person-bounding-box" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-warning mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarTour"
                                            data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                            <i class="bi bi-people" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="container mt-5 mb-5" id="CargarTablaToursEditados" style="display: none;">
             <h1>HISTORIAL TOURS</h1>
            <!-- Tabla de Tours -->
            <div class="col-12 table-responsive">
                <table id="toursTable" class="mt-5 table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            {{-- <th scope="col">NOMBRE</th>
                        <th scope="col">TELEFONO</th> --}}
                            <th scope="col">NºPAX</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Idioma</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Guia</th>
                            <th scope="col">Comision</th>
                            <th scope="col">Rendicion</th>
                            <th scope="col">Edicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td>{{ $tour->id_tour }}</td>
                                <td>{{ \Carbon\Carbon::parse($tour->fecha)->format('d/m/Y') }}</td>
                                {{-- <td>{{ $tour->nombre_turista }}</td>
                        <td>{{ $tour->telefono }}</td> --}}
                                {{-- <td>{{ $tour->cantidad_personas }}</td> --}}
                                <td>{{ $tour->totalPax() }}</td>
                                <td>{{ optional($tour->rutaHorarioIdioma->ruta)->nombre ?? 'Sin ruta' }}</td>
                                <td>
                                    @if ($tour->rutaHorarioIdioma && $tour->rutaHorarioIdioma->horario)
                                        <span class="badge bg-warning">
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tour->rutaHorarioIdioma->horario->hora_inicio)->format('H:i') }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin horario</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($tour->rutaHorarioIdioma && $tour->rutaHorarioIdioma->idioma)
                                        <span class="badge bg-info">
                                            {{ $tour->rutaHorarioIdioma->idioma->nombre }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">Sin idioma</span>
                                    @endif
                                </td>
                                <td>{{ $tour->estado }}</td>


                                <td>
                                    @if (empty($tour->id_guia))
                                        <i class="bi bi-question-circle-fill"
                                            style="font-size: 24px; color: rgb(66, 179, 141);"
                                            title="Reserva no asociada a un tour"></i>
                                    @else
                                        {{ $tour->id_guia }}
                                    @endif
                                </td>
                                 <td>{{ $tour->comision_tour }}</td>
                              
                                <td>
                                    @if (empty($tour->fecha_rendicion))
                                        <i class="bi bi-question-circle-fill"
                                               style="font-size: 24px; color: rgb(66, 139, 179);"
                                            title="Reserva no asociada a un tour"></i>
                                    @else
                                        {{ $tour->fecha_rendicion }}
                                    @endif
                                </td>

                                <td class="d-flex justify-content-end">
                                    <div>
                                        <a href="#" class="btn btn-outline-success mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarTour"
                                            data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                            <i class="bi bi-person-bounding-box" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-warning mb-1 me-3 icono-tabla"
                                            data-bs-toggle="modal" data-bs-target="#ModalEditarTour"
                                            data-bs-whatever="{{ $tour->id_tour }}|{{ $tour->nombre_turista }}|{{ $tour->telefono }}|{{ $tour->email }}|{{ $tour->cantidad_personas }}|{{ $tour->plataforma }}|{{ $tour->id_ruta_horario_idioma }}|{{ $tour->estado }}|{{ $tour->fecha }}">
                                            <i class="bi bi-people" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#toursTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                    "dom": '<"top"f>rt<"bottom"lp><"clear">',
                    "pageLength": 25
                });
            });
        </script>

        <script>
            function esconderTabla() {
                var tabla = document.getElementById('CargarTablaToursEditados');
                if (tabla.style.display === 'none' || tabla.style.display === '') {
                    tabla.style.display = 'block';
                } else {
                    tabla.style.display = 'none';
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
