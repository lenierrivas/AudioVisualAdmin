@extends('layouts.app', ['activePage' => 'imagenes', 'titlePage' => __('Listado Imágenes')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">Listado de  Imágenes</h4>
                    <p class="card-category"> Catalogación de Imágenes</p>
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
                        <a href="{{ route('listado-imagenes.create') }}" class="btn btn-sm btn-success">{{ __('Agregar Imagenes') }}</a>
                        </div>
                      </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-left">
                            <th>
                                #
                            </th>
                            <th>
                                Video/Relación
                            </th>
                            <th>
                                Imagen
                            </th>
                            <th>
                                Etiquetas
                            </th>
                           @if (auth::User()->id_perfil == 1)
                                <th class="td-actions text-left">
                                    Acciones
                                </th>   
                           @endif
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($imagenes as $imagen)
                            <tr>
                                    <td>
                                        @php
                                            echo $i;
                                        @endphp
                                    </td>
                                   
                                    <td class="text-left" >
                                        {{ $imagen->maintitle }}
                                    </td>
                                    <td class="text-left" >
                                          @if($imagen->fileprincipal == 'si')
                                            <img src="{{ asset($imagen->file) }}" class="rounded-circle" width="50px">
                                          @else
                                            <span>NUll</span>
                                          @endif
                                    </td>

                                    <td class="text-left" >
                                        {{ $imagen->label }}
                                    </td>

                                    @if (auth::User()->id_perfil == 1)
                                        <td class="td-actions text-left">
                                            <form action="{{ route('listado-imagenes.destroy', $imagen->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('listado-imagenes.show', $imagen->id) }}" data-original-title="" title="">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('listado-imagenes.edit', $imagen->id) }}" data-original-title="" title="">
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
                                    $i ++;
                                @endphp  
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $imagenes->links() }}
                    </div>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection