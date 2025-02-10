<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Clases\Utilidad;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuario::paginate(5);
        /*echo "<pre>";
        print_r($usuarios);
        echo "</pre>";*/
        $response=view("usuarios",compact("usuarios"));
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response=view("crear_usuario");
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recuperar los datos del formulario
        $nombre=$request->input("Nombre");
        $apellido=$request->input("Apellido");
        $email=$request->input("Email");
        $telefono=$request->input("Telefono");
        $contrasenia=$request->input("Contrasenia");
        $rol=$request->input("Rol");

        //Crear un objeto de la clase que representa una consulta a la tabla
        $usuario=new Usuario();
        //Asignar los valores del formulario a su respectivo campo
        $usuario->nombre=$nombre;
        $usuario->apellido=$apellido;
        $usuario->email=$email;
        $usuario->telefono=$telefono;
        $usuario->contrasenia=\bcrypt($contrasenia);
        $usuario->id_rol=$rol;

        try
        {
            //Hacer el insert en la tabla
            $usuario->save();
            $request->session()->flash("mensaje","Usuario agregado correctamente.");
            $response=redirect()->action([UsuarioController::class,"index"]);
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            $request->session()->flash("error",$mensaje);
            $response=redirect()->action([UsuarioController::class,"create"])->withInput();
        }
        

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $response=view("editar_usuario",compact("usuario"));
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //Recuperar los datos del formulario
        $nombre=$request->input("Nombre");
        $apellido=$request->input("Apellido");
        $email=$request->input("Email");
        $telefono=$request->input("Telefono");
        $rol=$request->input("Rol");
        
        //Asignar los valores del formulario a su respectivo campo
        $usuario->nombre=$nombre;
        $usuario->apellido=$apellido;
        $usuario->email=$email;
        $usuario->telefono=$telefono;
        $usuario->id_rol=$rol;
        
        try
        {
            //Hacer el insert en la tabla
            $usuario->save();
            $request->session()->flash("mensaje","Usuario actualizado correctamente.");
            $response=redirect()->action([UsuarioController::class,"index"]);
            
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            $request->session()->flash("error",$mensaje);
            $response=redirect()->action([UsuarioController::class,"edit"],["usuario"=>$usuario])->withInput();
        }
        
        
        return $response;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Usuario $usuario)
    {
        try
        {
            $usuario->delete();
            $request->session()->flash("mensaje","Usuario borrado correctamente.");
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            if($mensaje==="Registro con elementos relacionados")
            {
                $request->merge(['tipoDeModificacion'=>"ponerInactivo"]);
                app(UsuarioController::class)->update($request,$usuario);
            }
            else
            {
                $request->session()->flash("error",$mensaje);
            }
        }
        return redirect()->action([UsuarioController::class,"index"]);
    }
}
