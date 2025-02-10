@extends('layouts.navbar')
    @section("title")
        Crear nuevo usuario
    @endsection
    @section('contenido')
        @include("partials.mensajes")
        <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <p class="h5 font-wight-bold">
                        <strong>
                            Crear nuevo usuario
                        </strong>
                    </p>
                    <form action="{{action([App\Http\Controllers\UsuarioController::class,'store'])}}" class="row" method="POST">  
                        @csrf


                        <label for="nombre" class="col-sm-2 col-form-label" hidden>
                            Nombre
                        </label>
                        <div class="col-sm-12 mb-3">
                            <input type="text" id="nombre" class="form-control" name="Nombre" autofocus value="{{old('Nombre')}}" placeholder="Nombre">
                        </div>

                        <label for="apellido" class="col-sm-2 col-form-label" hidden>
                            Apellido
                        </label>
                        <div class="col-sm-12 mb-3">
                            <input type="text" id="apellido" class="form-control" name="Apellido" value="{{old('Apellido')}}" placeholder="Apellido">
                        </div>

                        <label for="email" class="col-sm-2 col-form-label" hidden>
                            Email
                        </label>
                        <div class="col-sm-12 mb-3">
                            <input type="email" id="email" class="form-control" name="Email" value="{{old('Email')}}" placeholder="Email">
                        </div>

                        <label for="telefono" class="col-sm-2 col-form-label" hidden>
                            Teléfono
                        </label>
                        <div class="col-sm-12 mb-3">
                            <input type="tel" id="telefono" class="form-control" name="Telefono" value="{{old('Telefono')}}" placeholder="Teléfono">
                        </div>

                        <label for="contrasenia" class="col-sm-2 col-form-label" hidden>
                            Contraseña
                        </label>
                        <div class="col-sm-12 mb-3">
                            <input type="password" id="contrasenia" class="form-control" name="Contrasenia" value="{{old('Contrasenia')}}" placeholder="Contraseña">
                        </div>
                        
                        <label for="rol" class="col-sm-2 col-form-label" hidden>
                            Rol
                        </label>
                        <div class="col-sm-12 mb-3">
                            <select name="Rol" class="form-select">
                                <option value="1" selected>Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Guia</option>
                                <option value="3">Turista</option>
                            </select>
                        </div>
                        

                        <div class="col-sm-12 text-end">
                            <a href="{{url('usuarios')}}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i>
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                                Crear
                            </button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    @endsection