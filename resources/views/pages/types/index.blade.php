@extends('layouts.app', ['activePage' => 'tipos', 'titlePage' => __('Listado Tipos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title ">Listado de  Tipos</h4>
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
                    <a href="{{ route('types.create') }}" class="btn btn-sm btn-success">{{ __('Agregar Tipo') }}</a>
                    </div>
                  </div>

                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-left">
                        <th>
                            #
                        </th>
                       
                        <th>
                            Tipos
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
                        @foreach ($types as $type)
                            <tr>
                                <td>
                                    {{ $i }}
                                </td>

                                <td>
                                    {{ $type->types }}
                                </td>
                                @if (auth::User()->id_perfil == 1)
                                    <td class="td-actions text-left">
                                    <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('types.edit', $type->id) }}" data-original-title="" title="">
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