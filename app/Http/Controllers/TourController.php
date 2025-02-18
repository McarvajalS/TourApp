<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class TourController extends Controller
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
    // public function store(Request $request)
    // {
    //     //
    // }


    public function store(Request $request)
    {

        Log::info('Entrando al método store tour');
        Log::info('Datos recibidos: ', $request->all());
        // Validar que al menos una reserva haya sido seleccionada
        $request->validate([
            'reservas' => 'required|array',
            'reservas.*' => 'exists:Reservas,id_reserva'
        ]);

        // Obtener la primera reserva seleccionada para tomar los datos de ruta, horario e idioma
        $primeraReserva = Reserva::findOrFail($request->reservas[0]);

        // Crear un nuevo tour con la información de la primera reserva seleccionada
        $tour = new Tour();
        $tour->fecha_tour = now();  // O puedes recibir la fecha desde el formulario
        $tour->id_ruta_horario_idioma = $primeraReserva->id_ruta_horario_idioma;
        $tour->id_guia = null;  // Se puede asignar luego si aplica
        $tour->estado = 'pendiente';  // Estado inicial del tour
        $tour->comision_tour = 0.00;  // Por defecto
        $tour->save(); // Guardamos el tour en la BD

        // Asignar todas las reservas seleccionadas a este nuevo tour
        Reserva::whereIn('id_reserva', $request->reservas)->update([
            'id_tour' => $tour->id_tour,
            'estado' => 'asignado' // Cambiar estado de las reservas
        ]);

        return redirect()->back()->with('success', 'Tour creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
