@extends('layouts.navbar')
@section('title', 'Reservas - TourApp')
@section('contenido')
    <div class="container">
         <h1 class="mt-5 mb-5 me-3 d-flex justify-content-end">RESERVAS</h1>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-start">
                <a href="" class="btn rojo text-white mx-2" data-bs-toggle="modal" data-bs-target="#ModalCrearReserva">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Reserva
                </a>
                <a href="" class="btn naranja text-white  mx-2" data-bs-toggle="modal"
                    data-bs-target="#ModalEditarReserva">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Editar Reserva
                </a>
                <a href="" class="btn lila text-white  mx-2" data-bs-toggle="modal" data-bs-target="#modalBorrado">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Confirmacion Borrar Reserva
                </a>
            </div>

            <!-- Tabla de Reservas -->

            <div class="col-12 table-responsive">
                <table class="mt-5 table table-info colorBarra">
                    <thead class="colorBarra">
                        <tr>
                            <th scope="col">ID-RESERVA</th>
                            <th scope="col">ID-TOUR</th>
                            <th scope="col">ID-RUTAS</th>
                            <th scope="col">ID-TURISTA</th>
                            <th scope="col">NOMBRE TURISTA</th>
                            <th scope="col">PERSONAS</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">ASISTENCIA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">Editar</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div>

        <!-- Modal Nuevo Reserva -->
        <div class="modal fade" id="ModalCrearReserva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Reserva</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Fecha</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Cantidad</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-select form-group" id="estado" name="estado"
                                    aria-label="Default select example" required>
                                    <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                    <option value="1">Por asignar</option>
                                    <option value="2">Asignado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipus_usuaris_id">Selecciona Ruta </label>
                                <select class="form-select" id="tipo_ruta" name="tipus_usuaris_id"
                                    aria-label="Default select example" required>
                                    <option value="" selected disabled>Seleccione Ruta</option>
                                    <option value="1">Arco Triunfo</option>
                                    <option value="2">Sagrada Familia</option>
                                    <option value="3">Gotico</option>

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

        <!-- Modal Editar Reserva -->
        <div class="modal fade" id="ModalEditarReserva" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="modalBorradoLabel">Editar Reserva</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nombre</label>
                                <input type="text" class="form-control" id="nombreUPDATE" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellidoUPDATE" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Fecha</label>
                                <input type="password" class="form-control" id="contrasenaUPDATE" name="contrasena"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Cantidad</label>
                                <input type="email" class="form-control" id="correoUPDATE" name="correo" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-select form-group" id="estadoUPDATE" name="estado"
                                    aria-label="Default select example" required>
                                    <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                    <option value="1">Por Agisnar</option>
                                    <option value="2">Asignado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipus_usuaris_id">Selecciona Ruta </label>
                                <select class="form-select" id="tipo_rutaUPDATE" name="tipo_ruta"
                                    aria-label="Default select example" required>
                                    <option value="" selected disabled>Seleccione Ruta</option>
                                    <option value="1">Arco Triunfo</option>
                                    <option value="2">Sagrada Familia</option>
                                    <option value="3">Gotico</option>

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
        <!-- Modal de confirmación de borrado -->
        <div class="modal fade" id="modalBorrado" tabindex="-1" aria-labelledby="modalBorradoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="modalBorradoLabel">Confirmar Borrado</h1>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Estás seguro de que deseas borrar este Reserva?</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" title="Borrar Reserva" class="btn-guardar"
                            id="btnConfirmarBorrado">Borrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script para pasar informacion al modal -->
        {{-- <script>
            const modalEditarReserva = document.getElementById('ModalEditarReserva');
            if (modalEditarReserva) {
                modalEditarReserva.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const data = button.getAttribute('data-bs-whatever').split('|');
                    const nom_usuari = data[0];
                    const nom = data[1];
                    const cognom = data[2];
                    const contrasenya = data[3];
                    const tipus_usuaris_id = data[4];
                    const actiu = data[5];
                    const correu = data[6];

                    // Actualiza los campos del formulario con los datos del Reserva
                    modalEditarReserva.querySelector('#nom_usuariUPDATE').value = nom_usuari;
                    modalEditarReserva.querySelector('#nombreUPDATE').value = nom;
                    modalEditarReserva.querySelector('#apellidoUPDATE').value = cognom;
                    modalEditarReserva.querySelector('#contraseñaUPDATE').value = contrasenya;
                    modalEditarReserva.querySelector('#tipo_ReservaUPDATE').value = tipus_usuaris_id;
                    modalEditarReserva.querySelector('#estadoUPDATE').value = actiu;
                    modalEditarReserva.querySelector('#correoUPDATE').value = correu;
                });
            }
        </script> --}}




    </div>

@endsection


<html>
</html>
