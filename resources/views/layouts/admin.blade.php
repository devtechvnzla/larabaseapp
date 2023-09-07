<!DOCTYPE html>

<html
  lang="en"
  class="dark-style layout-menu-fixed layout-wide"
  dir="ltr"
  data-theme="theme-semi-dark"
  data-assets-path="/assets/" 
  data-template="horizontal-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Fluid - Layouts | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/logo_mini_negro.png') }}" />

      <!-- Fonts -->
      <link rel="preconnect" href="{{ asset('css/googlefonts/css/css.css') }}">

      @include('panel.css.styles')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
        <!-- Navbar -->
        @include('layouts.partials.header')
        <!-- / Navbar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Menu -->
            @include('layouts.partials.menu')
            <!-- / Menu -->

            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              @yield('content')
              <!--/ Layout Demo -->
            </div>
            <!--/ Content -->

            <!-- Footer -->
            @include('layouts.partials.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    @include('panel.js.scripts')

    <!-- Page JS -->
  </body>
</html>
