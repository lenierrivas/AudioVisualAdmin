<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      {{-- Todo lo que va a ver el Administrador --}}

    @if ( auth::User()->id_perfil == 1 )

        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
            <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
            <p>{{ __('Panel Administrativo') }}
                <b class="caret"></b>
            </p>
            </a>
            <div class="collapse" id="laravelExample">
            <ul class="nav">
                <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Perfil') }} </span>
                </a>
                </li>

                <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <span class="sidebar-mini"> U </span>
                    <span class="sidebar-normal"> {{ __('Usuarios') }} </span>
                </a>
                </li>

                <li class="nav-item{{ $activePage == 'tipos' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('types.index') }}">
                      <span class="sidebar-mini"> TP </span>
                      <span class="sidebar-normal"> {{ __('Tipos') }} </span>
                  </a>
                </li>

                <li class="nav-item{{ $activePage == 'versiones' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('versiones.index') }}">
                      <span class="sidebar-mini"> VS </span>
                      <span class="sidebar-normal"> {{ __('Versiones') }} </span>
                  </a>
                </li>

                <li class="nav-item{{ $activePage == 'canales-audio' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('audiochannel.index') }}">
                      <span class="sidebar-mini"> CA </span>
                      <span class="sidebar-normal"> {{ __('Canales de Audio') }} </span>
                  </a>
                </li>

                <li class="nav-item{{ $activePage == 'extensiones' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('extensiones.index') }}">
                      <span class="sidebar-mini"> EX </span>
                      <span class="sidebar-normal"> {{ __('Extensiones') }} </span>
                  </a>
                </li>
            </ul>
            </div>
        </li>

    @endif

    <li class="nav-item{{ $activePage == 'videos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('listado-videos.index') }}">
            <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
            <p>{{ __('Listado de Videos') }}</p>
        </a>
    </li>

    <li class="nav-item{{ $activePage == 'imagenes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('listado-imagenes.index') }}">
            <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
            <p>{{ __('Listado de Imagenes') }}</p>
        </a>
    </li>

      {{-- 
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    </ul>
    --}}
    
  </div>
</div>