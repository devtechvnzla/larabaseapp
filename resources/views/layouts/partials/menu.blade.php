<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
  <div class="container-fluid d-flex h-100">
    <ul class="menu-inner">
      <!-- Dashboards -->
      <li class="menu-item 
       {{ request()->routeIs('empresa.*') ? 'active' : '' }}
        {{ request()->routeIs('agencia.*') ? 'active' : '' }}
        {{ request()->routeIs('role.*') ? 'active' : '' }}
        {{ request()->routeIs('permission.*') ? 'active' : '' }}
        {{ request()->routeIs('logins.*') ? 'active' : '' }}
        {{ request()->routeIs('user.*') ? 'active' : '' }}
        {{ request()->routeIs('traza.*') ? 'active' : '' }}">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons iconify" data-icon="mdi:shield"></i>
          <div data-i18n="Seguridad">Seguridad</div>
        </a>
        <ul class="menu-sub">
           @can('empresa_access')
            <li class="menu-item
              {{ request()->routeIs('empresa.*') ? 'active' : '' }}">
              <a href="{{ url('admin/empresa') }}" class="menu-link">
                <i class="menu-icon tf-icons iconify" data-icon="mdi:building"></i>
                <div data-i18n="Empresas">Empresas</div>
              </a>
            </li>
           @endcan
           @can('agencia_access')
            <li class="menu-item
              {{ request()->routeIs('agencia.*') ? 'active' : '' }}">
              <a href="{{ url('admin/agencia') }}" class="menu-link">
                <i class="menu-icon tf-icons iconify" data-icon="mdi:store"></i>
                <div data-i18n="Agencias">Agencias</div>
              </a>
            </li>
           @endcan
           @can('role_access')
            <li class="menu-item
              {{ request()->routeIs('role.*') ? 'active' : '' }}">
              <a href="{{ url('admin/role') }}" class="menu-link">
                <i class="menu-icon tf-icons iconify" data-icon="mdi:lock"></i>
                <div data-i18n="Roles">Roles</div>
              </a>
            </li>
           @endcan
          @can('permission_access')
            <li class="menu-item
              {{ request()->routeIs('permission.*') ? 'active' : '' }}">
              <a href="{{ url('admin/permission') }}" class="menu-link">
                <i class="menu-icon tf-icons iconify" data-icon="maki:police"></i>
                <div data-i18n="Permisos">Permisos</div>
              </a>
            </li>
           @endcan
           @can('view_logins')
          <li class="menu-item
          {{ request()->routeIs('logins.*') ? 'active' : '' }}">
            <a href="{{ url('admin/logins') }}" class="menu-link">
              <i class="menu-icon tf-icons iconify" data-icon="mdi:history"></i>
              <div data-i18n="Historial de logueo">Historial de logueo</div>
            </a>
          </li>
          @endcan
           @can('logs_access')
         <li class="menu-item
          {{ request()->routeIs('traza.*') ? 'active' : '' }}">
            <a href="{{ url('admin/traza') }}" class="menu-link">
              <i class="menu-icon tf-icons iconify" data-icon="mdi:file"></i>
              <div data-i18n="Trazas del sistema">Trazas del sistema</div>
            </a>
          </li>
          @endcan
         @can('user_access')
         <li class="menu-item  {{ request()->routeIs('user.*') ? 'active' : '' }}">
          <a href="{{ url('admin/user') }}" class="menu-link">
            <i class="menu-icon tf-icons iconify" data-icon="mdi:person"></i>
              <div data-i18n="Usuarios">Usuarios</div>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">BASE DE DATOS</span>
      </li>
        @can('backup_access')
        <li class="menu-item   {{ request()->routeIs('backup.*') ? 'active' : '' }}">
        <a href="{{ url('admin/backup') }}" class="menu-link">
            <i class="menu-icon tf-icons iconify" data-icon="mdi:database"></i>
            <div data-i18n="Respaldos">Respaldos</div>
            </a>
        </li>
        @endcan
       <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Configuración</span>
      </li>
      
      <!-- Misc -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-box-multiple"></i>
          <div data-i18n="Misc">Misc</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="https://pixinvent.ticksy.com/" target="_blank" class="menu-link">
              <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
              <div data-i18n="Support">Support</div>
            </a>
          </li>
          <li class="menu-item">
            <a
              href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
              target="_blank"
              class="menu-link">
              <i class="menu-icon tf-icons ti ti-file-description"></i>
              <div data-i18n="Documentation">Documentation</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  </aside>