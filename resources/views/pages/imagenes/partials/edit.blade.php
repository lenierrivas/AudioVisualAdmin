@extends('layouts.app', ['activePage' => 'imagenes', 'titlePage' => __('Editar Imágenes')])

@section('content')
{{-- @php var_dump($video); @endphp --}}
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

        <form method="POST" id="CreateForm" action="{{ route('listado-imagenes.update', $imagenes->id) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Editar Imágenes') }}</h4>
                <p class="card-category">Información de las Imágenes</p>
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
                                <select class="form-control" name="videorelation" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    @foreach($video as $type)
                                      @if($imagenes->videorelation == $type->id)
                                        <option selected value="{{ $type->id }}">{{ $type->maintitle }}</option>
                                      @else
                                        <option value="{{ $type->id }}">{{$type->maintitle}}</option>
                                      @endif
                                    @endforeach
                                </select>

                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Etiquetas') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="label" id="input-name" type="text" value="{{ $imagenes->label }}" required="true" aria-required="true">
                              </div>
                            </div>
                        </div>
                        <br>
                            <a href="#" id="btn-file" class="btn btn-info float-right">Agregar Mas</a>
                            <br><br><br>    
                        <div id="images"></div><hr>
        </form>
                        <style type="text/css">
                          .centrado{
                            position: absolute;
                            top: 110%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                          }
                        </style>
                        <div class="row">
                        @foreach($imgfiles as $imgfile)
                            @if($imgfile->fileprincipal == 'si')
                            <input type="hidden" id="principal" value="{{ $imgfile->fileprincipal }}" >
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-cascade">
                                    <div class="view view-cascade overlay" style="padding:5px; margin:5px;">
                                      <a><img class="img-fluid z-depth-1" style="height: 8em;" src="{{ asset($imgfile->file) }}"></a>
                                      <center>
                                          <span>Imagen Principal</span> 
                                      </center>

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-cascade">
                                    <div class="view view-cascade overlay" style="padding:5px; margin:5px;">
                                      <a><img class="img-fluid z-depth-1" style="height: 8em;" src="{{ asset($imgfile->file) }}"></a>
                                      <center>
                                          <a style="padding-bottom: 90px;" href="#" onclick="photo_delete({{ $imgfile->id }})">Eliminar</a>
                                      </center>

                                    </div>
                                </div>
                            </div>
                            @endif
                            <br>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" form="CreateForm" class="btn btn-success">{{ __('Guardar Cambios') }}</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    
    <script>

        var p = 0;
        var principal =  $('#principal').val();
        $("#btn-file").click(function(e) {
            e.preventDefault();
           if (principal == 'si') {
              $("#images").append(" <div class='row'><label class='col-sm-2 col-form-label'>{{ __('Imágenes') }}</label><div class='col-sm-6 '><input type='file' name='file["+p+"]'></div></div>");
           }else{
              $("#images").append(" <div class='row'><label class='col-sm-2 col-form-label'>{{ __('Imágenes') }}</label><div class='col-sm-2 form-group'><input  type='radio' value='"+p+"' name='fileprincipal'>Principal</div><div class='col-sm-6 '><input type='file' name='file["+p+"]'></div></div>");
           }

            p++;
        });
    
        // function eliminar_btn(i){
        //    $('#images['+i+']').remove();
        // }

    </script>

    <script>
    function photo_delete(i)
    {



      var id = i;
      var ruta = url +'delete-imgfile/'+id;
      var ruta2 = url + 'listado-imagenes/' + {{ $imagenes->id }} + '/edit';

       // console.log(id);

      $.ajax({
        url: ruta,
              data: id,
              type: 'GET',
              //dataType: 'JSON',
              success: function (response) {
                console.log(response);
                if (response==1) {
                  window.location.href= ruta2;
                }
              }
      });
    }
  </script>
@endsection