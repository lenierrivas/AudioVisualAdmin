@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Editar Video')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

        <form method="POST" action="{{ route('listado-videos.update', $video->id) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card ">

              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Editar Video') }}</h4>
                <p class="card-category">Informacion del Video</p>
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
                                <input class="form-control" name="maintitle" id="input-name" type="text" placeholder="{{ __('Titulo Principal') }}" required="true" value="{{ $video->maintitle }}" aria-required="true" autofocus>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Titulo Complement') }}</label>
                          <div class="col-sm-7">
                            <div class="form-group">
                              <input class="form-control" name="secondtitle" id="input-name" type="text" placeholder="{{ __('Titulo Complementario') }}" required="true" value="{{ $video->secondtitle }}"  aria-required="true"/>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Etiquetas') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="label" id="input-name" type="text" placeholder="{{ __('Etiqueta') }}" required="true" value="{{ $video->label }}" aria-required="true">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group">
                                <input class="form-control" name="location" id="input-name" type="text" placeholder="{{ __('Localidad') }}" required="true" value="{{ $video->location }}" aria-required="true">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Extensión') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="extension" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    @foreach($extensiones as $extension)
                                      @if($video->extension == $extension->id)
                                        <option selected value="{{ $extension->id }}">{{ $extension->extensiones }}</option>
                                      @else
                                        <option value="{{ $extension->id }}">{{$extension->extensiones}}</option>
                                      @endif
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-2 col-form-label">{{ __('Tipo') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="type" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    @foreach($types as $type)
                                      @if($video->type == $type->id)
                                        <option selected value="{{ $type->id }}">{{ $type->types }}</option>
                                      @else
                                        <option value="{{ $type->id }}">{{$type->types}}</option>
                                      @endif
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
                                    @foreach($audiochannels as $audiochannel)
                                      @if($video->audiochannels == $audiochannel->id)
                                        <option selected value="{{ $audiochannel->id }}">{{ $audiochannel->audiochannels }}</option>
                                      @else
                                        <option value="{{ $audiochannel->id }}">{{$audiochannel->audiochannels}}</option>
                                      @endif
                                    @endforeach
                                </select>
                              </div>
                            </div> 
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-2 col-form-label">{{ __('Versión') }}</label>
                            <div class="col-sm-2">
                              <div class="form-group">
                                <select class="form-control" name="Versiones" id="input-name" type="text" required="true" aria-required="true" autofocus>
                                    @foreach($versiones as $version)
                                      @if($video->Versiones == $version->id)
                                        <option selected value="{{ $version->id }}">{{ $version->Versiones }}</option>
                                      @else
                                        <option value="{{ $version->id }}">{{$version->Versiones}}</option>
                                      @endif
                                    @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Descripcion') }}</label>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="50" rows="6">{{ $video->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Actualizar Video') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection