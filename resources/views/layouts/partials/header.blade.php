<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="container-fluid">
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
      <a href="/" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616" />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0" />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
        <i class="ti ti-x ti-sm align-middle"></i>
      </a>
    </div>

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Language 
        <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class="ti ti-language rounded-circle ti-md"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                <span class="align-middle">English</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                <span class="align-middle">French</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                <span class="align-middle">German</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                <span class="align-middle">Portuguese</span>
              </a>
            </li>
          </ul>
        </li>
         Language -->

        <!-- Search
        <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
          <a class="nav-link search-toggler" href="javascript:void(0);">
            <i class="ti ti-search ti-md"></i>
          </a>
        </li>
         /Search -->

        <!-- Style Switcher -->
        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class="ti ti-md"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle"><i class="ti ti-sun me-2"></i>Claro</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle"><i class="ti ti-moon me-2"></i>Oscuro</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>Automático</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- / Style Switcher-->

        <!-- Quick links  -->
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
          <a
            class="nav-link dropdown-toggle hide-arrow"
            href="javascript:void(0);"
            data-bs-toggle="dropdown"
            data-bs-auto-close="outside"
            aria-expanded="false">
            <i class="ti ti-layout-grid-add ti-md"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end py-0">
            <div class="dropdown-menu-header border-bottom">
              <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Atajos de acceso</h5>
                <a
                  href="javascript:void(0)"
                  class="dropdown-shortcuts-add text-body"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Add shortcuts"
                  ><i class="ti ti-sm ti-apps"></i
                ></a>
              </div>
            </div>
            <div class="dropdown-shortcuts-list scrollable-container">
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class=" iconify fs-4" data-icon="mdi:person"></i>
                  </span>
                  @can('user_access')
                   <a href="{{ url('admin/user') }}" class="stretched-link">Usuarios</a>
                  <small class="text-muted mb-0">Listado general</small>
                  @endcan
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class=" iconify fs-4" data-icon="mdi:building"></i>
                  </span>
                  @can('empresa_access')
                   <a href="{{ url('admin/empresa') }}" class="stretched-link">Empresas</a>
                  <small class="text-muted mb-0">Listado general</small>
                  @endcan
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class=" iconify fs-4" data-icon="mdi:shield"></i>
                  </span>

                  @can('role_access')
                   <a href="{{ url('admin/role') }}" class="stretched-link">Roles</a>
                  <small class="text-muted mb-0">Listado general</small>
                  @endcan
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class=" iconify fs-4" data-icon="mdi:lock"></i>
                  </span>
                  @can('permission_access')
                   <a href="{{ url('admin/permission') }}" class="stretched-link">Permisos</a>
                  <small class="text-muted mb-0">Listado general</small>
                  @endcan
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                    <i class=" iconify fs-4" data-icon="mdi:people"></i>
                  </span>
                  @can('profile_edit')
                   <a href="{{ url('admin/profile/user') }}" class="stretched-link">Perfil</a>
                  <small class="text-muted mb-0">Datos personales</small>
                  @endcan
                </div>
                
              </div>
            </div>
          </div>
        </li>
        <!-- Quick links -->
       @php
         $notificacion = \DB::table('notificaciones')
         ->join('notificacion_usuarios', 'notificaciones.id', '=', 'notificacion_usuarios.notificacion_id')
         ->where('notificacion_usuarios.leido','<>',1)
         ->take(8)
         ->orderBy('notificaciones.id','DESC')
         ->get();
       @endphp
        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
         <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
           <i class="ti ti-bell ti-md"></i>
           <span class="badge bg-danger rounded-pill badge-notifications">{{ count($notificacion) }}</span>
         </a>
         <ul class="dropdown-menu dropdown-menu-end py-0">
           <li class="dropdown-menu-header border-bottom">
             <div class="dropdown-header d-flex align-items-center py-3">
               <h5 class="text-body mb-0 me-auto">Notificación</h5>
               <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
             </div>
           </li>
           <li class="dropdown-notifications-list scrollable-container">
             <ul class="list-group list-group-flush">
                 @forelse($notificacion as $element)
                 @php
                    $userNot = \App\Models\NotificacionUsuarios::where('notificacion_id',$element->id)->first();
                 @endphp
                 @if ($userNot->leido)
                 <a class="dropdown-item text-center" href="#">
                     <i class="mdi mdi-bell mr-2 text-danger"></i>Sin notificaciones pendientes
                 </a>
                 @else
               <li class="list-group-item list-group-item-action dropdown-notifications-item">
                 <div class="d-flex">
                   <div class="flex-shrink-0 me-3">
                     <div class="avatar">
                       <span class="avatar-initial rounded-circle bg-label-danger">{{ $element->id }}</span>
                     </div>
                   </div>
                   <div class="flex-grow-1">
                     <a href="/{{ $element->link }}">
                         <h6 class="mb-1">{{ $element->titulo }} 🎉</h6>
                         <p class="mb-0">{{ $element->texto }}</p>
                         <small class="text-muted">{{  \Carbon\Carbon::parse($element->created_at)->diffForHumans() }}</small>
                     </a>
                   </div>

             </li>
             @endif
             @endforeach
             </ul>
           </li>
         </ul>
     </li>
        <!--/ Notification -->

        <!-- User -->
        @php
          $re = '/\b(\w)[^\s]*\s*/m';
          $str =\Auth::user()->name;
          $subst = '$1';
          $result = preg_replace($re, $subst, $str);
        @endphp
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online me-3">
                    <span class="avatar-initial rounded-circle bg-label-info">
                        {{ $result }}
                    </span>
                </div>
            </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ url('admin/profile/user') }}">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online me-3">
                              <span class="avatar-initial rounded-circle bg-label-info">
                                  {{ $result }}
                              </span>
                          </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ \Auth::user()->name }}</span>
                        <small class="text-muted">{{ \Auth::user()->role->name }}</small>
                      </div>
                    </div>
                  </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="{{ url('admin/profile/user') }}">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">Mi perfil</span>
              </a>
            </li>
           
            <li>
              <div class="dropdown-divider"></div>
            </li>         
            <li>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ti ti-logout me-2 ti-sm bx bx-power-off font-size-16 align-middle text-danger"></i>
                  Salir del sistema
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper container-fluid d-none">
      <input
        type="text"
        class="form-control search-input border-0"
        placeholder="Search..."
        aria-label="Search..." />
      <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
  </div>
</nav>