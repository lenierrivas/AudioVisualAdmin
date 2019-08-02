@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Listado Videos')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">Listado de  Videos</h4>
                    <p class="card-category"> Catalogalizacion de videos</p>
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
                        <a href="{{ route('listado-videos.create') }}" class="btn btn-sm btn-success">{{ __('Agregar Video') }}</a>
                        </div>
                      </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-left">
                            <th>
                                #
                            </th>
                            <th>
                                Titulo Principal
                            </th>
                            <th>
                                Tipo
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th class="text-left">
                                Status
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
                            @foreach ($videos as $video)
                            <tr>
                                    <td>
                                        @php
                                            echo $i;
                                        @endphp
                                    </td>
                                   
                                    <td class="text-left" >
                                        {{ $video->maintitle }}
                                    </td>

                                    <td class="text-left" >

                                        @foreach($types as $type)
                                          @if($video->type == $type->id)
                                            {{ $type->types }} 
                                          @endif
                                        @endforeach

                                        {{ $video->type }} 
                                    </td>

                                    <td class="text-left">
                                        {{ $video->description }}
                                    </td>

                                    <td  class="text-left">
                                        @if ($video->status == 'VERIFICANDO')
                                            <span class="btn btn-warning">
                                                {{ $video->status }}
                                            </span>
                                        @else
                                            <span class="btn btn-info">
                                                {{ $video->status }}
                                            </span>
                                        @endif
                                    </td>

                                    @if (auth::User()->id_perfil == 1)
                                        <td class="td-actions text-left">
                                            <form action="{{ route('listado-videos.destroy', $video->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('listado-videos.show', $video->id) }}" data-original-title="" title="">
                                                    <i class="material-icons">search</i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                    
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('listado-videos.edit', $video->id) }}" data-original-title="" title="">
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
                        {{ $videos->links() }}
                    </div>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection