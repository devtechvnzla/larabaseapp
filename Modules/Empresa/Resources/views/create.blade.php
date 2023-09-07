@extends('layouts/admin')

@section('title', 'ENTE')
@section('styles')
  <!-- vendor css files -->
 @section('styles')
  <!-- vendor css files -->
   <link rel="stylesheet" href="{{ asset('/assets/libs/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/config-page.css') }}">

@endsection

@endsection
@section('content')
<div class="row mt-2 animate__animated_fadeIn animate__fadeIn animate__delay-1s container-fluid">
    <div class="col-sm-12">
        <div class="card">

             {!!Form::open(['method'=>'POST','route'=>['empresa.store'], 'files'=>'true'])!!}
            <div class="card-body ">
               <div class="row">
                      <div class="col-sm-4 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Razón social</label>
                                <input type="text" class="form-control @error('razon_social') is-invalid @enderror" id="register-razon_social" name="razon_social" placeholder="Nombre del ente" aria-describedby="register-razon_social" tabindex="2" value="{{ old('razon_social') }}" />
                                @error('razon_social')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                           <div class="col-sm-4 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">RIF del ente</label>
                                <input type="text" class="form-control @error('documento') is-invalid @enderror" id="register-documento" name="documento" placeholder="Documento del ente" aria-describedby="register-documento" tabindex="2" value="{{ old('documento') }}" />
                                @error('documento')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                         <div class="col-sm-4 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Teléfono de contacto del ente</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="register-telefono" name="telefono" placeholder="Contacto del ente" aria-describedby="register-telefono" tabindex="2" value="{{ old('telefono') }}" />
                                @error('telefono')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                         <div class="col-sm-4 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Correo del ente</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email" name="email" placeholder="Correo del ente" aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" />
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                           <div class="col-sm-4 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Dirección del ente</label>
                                <textarea type="text" class="form-control @error('direccion') is-invalid @enderror" id="register-direccion" name="direccion" placeholder="Contacto del ente" aria-describedby="register-direccion" tabindex="2" value="{{ old('direccion') }}" cols="30" rows="1">
                                </textarea>
                                @error('direccion')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                          @php
                        $estados  =  [1 => 'Activo' ,0 => 'Inactivo'];
                    @endphp
                    <div class="col-sm-4 mt-1">
                        <label for="telefono">Estado del ente</label>
                      {!! Form::select('is_active', $estados, null, [
                         'class' => 'form-control','placeholder' =>'Seleccione']) !!}
                      </div>
                       <div class="col-sm-12 mt-2">
                           <div class="form-group">
                            <label for="product_unit">Logo del ente <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Ingresa la Logo del ente."></i> <span class="text-danger">*</span></label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="input-file-now-custom-1" name="logo_empresa" class="file-upload" data-default-file="{{asset('images/fallback_product_image.png')}}" />
                            </div>
                         </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary">Guardar</button>
               </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
     $('.file-upload').file_upload();
</script>
@endsection
