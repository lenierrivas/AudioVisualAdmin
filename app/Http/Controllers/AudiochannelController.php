<?php

namespace App\Http\Controllers;

use App\Audiochannel;
use Illuminate\Http\Request;

class AudiochannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiochannels = Audiochannel::all();
        return view('pages.audiochannel.index',compact('audiochannels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.audiochannel.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $audiochannel = new Audiochannel;
        $audiochannel->audiochannels = $request->audiochannels;
        $audiochannel->save();

        return redirect()->route('audiochannel.index')->withStatus(__('Canal de Audio Creado con Éxito!.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audiochannel  $audiochannel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audiochannel  $audiochannel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audiochannel = Audiochannel::find($id);

        return view('pages.audiochannel.partials.edit',compact('audiochannel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audiochannel  $audiochannel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $audiochannel = Audiochannel::find($id);
        $audiochannel->audiochannels = $request->audiochannels;
        $audiochannel->update();

        return redirect()->route('audiochannel.index')->withStatus(__('Canal de Audio Actualizado con Éxito!.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audiochannel  $audiochannel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audiochannel = Audiochannel::find($id);
        $audiochannel->delete();

        return redirect()->route('audiochannel.index')->withStatus(__('Canal de Audio Eliminado con Éxito!.'));
    }
}
