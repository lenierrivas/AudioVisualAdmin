@extends('layouts.app', ['activePage' => 'canales-audio', 'titlePage' => __('Listado de Canales de Audio')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title ">Listado de Canales de Audio</h4>
            </div>
            <div class="card-body">

                @if (session('status'))
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status') }}</span>
                        </div>
                      </div>
                    </div>
                @endif
  
                  <div class="row">
                    <div class="col-12 text-right">
                    <a href="{{ route('audiochannel.create') }}" class="btn btn-sm btn-success">{{ __('Agregar Canal de Audio') }}</a>
                    </div>
                  </div>

                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-left">
                        <th>
                            #
                        </th>
                       
                        <th>
                            Tipo
                        </th>

                        @if( auth::User()->id_perfil == 1)
                            <th>
                                Acciones
                            </th>
                        @endif

                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($audiochannels as $audiochannel)
                            <tr>
                                <td>
                                    {{ $i }}
                                </td>

                                <td>
                                    {{ $audiochannel->audiochannels }}
                                </td>
                                @if (auth::User()->id_perfil == 1)
                                    <td class="td-actions text-left">
                                    <form action="{{ route('audiochannel.destroy', $audiochannel->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('audiochannel.edit', $audiochannel->id) }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-link" data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </form>                                            
                                    </td>
                                @endif
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                   
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection