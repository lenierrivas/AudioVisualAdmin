<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use App\Videos;
Use App\Types;
Use App\Audiochannel;
Use App\Versiones;
Use App\Extensiones;
use DB;

class ListadoVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Videos $model)
    {
        $types = Types::all();
        return view('pages.videos.listado_videos',['videos' => $model->paginate(3)], compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Types::all();
        $audiochannels = Audiochannel::all();
        $versiones = Versiones::all();
        $extensiones = extensiones::all();

        return view('pages.videos.partials.create', compact('types', 'audiochannels', 'versiones', 'extensiones')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('file');
        $names = time() . '.' . $files->getClientOriginalExtension();
        $path2 = public_path() . '/videos/';
        $files->move($path2, $names);

        $video = new Videos;
        $video->maintitle = $request->maintitle;
        $video->secondtitle = $request->secondtitle;
        $video->label = $request->label;
        $video->location = $request->location;
        $video->extension = $request->extension;
        $video->type = $request->type;
        $video->audiochannels = $request->audiochannels;
        $video->Versiones = $request->Versiones;
        $video->file = $names;
        $video->description = $request->description;
        $video->save();

        return redirect()->route('listado-videos.index')->withStatus(__('Video Cargando con Exito!.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Videos::find($id);
        $types = Types::all();
        $audiochannels = Audiochannel::all();
        $versiones = Versiones::all();
        $extensiones = extensiones::all();

        $imgfiles = DB::table('imgfiles')
                            ->select(
                                    'imgfiles.file',
                                    'imgfiles.fileprincipal'
                                )
                            ->join('imagenes','imagenes.id','=','imgfiles.id_imagenes')
                            ->join('videos','videos.id','=','imagenes.videorelation')
                            ->where('videos.id',$id)
                            ->get();

        return view('pages.videos.partials.show',compact('video','types', 'audiochannels', 'versiones', 'extensiones','imgfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Types::all();
        $audiochannels = Audiochannel::all();
        $versiones = Versiones::all();
        $extensiones = extensiones::all();
        $video = Videos::find($id); 
        return view('pages.videos.partials.edit',compact('video','types', 'audiochannels', 'versiones', 'extensiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Videos::find($id);

        $video->maintitle = $request->maintitle;
        $video->secondtitle = $request->secondtitle;
        $video->label = $request->label;
        $video->location = $request->location;
        $video->extension = $request->extension;
        $video->type = $request->type;
        $video->audiochannels = $request->audiochannels;
        $video->Versiones = $request->Versiones;
        $video->description = $request->description;
        $video->update();
                
        return redirect()->route('listado-videos.index')->withStatus(__('Video Actualizado con Exito!.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videos::find($id);
        $video->delete();

        return redirect()->route('listado-videos.index')->withStatus(__('Video Eliminado con Exito!.'));

    }
}
