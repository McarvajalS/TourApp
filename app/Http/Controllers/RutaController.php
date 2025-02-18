<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\Idioma;
use App\Models\Horario;
use App\Models\RutaHorarioIdioma;
use App\Http\Helpers as Helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Storage;

class RutaController extends Controller
{
    
    public function index()
    {
        // Obtener todas las rutas con sus idiomas y horarios
        $rutas = Ruta::with(['rutaHorarioIdiomas.horario', 'rutaHorarioIdiomas.idioma'])->get();
        // $rutas = Ruta::all();
        $horarios = Horario::all();
        $idiomas = Idioma::all();

        return view('rutas', compact('rutas', 'horarios', 'idiomas'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {        

        Log::info('Entrando al método store');

                try {
                

        $request->validate([
                    'nombre' => 'required|string|max:255',
                    'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'estado' => 'required|in:1,2,3',
                    'horarios_idiomas' => 'required|array',
                ]);

                // Procesar la imagen
                $imagen = $request->file("imagen");
                $nombreImagenSubida = time() . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('img'), $nombreImagenSubida);

                // Crear la ruta
                $ruta = new Ruta();
                $ruta->nombre = $request->nombre;
                $ruta->estado = $request->estado;
                $ruta->imagen = 'img/' . $nombreImagenSubida;
                $ruta->save();

                // Guardar las relaciones de horarios e idiomas
                foreach ($request->horarios_idiomas as $horario_id => $idiomas) {
                    foreach ($idiomas as $idioma_id) {
                        RutaHorarioIdioma::create([
                            'id_rutas' => $ruta->id_rutas,
                            'id_horario' => $horario_id,
                            'id_idioma' => $idioma_id
                        ]);
                    }
                }


                    // Mensaje de éxito con SweetAlert2
                    Helpers\mostrarMensaje('success', '', 'Ruta creada correctamente.');
                    return redirect("/rutas");

                } catch (\Exception $e) {
                    // Manejo de excepciones y mensaje de error con SweetAlert2
                    Helpers\mostrarMensaje('error', '', 'Error al crear Ruta: ' . $e->getMessage());
                    return redirect()->back();
                }
    } 
   
    // public function store(Request $request)
    // {
    //     Log::info('Entrando al método store');
    //     Log::info('Datos recibidos: ', $request->all());

    //     // Validación de datos
    //     $request->validate([
    //         'nombre' => 'required|string|max:255',
    //         'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'estado' => 'required|in:1,2,3',
    //         'idiomas' => 'required|array',
    //         'horarios' => 'required|array',
    //     ]);

    //     // Procesar la imagen
    //     $imagen = $request->file("imagen");
    //     $nombreImagenSubida = null;

    //     if ($imagen instanceof \Illuminate\Http\UploadedFile) {
    //         $extension = $imagen->getClientOriginalExtension();
    //         $nombreImagenSubida = $request->nombre . "." . $extension;
    //         $imagen->move(public_path('img'), $nombreImagenSubida);
    //     } else {
    //         Log::error("Error: No se recibió la imagen o no es un archivo válido.");
    //         return back()->with('error', 'Error al subir la imagen. Inténtelo nuevamente.');
    //     }

    //     // Crear la ruta
    //     $ruta = new Ruta();
    //     $ruta->nombre = $request->nombre;
    //     $ruta->estado = $request->estado;
    //     $ruta->imagen = 'img/' . $nombreImagenSubida;
    //     $ruta->save();

    //     // Relacionar con horarios e idiomas en `ruta_horario_idioma`
    //     foreach ($request->horarios as $horario_id) {
    //         foreach ($request->idiomas as $idioma_id) {
    //             RutaHorarioIdioma::firstOrCreate([
    //                 'id_rutas' => $ruta->id_rutas,
    //                 'id_horario' => $horario_id,
    //                 'id_idioma' => $idioma_id
    //             ]);
    //         }
    //     }

    //     return redirect("/rutas")->with("success", "Ruta creada exitosamente con sus horarios e idiomas.");
    // }


    public function show(Ruta $ruta)
    {
        //
    }

    public function edit(Ruta $ruta)
    {
        //
    }

     public function update(Request $request, int $id_rutas)
    {
       Log::info('Entrando al método update');

        try {
           
            $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|in:1,2,3',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'horarios_idiomas' => 'required|array',
        ]);

        // Asegúrate de que el ID del idioma se obtenga correctamente desde la solicitud
        $id_rutas = $request->input('id_rutas');
        // Buscar la ruta
        $ruta = Ruta::findOrFail($id_rutas);
        $ruta->nombre = $request->nombre;
        $ruta->estado = $request->estado;

        // Manejar la imagen si se sube una nueva
        if ($request->hasFile('imagen')) {
            if ($ruta->imagen && file_exists(public_path($ruta->imagen))) {
                unlink(public_path($ruta->imagen));
            }
            $imagen = $request->file("imagen");
            $nombreImagenSubida = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img'), $nombreImagenSubida);
            $ruta->imagen = 'img/' . $nombreImagenSubida;
        }

        $ruta->save();

        // Eliminar relaciones anteriores y agregar nuevas
        RutaHorarioIdioma::where('id_rutas', $id_rutas)->delete();

        foreach ($request->horarios_idiomas as $horario_id => $idiomas) {
            foreach ($idiomas as $idioma_id) {
                RutaHorarioIdioma::create([
                    'id_rutas' => $ruta->id_rutas,
                    'id_horario' => $horario_id,
                    'id_idioma' => $idioma_id
                ]);
            }
        }
            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Ruta editada correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al editar Ruta: ' . $e->getMessage());
            return redirect()->back();
        }
    }

       
    

    public function destroy(Ruta $ruta)
    {
        Log::info('Entrando al método destroy');

        try {
            $ruta->delete();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Ruta eliminada correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al eliminar Ruta: ' . $e->getMessage());
            return redirect()->back();
        }
    } 


}
