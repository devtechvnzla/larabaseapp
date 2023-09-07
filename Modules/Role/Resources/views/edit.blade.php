@extends('layouts.admin')

@section('title', 'ROLES')

@push('styles')
 <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset('/assets/libs/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/config-page.css') }}">
@endpush
@section('content')
@include('sweetalert::alert')

      <div class="row  mt-2 animate__animated_fadeIn animate__fadeIn animate__delay-1s ">
    <div class="col-sm-12">
        <div class="card">

                 <form action="{{ route('role.update',$role->id) }}" method="POST">
                  @method('patch')
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3>Edición de role</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                              <div class="form-group">
                                <label for="name">Nombre del Role <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" value="{{ $role->name }}" required>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Estado del Role <span class="text-danger">*</span></label>
                                <select class="form-control" type="text" name="status" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" {{ ( $role->status == 1 ) ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ ( $role->status == 0 ) ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div></div>
                            </div>


                            <hr>

                            <div class="form-group">
                                <label for="permissions">
                                    Permisos <span class="text-danger">*</span>
                                </label>
                            </div>

                             <label class="form-check form-switch form-switch-md mb-2">
                            <input type="checkbox" class="form-check-input"  id="select-all" />
                            <span class="switch-toggle-slider">
                              <span class="switch-on">
                                <i class="ti ti-check"></i>
                              </span>
                              <span class="switch-off">
                                <i class="ti ti-x"></i>
                              </span>
                            </span>
                            <span class="switch-label">Seleccionar todos</span>
                          </label>
                          <div class="row">
                            @php
                                $GetSlug = App\Models\Permission::where('status',1)
                                ->select('slug')
                                ->groupBY('slug')
                                ->get();
                            @endphp

                            @foreach ($GetSlug as $permiso)
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                        {{ strtoupper($permiso->slug) }}
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($permisos->where('slug', $permiso->slug ) as $element)
                                                <div class="col-sm-6 p-1 ">
                                                    <div class="form-check form-switch form-switch-md">
                                                        <input type="checkbox"
                                                            class="form-check-input"
                                                            id="{{ $element->title }}"
                                                            name="permissions[]"
                                                            value="{{ $element->name}}"
                                                            {{ $role->hasPermissionTo($element->name) ? 'checked': '' }}
                                                            />
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-on">
                                                                <i class="ti ti-check"></i>
                                                            </span>
                                                            <span class="switch-off">
                                                                <i class="ti ti-x"></i>
                                                            </span>
                                                        </span>
                                                        <span class="switch-label">{{ $element->descripcion }}</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- END ROW PERMISSIONS -->
                        </div>
                        <div class="card-footer">
                              <button type="submit" class="btn btn-primary float-left">Guardar datos <i class="bi bi-check"></i>
                        </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>
@endpush
