@extends('layouts.app')
@section('title','LOGIN')
@push('styles')
<link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
 <link rel="stylesheet" href="/css/system.css">
 <link rel="stylesheet" href="/assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endpush
@section('content')
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center mb-4 mt-2">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
         <a href="{{ url('/') }}" class="app-brand-link me-5">
            <img src="{{ asset('images/logo/logo_mini_negro.png') }}" height="30" alt="">
           </a>
        
      </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-1 pt-2">¡Bienvenidos a nuestra app! 👋</h4>
    <p class="mb-4">Por favor ingresa tu cuenta para ingresar.</p>

    <form id="formAuthentication" autocomplete="off">
      <input type="hidden" id="_url" value="{{ url('login') }}">
      <input type="hidden" id="_redirect" value="{{ url('') }}">
      <input type="hidden" id="_token" value="{{ csrf_token() }}">
      <div class="mb-3">
        <label for="email" class="form-label">Correo o usuario</label>
        <input
          type="text"
          class="form-control"
          id="email"
          name="login"
          placeholder="Ingresa tu correo o usuario"
          autofocus />
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Contraseña</label>
          <a href="auth-forgot-password-basic.html">
            <small>Forgot Password?</small>
          </a>
        </div>
        <div class="input-group input-group-merge">
          <input
            type="password"
            id="password"
            class="form-control"
            name="password"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
      </div>
      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember-me" />
          <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary  w-100 ajax" >
            <i id="ajax-icon" class="fa fa-sign-in" style="margin-right:4px;"></i>  Ingresar
        </button>
      </div>
    </form>
    <p class="text-center mb-2"></p>

     <x-calendario />
  </div>
</div>
<!-- /Register -->
@endsection
@push('scripts')
<script>
  const validar = function(campo) {
  let valor = campo.value;

  // Verifica si el valor del campo (input) contiene numeros.
  if(/\d/.test(valor)) {

    /*
     * Remueve los numeros que contiene el valor y lo establece
     * en el valor del campo (input).
     */
    campo.value = valor.replace(/\d/g,'');
  }

};
</script>
<script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script>
    $(document).ready(function(){

  $('#formAuthentication').submit(function(){

        var data = $('#formAuthentication').serialize();
        $('#formAuthentication input, #formAuthentication button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-sign-in').addClass('fa fa-spin fa-refresh');

            $.ajax({
              url: $('#formAuthentication #_url').val(),
              headers: {'X-CSRF-TOKEN': $('#formAuthentication #_token').val()},
              type: 'POST',
              cache: false,
              data: data,
              success: function (response) {
                //alert(response)
                 if(response === 'authenticated.true'){

                   $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                  Swal.fire({
                     title: '¡Bien hecho!',
                    text:   'Usuario Logueado',
                    icon:   'success',
                    timer:  2000,
                    button: false
                  }).then(
                  function () {},
                    // handling the promise rejection
                  function (dismiss) {
                    if (dismiss === 'timer') {
                      console.log('I was closed by the timer')
                    }
                  }
                )
                   $(location).attr('href', $('#formAuthentication #_redirect').val());
                  }
                  else
                  {
                    Swal.fire({
                     title: '¡Lo siento!',
                    text:  'Usuario o contraseña incorrecta.',
                    icon:   'error',
                    timer:  2000,
                    button: false
                  }).then(
                  function () {},
                    // handling the promise rejection
                  function (dismiss) {
                    if (dismiss === 'timer') {
                      console.log('I was closed by the timer')
                    }
                  }
                 )
                 $('#formAuthentication input, #formAuthentication button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                  }
              },error: function (data) {
                //console.log(data)
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                 Swal.fire({
                     title: '¡Lo siento!',
                    text: value,
                    icon: 'error',
                    timer: 2000,
                    button: false
                  }).then(
                  function () {},
                    // handling the promise rejection
                  function (dismiss) {
                    if (dismiss === 'timer') {
                      console.log('I was closed by the timer')
                    }
                  }
                )

                  return false;
                });

                $('#formAuthentication input, #formAuthentication button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
            }
           });

       return false;

    });
});
  </script>
  <!-- Vendors JS -->
    <script src="/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
@endpush
