@extends('layouts.app', ['activePage' => 'canales-audio', 'titlePage' => __('Creando Canal de Audio')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('audiochannel.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="card ">
                      <div class="card-header card-header-info">
                        <h4 class="card-title">{{ __('Agregar Canal de Audio') }}</h4>
                        <p class="card-category"></p>
                      </div>

                      <div class="card-body ">
                        <div class="row">
                          <div class="col-md-12 text-right">
                              <a href="{{ route('audiochannel.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Canal de Audio') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group">
                                        <input class="form-control" name="audiochannels" id="input-name" type="text" placeholder="{{ __('Canal de Audio') }}" required="true" aria-required="true" autofocus>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                      </div>
                      <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-success">{{ __('Registrar Canal de Audio') }}</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection