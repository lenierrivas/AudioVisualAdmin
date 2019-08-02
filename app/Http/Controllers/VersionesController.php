<?php

namespace App\Http\Controllers;

use App\Versiones;
use Illuminate\Http\Request;

class VersionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $versiones = versiones::all();
        return view('pages.versiones.index',compact('versiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.versiones.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $versiones = new versiones;
        $versiones->Versiones = $request->versiones;
        $versiones->save();

        return redirect()->route('versiones.index')->withStatus(__('Versión Creado con Éxito!.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Versiones  $versiones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Versiones  $versiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $versiones = versiones::find($id);

        return view('pages.versiones.partials.edit',compact('versiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Versiones  $versiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $versiones = versiones::find($id);
        $versiones->Versiones = $request->versiones;
        $versiones->update();

        return redirect()->route('versiones.index')->withStatus(__('Versión Actualizado con Éxito!.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Versiones  $versiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $versiones = versiones::find($id);
        $versiones->delete();

        return redirect()->route('versiones.index')->withStatus(__('Versión Eliminado con Éxito!.'));
    }
}
