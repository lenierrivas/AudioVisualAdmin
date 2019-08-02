@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Cargar Video')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

        <form method="POST" action="{{ route('listado-videos.store') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">

              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Agregar Video') }}</h4>
                <p class="card-category"></p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('listado-videos.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-8">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Titulo Principal') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="maintitle" id="input-name" type="text" placeholder="{{ __('Titulo Principal') }}" required="true" aria-required="true" autofocus>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Titulo Complementario') }}</label>
                          <div class="col-sm-7">
                            <div class="form-group">
                              <input class="form-control" name="secondtitle" id="input-name" type="text" placeholder="{{ __('Titulo Complementario') }}" required="true" aria-required="true"/>
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
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="location" id="input-name" type="text" placeholder="{{ __('Localidad') }}" required="true" aria-required="true">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Extensión') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="extension" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    <option>Seleccione</option>
                                    @foreach($extensiones as $extension)
                                      <option value="{{$extension->id}}">{{$extension->extensiones}}</option>
                                    @endforeach
                                </select>

                              </div>
                            </div>
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-2 col-form-label">{{ __('Tipo') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="type" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    <option>Seleccione</option>
                                    @foreach($types as $type)
                                      <option value="{{$type->id}}">{{$type->types}}</option>
                                    @endforeach
                                </select>

                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Canales de Audio') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="audiochannels" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    <option>Seleccione</option>
                                    @foreach($audiochannels as $audiochannel)
                                      <option value="{{$audiochannel->id}}">{{$audiochannel->audiochannels}}</option>
                                    @endforeach
                                </select>

                              </div>
                            </div>
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-2 col-form-label">{{ __('Versión') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="Versiones" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    <option>Seleccione</option>
                                    @foreach($versiones as $version)
                                      <option value="{{$version->id}}">{{$version->Versiones}}</option>
                                    @endforeach
                                </select>

                              </div>
                            </div>
                        </div>
                                
                                

                        <br>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Video') }}</label>
                            <input type="file" multiple="true" name="file">
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Descripcion') }}</label>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="50" rows="6" ></textarea>
                            </div>
                        </div>
                         
          
                          
                    </div>
                    <div class="col-md-2"></div>
                </div>

              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Registrar Video') }}</button>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection