@extends('layouts.admin')
@section('title','PERFIL')
@section('breadcrumb')
 <ol class="breadcrumb m-0">
    <li class="breadcrumb-item"><a href="javascript: void(0);">PERFIL</a></li>
    <li class="breadcrumb-item active">Edición de datos</li>
</ol>
@endsection
@push('styles')
   <link rel="stylesheet" href="/assets/vendor/css/pages/page-profile.css" />
@endpush
@section('content')
  <!-- Header -->
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item">
          <a class="nav-link active" href="#"
            ><i class="ti-xs ti ti-users me-1"></i> Tu cuenta</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/profile/password"
            ><i class="ti-xs ti ti-lock me-1"></i> Cambiar de contraseña</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages-account-settings-billing.html"
            ><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages-account-settings-notifications.html"
            ><i class="ti-xs ti ti-bell me-1"></i> Notifications</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages-account-settings-connections.html"
            ><i class="ti-xs ti ti-link me-1"></i> Connections</a
          >
        </li>
      </ul>
  </div>
</div>
  <div class="row">
    <div class="col-12">
       @php
                    $img_src = 'https://ui-avatars.com/api/?name='.Auth::user()->name;
       @endphp
      <div class="card mb-4">
        <div class="user-profile-header-banner">
          <img src="/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
        </div>
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
          <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
            <img
              src="{{ $img_src }}"
              alt="user image"
              class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img bg-label-info" />
          </div>
          <div class="flex-grow-1 mt-3 mt-sm-5">
            <div
              class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
              <div class="user-profile-info">
                <h4>{{ \Auth::user()->name }}</h4>
                @php
                $user = \App\Models\User::find(\Auth::user()->id)
                @endphp
                <ul
                  class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                 
                  <li class="list-inline-item d-flex gap-1"><i class="ti ti-map-pin"></i> Caracas / Venezuela</li>
                  <li class="list-inline-item d-flex gap-1">
                    <i class="ti ti-calendar"></i> Creado {{ $user->created_at->format('d M Y') }}
                  </li>
                </ul>
              </div>
              <a href="javascript:void(0)" class="badge bg-label-success">
                <i class="ti ti-check me-1"></i>Usuario conectado
              </a>
            </div>
          </div>
        </div>
      </div>
      @livewire('user-profile')
      
    </div>
  </div>
  <!--/ Header -->

@endsection
