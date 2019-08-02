@extends('layouts.app', ['activePage' => 'extensiones', 'titlePage' => __('Creando Extensiones')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('extensiones.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="card ">
                      <div class="card-header card-header-info">
                        <h4 class="card-title">{{ __('Agregar Extensiones') }}</h4>
                        <p class="card-category"></p>
                      </div>

                      <div class="card-body ">
                        <div class="row">
                          <div class="col-md-12 text-right">
                              <a href="{{ route('extensiones.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Extensiones') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group">
                                        <input class="form-control" name="extensiones" id="input-name" type="text" placeholder="{{ __('Extensiones') }}" required="true" aria-required="true" autofocus>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                      </div>
                      <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-success">{{ __('Registrar Extensiones') }}</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection