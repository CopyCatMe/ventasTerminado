<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">{{ $title }}</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
          <form action="simple-results.html">
            <div class="input-group">
                <div class="input-group-append">
                </div>
            </div>
        </form>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="{{asset('dist/img/avatar5.png')}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">
            @if(auth()->check())
              {{ auth()->user()->name }}
            @else
              Usuario no autenticado
            @endif
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <!-- User image -->
          <li class="user-header bg-lightblue">
            <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
  
            <p>
              @if(auth()->check())
                {{ auth()->user()->name }}
                <small>{{ auth()->user()->admin ? 'Administrador' : 'Vendedor' }}</small>
              @else
                Usuario no autenticado
              @endif
  
          <!-- Menu Footer-->
          <li class="user-footer">
            <a class="btn btn-default btn-flat" href="{{ auth()->check() ? '/home' : '/login' }}">
              {{ auth()->check() ? 'Perfil' : 'Login' }}
            </a>
            @if (auth()->check())
              <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
               Salir
             </a>
            @endif
  
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>