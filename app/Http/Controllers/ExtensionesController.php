<?php

namespace App\Http\Controllers;

use App\Extensiones;
use Illuminate\Http\Request;

class ExtensionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extensiones = extensiones::all();
        return view('pages.extensiones.index',compact('extensiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.extensiones.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extensiones = new extensiones;
        $extensiones->extensiones = $request->extensiones;
        $extensiones->save();

        return redirect()->route('extensiones.index')->withStatus(__('Extensión Creada con Éxito!.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extensiones  $extensiones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extensiones  $extensiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extensiones = extensiones::find($id);

        return view('pages.extensiones.partials.edit',compact('extensiones'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extensiones  $extensiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $extensiones = extensiones::find($id);
        $extensiones->extensiones = $request->tipo;
        $extensiones->update();

        return redirect()->route('extensiones.index')->withStatus(__('Extensión Actualizada con Éxito!.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extensiones  $extensiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extensiones = extensiones::find($id);
        $extensiones->delete();

        return redirect()->route('extensiones.index')->withStatus(__('Extensión Eliminada con Éxito!.'));
    }
}
