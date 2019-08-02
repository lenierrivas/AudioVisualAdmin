@extends('layouts.app', ['activePage' => 'imagenes', 'titlePage' => __('Cargar Imágenes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

        <form method="POST" action="{{ route('listado-imagenes.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card ">

              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Agregar Imágenes') }}</h4>
                <p class="card-category"></p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('listado-imagenes.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-8">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Video/Relación') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <select class="form-control" name="videorelation" id="input-name" type="text" placeholder="{{ __('videorelation') }}" required="true" aria-required="true" autofocus>
                                    <option>Seleccione</option>
                                     @foreach($videos as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->maintitle }}</option>
                                      @endforeach
                                </select>

                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Etiquetas') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="label" id="input-name" type="text" placeholder="{{ __('Etiqueta') }}" required="true" aria-required="true">
                              </div>
                            </div>
                        </div>
                        <br>
                            <a href="#" id="btn-file" class="btn btn-info float-right">Agregar Mas</a>
                            <br><br><br>    

                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Imágenes') }}</label>
                            <div class="col-sm-2 form-group">
                                <input  type="radio" value="0" checked name="fileprincipal">Principal
                            </div>
                            <div class="col-sm-6 ">
                                <input type="file" name="file[0]">
                            </div>
                        
                            {{-- <a href="#" class="btn btn-danger" id="eliminar-btn">Eliminar</a> --}}
                            
                        </div>

                        <div id="images"></div>

                    </div>
                    <div class="col-md-2"></div>
                </div>

              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Registrar Imagenes') }}</button>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    
    <script>

        var p = 1;

        $("#btn-file").click(function(e) {
            e.preventDefault();
           $("#images").append(" <div class='row'><label class='col-sm-2 col-form-label'>{{ __('Imágenes') }}</label><div class='col-sm-2 form-group'><input  type='radio' value='"+p+"' name='fileprincipal'>Principal</div><div class='col-sm-6 '><input type='file' name='file["+p+"]'></div></div>");
            p++;
        });
    
        // function eliminar_btn(i){
        //    $('#images['+i+']').remove();
        // }

    </script>
@endsection