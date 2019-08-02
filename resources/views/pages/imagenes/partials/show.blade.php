@extends('layouts.app', ['activePage' => 'imagenes', 'titlePage' => __('Mostrar Imágenes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Mostrar Imágenes') }}</h4>
                <p class="card-category">Información de las Imágenes</p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('listado-imagenes.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <div class="row">
                      <!-- Grid column -->
                      <div class="col-lg-4 col-md-6 mb-4">

                        <!--Modal: Name-->
                        <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">

                            <!--Content-->
                            <div class="modal-content">

                              <!--Body-->
                              <div class="modal-body mb-0 p-0">

                                <div class="embed-responsive  z-depth-1-half">
                                      <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                        @foreach($imgfiles as $imgfile)
                                          <li data-target="#carousel-example-2" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                        @endforeach
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                        @foreach($imgfiles as $imgfile)
                                          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <div class="view" style="margin: 0.5em;">
                                              <img class="d-block w-100" data-toggle="modal" height="500em;" src="{{ asset($imgfile->file) }}" alt="First slide">
                                              <div class="mask rgba-black-light"></div>
                                            </div>
                                          </div>
                                        @endforeach
                                        </div>

                                        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                </div>

                              </div>
                               <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-outline-primary btn-rounded btn-md" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                  @foreach($imgfiles as $imgfile)
                      <div class="col-lg-4 col-md-6">
                        <!--Card Regular-->
                        <div class="card card-cascade" data-toggle="modal" data-target="#modal4">
                          <!--Card image-->
                          <div class="view view-cascade overlay" style="padding:5px; margin:5px;">
                            <a><img class="img-fluid z-depth-1" style="height: 11em;" src="{{ asset($imgfile->file) }}"></a>

                            @if($imgfile->fileprincipal == 'si')
                              <center>
                                  <span>Imagen Principal</span> 
                              </center>
                            @else
                              <center>
                                  <span>&nbsp;</span> 
                              </center>
                            @endif

                          </div>
                        </div>
                      </div>
                  @endforeach
                    </div>      
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection