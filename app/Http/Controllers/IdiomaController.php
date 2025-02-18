<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Http\Helpers as Helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;

class IdiomaController extends Controller
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

        Log::info('Entrando al método store idioma');

        try {
            // Crear el horario
            $idioma = Idioma::create([
                'nombre' => $request->nombre,
            ]);

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Idioma creado correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al crear el idioma: ' . $e->getMessage());
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
    public function update(Request $request, int $id_idioma): Redirector|RedirectResponse
    {
        Log::info('Entrando al método update');

        try {
            $id_idioma = $request->input('id_idioma');

            $idioma = Idioma::findOrFail($id_idioma);

            $idioma->nombre = $request->input('nombre');
            $idioma->save();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Idioma editado correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al editar el idioma: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idioma $idioma)
    {

        Log::info('Entrando al método destroy');

        try {
            $idioma->delete();

            // Mensaje de éxito con SweetAlert2
            Helpers\mostrarMensaje('success', '', 'Idioma eliminado correctamente.');
            return redirect("/rutas");

        } catch (\Exception $e) {
            // Manejo de excepciones y mensaje de error con SweetAlert2
            Helpers\mostrarMensaje('error', '', 'Error al eliminar el idioma: ' . $e->getMessage());
            return redirect()->back();
        }

    }
}






