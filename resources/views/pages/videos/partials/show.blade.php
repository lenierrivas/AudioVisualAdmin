@extends('layouts.app', ['activePage' => 'videos', 'titlePage' => __('Mostrar Videos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Mostrar Videos') }}</h4>
                <p class="card-category">Información de los Videos</p>
              </div>

              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('listado-videos.index') }}" class="btn btn-sm btn-success">{{ __('Regresar al Lisado') }}</a>
                  </div>
                </div>
                
               <div class="row">
                  <div class="col-md-12"><br></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                      <div class="embed-responsive embed-responsive-16by9">
                        <video class="video-js vjs-default-skin vjs-big-play-centered" id='video' controls="controls" preload='metadata' loop width="600">
                          <source src="{{ asset('videos/') }}/{{ $video->file }}" draggable="false" style="-moz-user-select: none;" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
                        </video>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="col-lg-12">
                        <h2 class="h2-responsive product-name">
                          <strong>{{ $video->maintitle }}</strong>
                        </h2>
                        <h4 class="h4-responsive">
                          <span class="green-text">
                            <strong>{{ $video->secondtitle }}</strong>
                          </span>
                          <span class="grey-text">
                            <small>
                              <a href="#"><cite>{{ $video->label }}</cite></a>
                            </small>
                          </span>
                        </h4>
                         <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                             <div style="border-bottom: 1px #D7D9DA solid;">
                               <div class="card-header" role="tab" id="headingThree3">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                                   aria-expanded="false" aria-controls="collapseThree3">
                                   <h5 class="mb-0" style="color:#262727";>
                                     Información
                                   </h5>
                                 </a>
                               </div>
                               <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                                 data-parent="#accordionEx">
                                 <div class="card-body">
                                       <div>
                                            @foreach($extensiones as $extension)
                                                @if($video->extension == $extension->id)
                                                       <span class="grey-text">Extensión: {{ $extension->extensiones }}</span>
                                                @else
                                                @endif
                                             @endforeach
                                       </div>
                                       <div>
                                            @foreach($types as $type)
                                                @if($video->type == $type->id)
                                                       <span class="grey-text">Tipo: {{ $type->types }}</span>
                                                @else
                                                @endif
                                             @endforeach
                                       </div>
                                       <div>
                                             @foreach($audiochannels as $audiochannel)
                                                @if($video->audiochannels == $audiochannel->id)
                                                       <span class="grey-text">Canal de Audio: {{ $audiochannel->audiochannels }}</span>
                                                @else
                                                @endif
                                             @endforeach
                                       </div>
                                       <div>
                                             @foreach($versiones as $version)
                                                @if($video->Versiones == $version->id)
                                                       <span class="grey-text">Versión: {{ $version->Versiones }}</span>
                                                @else
                                                @endif
                                             @endforeach
                                       </div>
                                       <div>
                                            <span class="grey-text">Localidad: {{ $video->location }}</span>
                                       </div>
                                 </div>
                               </div>
                             </div>

                             <div style="border-bottom: 1px #D7D9DA solid;">
                               <div class="card-header" role="tab" id="headingTwo2">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                   aria-expanded="false" aria-controls="collapseTwo2">
                                   <h5 class="mb-0" style="color:#262727";>
                                     Descripción
                                   </h5>
                                 </a>
                               </div>
                               <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                 data-parent="#accordionEx">
                                 <div class="card-body">
                                   {{ $video->description }}
                                 </div>
                               </div>
                             </div>
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

@section('js')
    <script>
    var video = document.getElementById('video');
    var currentTime = 0.05;
    
    // pongo play y pause para que actualize por la imagen del video sin eso no lo hace
    video.play();
    video.pause();

    // agrego el listener de la funcion cuando se haga drag
    video.addEventListener('drag', Myfunction);
    
    // function que actualiza el tiempo en cual esta reproduciendo
    function Myfunction(event) {
      this.currentTime += currentTime;
    }
    
  </script>

  <script type="text/javascript">
       $(document).ready(function() {
$('.mdb-select').materialSelect();
});
  </script>
@endsection