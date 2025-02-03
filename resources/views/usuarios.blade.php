@extends('layouts.navbar')
@section('title', 'Usuarios - TourApp')
@section('contenido')

   <div class="container mt-5 mb-5">
    <h1 class="mt-5 mb-5 me-3 d-flex justify-content-end">USUARIOS</h1>
        <div class="d-flex justify-content-start">
            <a href="" class="btn rojo text-white mx-2" data-bs-toggle="modal" data-bs-target="#ModalCrearUsuario">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Usuario
            </a>
            <a href="" class="btn naranja text-white  mx-2" data-bs-toggle="modal"
                data-bs-target="#ModalEditarUsuario">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Editar Usuario
            </a>
            <a href="" class="btn lila text-white  mx-2" data-bs-toggle="modal" data-bs-target="#modalBorrado">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Confirmacion Borrar Usuario
            </a>
        </div>

        <!-- Tabla de usuarios -->
        
        <div class="table-responsive">
          <table class="mt-5 table table-info colorBarra">
            <thead class="colorBarra">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Borrar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      
    </div>

    <div>

    <!-- Modal Nuevo Usuario -->
        <div class="modal fade" id="ModalCrearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Usuario</h1>
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
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Telefono</label>
                                <input type="email" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-select form-group" id="estado" name="estado"
                                    aria-label="Default select example" required>
                                    <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                    <option value="1">Activo</option>
                                    <option value="2">No Activo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipus_usuaris_id">Tipo de Usuario</label>
                                <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id"
                                    aria-label="Default select example" required>
                                    <option value="" selected disabled>Seleccione Tipo de Usuario</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Guia</option>
                                    <option value="3">Turista</option>
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

        <!-- Modal Editar Usuario -->
        <div class="modal fade" id="ModalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h4 class="modal-title" id="modalBorradoLabel">Editar Usuario</h4>
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
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" id="contrasenaUPDATE" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correoUPDATE" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Telefono</label>
                                <input type="email" class="form-control" id="telefonoUPDATE" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-select form-group" id="estadoUPDATE" name="estado"
                                    aria-label="Default select example" required>
                                    <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                    <option value="1">Activo</option>
                                    <option value="2">No Activo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipus_usuaris_id">Tipo de Usuario</label>
                                <select class="form-select" id="tipus_usuaris_idUPDATE" name="tipus_usuaris_id"
                                    aria-label="Default select example" required>
                                    <option value="" selected disabled>Seleccione Tipo de Usuario</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Guia</option>
                                    <option value="3">Turista</option>
                                </select>
                            </div>
                        </form>

                        <div class="modal-footer mt-4">
                            <button type="submit" title="Guardar cambios" class="btn-guardar">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de confirmación de borrado -->
        <div class="modal fade" id="modalBorrado" tabindex="-1" aria-labelledby="modalBorradoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h4 class="modal-title" id="modalBorradoLabel">Confirmar Borrado</h4>
                        <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Estás seguro de que deseas borrar este usuario?</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" title="Borrar usuario" class="btn-guardar"
                            id="btnConfirmarBorrado">Borrar</button>
                    </div>
                </div>
            </div>
        </div>

            <!-- Script para pasar informacion al modal -->
            {{-- <script>
                        const modalEditarUsuario = document.getElementById('ModalEditarUsuario');
                        if (modalEditarUsuario) {
                            modalEditarUsuario.addEventListener('show.bs.modal', event => {
                                const button = event.relatedTarget;
                                const data = button.getAttribute('data-bs-whatever').split('|');
                                const nom_usuari = data[0];
                                const nom = data[1];
                                const cognom = data[2];
                                const contrasenya = data[3];
                                const tipus_usuaris_id = data[4];
                                const actiu = data[5];
                                const correu = data[6];

                                // Actualiza los campos del formulario con los datos del usuario
                                modalEditarUsuario.querySelector('#nom_usuariUPDATE').value = nom_usuari;
                                modalEditarUsuario.querySelector('#nombreUPDATE').value = nom;
                                modalEditarUsuario.querySelector('#apellidoUPDATE').value = cognom;
                                modalEditarUsuario.querySelector('#contraseñaUPDATE').value = contrasenya;
                                modalEditarUsuario.querySelector('#tipo_usuarioUPDATE').value = tipus_usuaris_id;
                                modalEditarUsuario.querySelector('#estadoUPDATE').value = actiu;
                                modalEditarUsuario.querySelector('#correoUPDATE').value = correu;
                            });
                        }
                    </script> --}}


    </div>

@endsection

<div></div>


