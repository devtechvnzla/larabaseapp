<!DOCTYPE html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="/assets/" data-template="vertical-menu-template-semi-dark">
<!-- Mirrored from www.bootstrapdash.com/demo/caroline/template/demo_1/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Feb 2023 14:37:23 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>LARADMIN | @yield('title','')</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/bandes_mini.png') }}" />

    <!-- Fonts -->
      <!-- Fonts -->
    <link rel="preconnect" href="{{ asset('css/googlefonts/css/css.css') }}">

     @include('panel.css.styles')

</head>

<body >
  <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          @yield('content')
        </div>
      </div>
    </div>

    <!-- / Content -->

  @include('panel.js.scripts')
  <script type="text/javascript" src="{{asset('assets/js/clock.js')}} "></script>
<script>
  $('#login-username').on('keydown keypress',function(e){
  if(e.key.length === 1){ // Evaluar si es un solo caracter
      if($(this).val().length < 8 && !isNaN(parseFloat(e.key))){ /* Comprobar que
                                                                  * son menos de 12
                                                                  * catacteres y que
                                                                  * es un número */
          $(this).val($(this).val() + e.key); // Muestra el valor en el input
          /*
          * Aquí haces lo que quieras.
          */
      }
      return false;
    }
  });
</script>
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/caroline/template/demo_1/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Feb 2023 14:37:23 GMT -->
</html>
