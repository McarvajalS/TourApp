@extends('layouts.navbar')
@section('title', 'Rutas - TourApp')
@section('contenido')
     <div class="container mt-5 mb-5">
         <h1 class="mt-5 mb-5 me-3 d-flex justify-content-end">RUTAS</h1>
        <div class="d-flex justify-content-start">
            <a href="" class="btn rojo text-white mx-2" data-bs-toggle="modal" data-bs-target="#ModalCrearRuta">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva ruta
            </a>
            <a href="" class="btn naranja text-white  mx-2" data-bs-toggle="modal"
                data-bs-target="#ModalEditarRuta">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Editar Ruta
            </a>
            <a href="" class="btn lila text-white  mx-2" data-bs-toggle="modal" data-bs-target="#modalBorrado">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Confirmacion Borrar Ruta
            </a>
        </div>

        <!-- Tabla de rutas -->
        
        <div class="col-12 table-responsive">
          <table class="mt-5 table table-info colorBarra">
            <thead class="colorBarra">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Duracion</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      
    </div>
   
    <div>

                    <!-- Modal Nuevo Ruta -->
            <div class="modal fade" id="ModalCrearRuta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Ruta</h1>
                            <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="text" class="form-control" id="imagen" name="imagen" required>
                                </div>
                                <div class="form-group">
                                    <label for="duracion">Duracion</label>
                                    <input type="time" class="form-control" id="duracion" name="duracion" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" required>
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
                            <h1 class="modal-title fs-5" id="modalBorradoLabel">Editar Ruta</h1>
                            <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="text" class="form-control" id="imagen" name="imagen" required>
                                </div>
                                <div class="form-group">
                                    <label for="duracion">Duracion</label>
                                    <input type="time" class="form-control" id="duracion" name="duracion" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" required>
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
                            <h1 class="modal-title fs-5" id="modalBorradoLabel">Confirmar Borrado</h1>
                            <button type="button" title="Cerrar Ventana" class="btn-cerrar" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>¿Estás seguro de que deseas borrar esta ruta?</h5>
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


<html>
</html>

