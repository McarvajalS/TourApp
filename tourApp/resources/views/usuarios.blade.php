<!DOCTYPE html>
<html>
<head>
    <title>Página de usuario</title>
    @vite(['resources/css/app.css', 'resources/css/tour-app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <h1>USUARIOS TOUR-APP</h1>
    </div>

    <!-- Botones activadores Modales -->
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-start">
            <a href="" class="btn rojo text-white mx-2" data-bs-toggle="modal" data-bs-target="#ModalCrearUsuario">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Usuario
            </a>
            <a href="" class="btn naranja text-white mx-2" data-bs-toggle="modal" data-bs-target="#ModalEditarUsuario">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Editar Usuario
            </a>
            <a href="" class="btn lila text-white mx-2" data-bs-toggle="modal" data-bs-target="#modalBorrado">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Confirmacion Borrar Usuario
            </a>
        </div>
    </div>

    <!-- Resto del contenido -->
    <div class="container mt-5">
        <!-- Tabla de usuarios -->
        <table class="mt-2 table table-hover table-borderless">
            <thead class="table-dark lila">
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
                # ...existing code...
            </tbody>
        </table>

        <div>
            <button class="negro">HOLA</button>
        </div>
    </div>

    <!-- Modal Nuevo Usuario -->
    <div class="modal fade" id="ModalCrearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Usuario</h1>
                    <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="nom_usuari">Usuario</label>
                            <input type="text" class="form-control" id="nom_usuari" name="nom_usuari" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nombre</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="cognom" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contrasenya" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correu" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-select form-group" id="estado" name="actiu" aria-label="Default select example" required>
                                <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                <option value="1">Activo</option>
                                <option value="2">No Activo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipus_usuaris_id">Tipo de Usuario</label>
                            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id" aria-label="Default select example" required>
                                <option value="" selected disabled>Seleccione Categoria</option>
                                <option value="1">Administrador</option>
                                <option value="2">Profesor</option>
                                <option value="3">Alumno</option>
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
    <div class="modal fade" id="ModalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                    <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="nom_usuari">Usuario</label>
                            <input type="text" class="form-control" id="nom_usuari" name="nom_usuari" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nombre</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="cognom" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contrasenya" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correu" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-select form-group" id="estado" name="actiu" aria-label="Default select example" required>
                                <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                <option value="1">Activo</option>
                                <option value="2">No Activo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipus_usuaris_id">Tipo de Usuario</label>
                            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id" aria-label="Default select example" required>
                                <option value="" selected disabled>Seleccione Categoria</option>
                                <option value="1">Administrador</option>
                                <option value="2">Profesor</option>
                                <option value="3">Alumno</option>
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

    <!-- Modal Confirmacion Borrar Usuario -->
    <div class="modal fade" id="modalBorrado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion Borrar Usuario</h1>
                    <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="nom_usuari">Usuario</label>
                            <input type="text" class="form-control" id="nom_usuari" name="nom_usuari" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nombre</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="cognom" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contrasenya" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correu" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-select form-group" id="estado" name="actiu" aria-label="Default select example" required>
                                <option class="form-group" value="" selected disabled>Seleccione Estado</option>
                                <option value="1">Activo</option>
                                <option value="2">No Activo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipus_usuaris_id">Tipo de Usuario</label>
                            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id" aria-label="Default select example" required>
                                <option value="" selected disabled>Seleccione Categoria</option>
                                <option value="1">Administrador</option>
                                <option value="2">Profesor</option>
                                <option value="3">Alumno</option>
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
</body>
</html>
