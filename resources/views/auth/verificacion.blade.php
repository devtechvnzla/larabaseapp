@extends('layouts.app')
@section('title','VERIFICACION')
@push('styles')
 <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">
 <link rel="stylesheet" href="/assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endpush
@section('content')
<div>
    <div class="card">
        <div class="card-body">
            <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">

                    <img src="{{ asset('images/logo/logo_verde.png') }}" class=" w-px-200 ">
                </span>

            </a>
            </div>
            <h4 class="mb-2">¡Bienvenidos a nuestra app! 👋</h4>
            <p class="mb-4">Ingresa tu usuario para la verificación.</p>

            <form id="main-form" class="horizontal-form" autocomplete="off">
            <input type="hidden" id="_url" value="{{ url('/login/validar') }}">
            <input type="hidden" id="_redirect" value="{{ url('/login') }}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="email" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="email" name="username" placeholder="Ingresa tu usuario" autofocus>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary  w-100 ajax" >
                <i id="ajax-icon" class="fa fa-sign-in" style="margin-right:4px;"></i>  Validar
                </button>
            </div>
            </form>
            <p class="text-center">
            <span>¿Ya te has verificado?</span>
            <a href="{{ url('/login') }}">
                <span>Ingresa al sistema</span>
            </a>
            </p>
          </div>
        </div>
</div>
@endsection
@push('scripts')
<script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script>
    $(document).ready(function(){

  $('#main-form').submit(function(){

        var data = $('#main-form').serialize();
        $('#main-form input, #main-form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-sign-in').addClass('fa fa-spin fa-refresh');

            $.ajax({
              url: $('#main-form #_url').val(),
              headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
              type: 'POST',
              cache: false,
              data: data,
              success: function (response) {
                var json = $.parseJSON(response);
                 if(json.success){
                   $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                  Swal.fire({
                     title: '¡BIEN HECHO!',
                    text:   'SUS DATOS HAN SIDO VERIFICADOS',
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
                   $(location).attr('href', $('#main-form #_redirect').val());
                  }
                  else
                  {


                    $('#main-form input, #main-form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                    Swal.fire({
                        title: '¡LO SIENTO!',
                        text:   'NO ERES TRABAJADOR BANDES',
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
                return false;

                  }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                 Swal.fire({
                     title: '¡Lo siento!',
                    text: 'Ha ocurrido un error',
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

                $('#main-form input, #main-form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
            }
           });

       return false;

    });
});
  </script>
@endpush
