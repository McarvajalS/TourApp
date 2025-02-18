<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\RutaHorarioIdioma;
use App\Http\Helpers as Helpers;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::where('estado', '!=', 'asignar')->get();
        $nuevas_reservas = Reserva::where('estado', 'asignar')->get();

        // Filtrar solo rutas activas
        $rutas_horarios_idiomas = RutaHorarioIdioma::whereHas('ruta', function ($query) {
            $query->where('estado', 'Activa'); 
        })->with(['ruta', 'horario', 'idioma'])->get();

        return view('reservas', compact('reservas', 'rutas_horarios_idiomas', 'nuevas_reservas'));
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
 
        Log::info('Entrando al método store');

        try {

            // Validar los datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'telefono' => 'required|string|max:20',
                'email' => 'required|email',
                'cantidad_personas' => 'required|integer|min:1|max:25',
                'plataforma' => 'required|string',
                'id_ruta_horario_idioma' => 'required|exists:ruta_horario_idioma,id_ruta_horario_idioma',
            ]);

            // Crear la reserva
            $reserva = new Reserva();
            $reserva->nombre_turista = $request->nombre;
            $reserva->telefono = $request->telefono;
            $reserva->email = $request->email;
            $reserva->cantidad_personas = $request->cantidad_personas;
            $reserva->plataforma = $request->plataforma;
            $reserva->id_ruta_horario_idioma = $request->id_ruta_horario_idioma;
            $reserva->estado = "asignar"; // Estado inicial
            $reserva->fecha = $request->fecha;
            $reserva->save();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Reserva creada exitosamente');
            return redirect("/reservas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al crear Reserva: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id_reserva): Redirector|RedirectResponse
    {
        Log::info('Entrando al método update');

        try {
       
            Log::info('Datos recibidos: ', $request->all());
            Log::info('ID de la reserva: ', ['id_reserva' => $id_reserva]);

            // Crear la reserva

            $id_reserva = $request->input('id_reserva');

            $reserva = Reserva::findOrFail($id_reserva);

            $reserva->nombre_turista = $request->input('nombre_turista');
            $reserva->telefono = $request->input('telefono');
            $reserva->email = $request->input('email');
            $reserva->cantidad_personas = $request->input('cantidad_personas');
            $reserva->plataforma = $request->input('plataforma');
            $reserva->estado = $request->input('estado');
            $reserva->id_ruta_horario_idioma = $request->input('id_ruta_horario_idioma');
            $reserva->fecha = $request->input('fecha');

            $reserva->save();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Reserva editada exitosamente');
            return redirect("/reservas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al editar Reserva: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // public function destroy(Reserva $reserva)
    // {
    //     Log::info('Entrando al método destroy reserva');

    //     $reserva->delete();

    //     Log::info('Ruta eliminada exitosamente');
    //     return redirect()->action([ReservaController::class, 'index'])->with('success', 'Reserva eliminada exitosamente.');
    // }


    public function destroy(Reserva $nueva_reserva)
    {
        Log::info('Entrando al método destroy');

        try {
            $nueva_reserva->delete();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Reserva eliminada exitosamente');
            return redirect("/reservas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al eliminar Reserva: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
