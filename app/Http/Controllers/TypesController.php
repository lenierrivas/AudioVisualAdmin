<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Types::all();
        return view('pages.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.types.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Types;
        $type->types = $request->tipo;
        $type->save();

        return redirect()->route('types.index')->withStatus(__('Tipo Creado con Éxito!.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Types::find($id);

        return view('pages.types.partials.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = Types::find($id);
        $type->types = $request->tipo;
        $type->update();

        return redirect()->route('types.index')->withStatus(__('Tipo Actualizado con Éxito!.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Types::find($id);
        $types->delete();

        return redirect()->route('types.index')->withStatus(__('Tipo Eliminado con Éxito!.'));
    }
}
