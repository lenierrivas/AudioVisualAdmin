<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Imagenes;
use App\Videos;
use App\imgfiles;
use DB;

class ListadoImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = DB::table('imagenes')
                            ->select(
                                    'imagenes.id',
                                    'imagenes.label',
                                    'imgfiles.file',
                                    'imgfiles.fileprincipal',
                                    'videos.maintitle'
                                )
                            ->join('imgfiles','imgfiles.id_imagenes','=','imagenes.id')
                            ->join('videos','videos.id','=','imagenes.videorelation')
                            ->where('imgfiles.fileprincipal','si')
                            ->paginate(4);

        return view('pages.imagenes.listado_imagenes',compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos =  Videos::all();

        return view('pages.imagenes.partials.create', compact('videos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagenes = new Imagenes;
        $imagenes->videorelation = $request->videorelation;
        $imagenes->label = $request->label;
        $imagenes->save();

        if ($request->file('file')) {       

             $i = 0;

            foreach ($request->file('file') as $files) {
                $imgfiles = New imgfiles();
                $imgfiles->id_imagenes = $imagenes->id;

                $path = Storage::disk('public')->put('imagenes/', $files);

                $imgfiles->fill(['file' => $path]);

                if ($request->fileprincipal == $i) {

                    $imgfiles->fileprincipal = 'si';

                }else{

                }

                $imgfiles->save();  

                 $i++;

             }
  
        }
        return redirect()->route('listado-imagenes.index')->withStatus(__('Imágenes Cargadas con Éxito!.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imgfiles = DB::table('mostrar_img')
                            ->orderBy('fileprincipal')
                            ->select(
                                    '*'
                                )
                            ->where('tbl_img_id',$id)
                            ->get();
        return view('pages.imagenes.partials.show',compact('imgfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagenes = Imagenes::find($id);
        $video = Videos::all();
        $imgfiles = DB::table('mostrar_img')
                            ->orderBy('fileprincipal')
                            ->select(
                                    '*'
                                )
                            ->where('tbl_img_id',$id)
                            ->get();

        return view('pages.imagenes.partials.edit',compact('imagenes','video','imgfiles'));
        
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
        $imagen = Imagenes::find($id);

        $imagen->videorelation = $request->videorelation;
        $imagen->label = $request->label;
        $imagen->save();

            if ($request->file('file')) {

            foreach ($request->file('file') as $files) {
                
                $imgfiles = New imgfiles();
                $imgfiles->id_imagenes = $imagen->id;
                $path = Storage::disk('public')->put('imagenes/', $files);
                $imgfiles->fill(['file' => $path]);

                $imgfiles->save();  
              
             }
  
        }
        
        return redirect()->route('listado-imagenes.index')->withStatus(__('Imágenes Actualizado con Éxito!.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Imagenes::find($id);
        $imagen->delete();

        return redirect()->route('listado-imagenes.index')->withStatus(__('Imágenes Eliminadas con Éxito!.'));
    }

    public function destroy_imgfile($id)
    {
        $imagen = imgfiles::find($id);
        $imagen->delete();

        return 1;
    }

}
