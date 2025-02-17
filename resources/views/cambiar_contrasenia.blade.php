@extends('layouts.navbar')
    @section("title")
        Cambiar contraseña
    @endsection
    @section('contenido')
        @include("partials.mensajes")
        <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <p class="h5 font-wight-bold">
                        <strong>
                            Cambiar contraseña de "{{$usuario->nombre}}"
                        </strong>
                    </p>
                    <form class="row" action="{{action([App\Http\Controllers\UsuarioController::class,'updateContrasenia'],['id_usuario'=>$usuario->id_usuario])}}" method="POST">  
                        @csrf

                        <label for="contrasenia" class="col-sm-2 col-form-label">
                            Nueva contraseña:
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="password" id="contrasenia" class="form-control" name="Contrasenia">
                        </div>                  


                        <div class="col-sm-12 text-end">
                            <a href="{{url('usuarios')}}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i>
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-key-fill"></i>
                                Cambiar contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection