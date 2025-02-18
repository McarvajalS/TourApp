<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Http\Helpers as Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HorarioController  extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        Log::info('Entrando al método store horario');
        try {
            // Validar el formato del input antes de guardarlo
            $request->validate([
                'hora_inicio' => 'required|date_format:H:i',
            ]);

            // Crear el horario y guardar solo HH:MM en la BD
            $horario = new Horario();
            $horario->hora_inicio = Carbon::createFromFormat('H:i', $request->hora_inicio)->format('H:i');
            $horario->save();
        
            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Horario creado correctamente.');
            return redirect("/rutas");            

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
              Helpers\mostrarMensaje('error', '', 'Error al crear el horario: ' . $e->getMessage());
            return redirect()->back();
        }
    }

        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id_horario): Redirector|RedirectResponse
    {
        Log::info('Entrando al método update');
        Log::info('Datos recibidos: ', $request->all());

         try {
              // Asegúrate de que el ID del horario se obtenga correctamente desde la solicitud
        $id_horario = $request->input('id_horarioEditar');
        Log::info("id_HORARIO: " . $id_horario);

        $horario = Horario::findOrFail($id_horario);
        Log::info("objeto horario: " . $horario);

        $horario->hora_inicio = $request->input('hora');
        $horario->save();

        
            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Horario modicado correctamente.');
            return redirect("/rutas");            

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
              Helpers\mostrarMensaje('error', '', 'Error al modificar el horario: ' . $e->getMessage());
            return redirect()->back();
        }
      
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        Log::info('Entrando al método destroy');

        try {
            $horario->delete();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Horario eliminado correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al eliminar el horario: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}


// Log::info('Entrando al método destroy');

// try {
//     $horario->delete();

//     // Mensaje de éxito con SweetAlert2
//     Helpers\mostrarMensaje('success', '', 'Horario eliminado correctamente.');
//     return redirect("/rutas");

// } catch (\Exception $e) {
//     // Manejo de excepciones y mensaje de error con SweetAlert2
//     Helpers\mostrarMensaje('error', '', 'Error al eliminar el horario: ' . $e->getMessage());
//     return redirect()->back();
// }

Log::info('Entrando al método destroy');

try {
    $horario->delete();

    // Mensaje de éxito con SweetAlert2
    Helpers\mostrarMensaje('success', '', 'Horario eliminado correctamente.');
    return redirect("/rutas");

} catch (\Exception $e) {
    // Manejo de excepciones y mensaje de error con SweetAlert2
    Helpers\mostrarMensaje('error', '', 'Error al eliminar el horario: ' . $e->getMessage());
    return redirect()->back();
}