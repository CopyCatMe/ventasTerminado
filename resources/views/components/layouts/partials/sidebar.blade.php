<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link d-flex align-items-center">
        <i class="fas fa-shopping-cart brand-image img-circle elevation-0"
            style="opacity: .8; font-size: 20px; color: #fff; margin-right: 10px;"></i>
        <span class="brand-text font-weight-light">Sistema de Ventas</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if(auth()->check())
                <a>
                  {{ auth()->user()->name }}
                  <small>{{ auth()->user()->admin ? 'Administrador' : 'Vendedor' }}</small>
                </a>
              @else
                <a>Usuario no autenticado</a>
              @endif
                          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('inicio') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Categorias
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('products') }}" class="nav-link">
                      <i class="nav-icon fas fa-tshirt"></i>
                      <p>
                          Productos
                      </p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('clients') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Clientes
                    </p>
                </a>
            </li>

              <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Usuarios
                    </p>
                </a>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
