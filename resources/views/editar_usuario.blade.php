@extends('layouts.navbar')
    @section("title")
        Editar usuario
    @endsection
    @section('contenido')
        @include("partials.mensajes")
        <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <p class="h5 font-wight-bold">
                        <strong>
                            Editar usuario "{{$usuario->nombre}}"
                        </strong>
                    </p>
                    <form action="{{action([App\Http\Controllers\UsuarioController::class,'update'],['usuario'=>$usuario])}}" class="row" method="POST">  
                        @csrf
                        @method("PUT")

                        <label for="nombre" class="col-sm-2 col-form-label">
                            Nombre:
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" id="nombre" class="form-control" name="Nombre" @if (Session::has("error")) value="{{old('Nombre')}}" @else value="{{$usuario->nombre}}" @endif>
                        </div>

                        <label for="apellido" class="col-sm-2 col-form-label">
                            Apellido:
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" id="apellido" class="form-control" name="Apellido" @if (Session::has("error")) value="{{old('Apellido')}}" @else value="{{$usuario->apellido}}" @endif>
                        </div>
                        
                        <label for="email" class="col-sm-2 col-form-label">
                            Email:
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="email" id="email" class="form-control" name="Email" @if (Session::has("error")) value="{{old('Email')}}" @else value="{{$usuario->email}}" @endif>
                        </div>

                        <label for="telefono" class="col-sm-2 col-form-label">
                            Teléfono
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="tel" id="telefono" class="form-control" name="Telefono" @if (Session::has("error")) value="{{old('Telefono')}}" @else value="{{$usuario->telefono}}" @endif>
                        </div>

                        <label for="rol" class="col-sm-2 col-form-label">
                            Rol:
                        </label>
                        <div class="col-sm-10 mb-3">
                            <select name="Rol" id="rol" class="form-select">
                                <option value="1" @if($usuario->id_rol===1) @selected(true) @endif>Administrador</option>
                                <option value="2" @if($usuario->id_rol===2) @selected(true) @endif>Supervisor</option>
                                <option value="3" @if($usuario->id_rol===3) @selected(true) @endif>Guia</option>
                                <option value="4" @if($usuario->id_rol===4) @selected(true) @endif>Turista</option>
                            </select>
                        </div>                    

                        <div class="col-sm-12 text-end">
                            <a href="{{url('usuarios')}}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i>
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    @endsection