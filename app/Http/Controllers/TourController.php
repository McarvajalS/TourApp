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
        $tours = Tour::all();
        return view('tours', compact('tours'));
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
        Log::info('Entrando al método store tours');
        Log::info('Datos recibidos: ', $request->all());

        // Validar que al menos una reserva haya sido seleccionada
        $request->validate([
            'reservas' => 'required|array',
            'reservas.*' => 'exists:Reservas,id_reserva'
        ]);

        // Obtener la primera reserva seleccionada para tomar los datos de ruta, horario e idioma
        $primeraReserva = Reserva::findOrFail($request->reservas[0]);

        // Crear un nuevo tours con la información de la primera reserva seleccionada
        $tours = new Tour();
        $tours->fecha_tour = now();  // O puedes recibir la fecha desde el formulario
        $tours->id_ruta_horario_idioma = $primeraReserva->id_ruta_horario_idioma;
        $tours->id_guia = null;  // Se puede asignar luego si aplica
        $tours->estado = 'pendiente';  // Estado inicial del tours
        $tours->comision_tour = 0.00;  // Por defecto
        $tours->save(); // Guardamos el tours en la BD

        // Asignar todas las reservas seleccionadas a este nuevo tours
        Reserva::whereIn('id_reserva', $request->reservas)->update([
            'id_tour' => $tours->id_tour,
            'estado' => 'asignado' // Cambiar estado de las reservas
        ]);

        return redirect()->back()->with('success', 'Tour creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tours)
    {
        //
    }
}
