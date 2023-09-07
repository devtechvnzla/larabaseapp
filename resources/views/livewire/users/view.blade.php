@section('title', __('Users'))
<div>
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Usuarios</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ \App\Models\User::count() }}</h3>
                                <small class="text-success">(100%)</small>
                            </div>
                            <small>Total Registrados</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="fa fa-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Usuarios inactivos</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ \App\Models\User::where('status',0)->count() }}</h3>
                                <small class="text-danger">(+95%)</small>
                            </div>
                            <small>Total en espera </small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="fas fa-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Usuarios activos</span>
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ \App\Models\User::where('status',1)->count() }}</h3>
                                <small class="text-success">(+95%)</small>
                            </div>
                            <small>Total de activos</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="fas fa-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                    Listado de usuarios
                </h4>
                   <div class="card-controls">
                     <div class="row">
                         <div class="my-1 col-sm-2">

                        <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                            @foreach($paginationOptions as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="my-1 col-sm-7">
                       @can('user_create')
                        <div class="btn  btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                           <i class="fa fa-plus"></i>  Nuevo usuario
                         </div>
                       @endcan
                    @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <x-excel-export/>
                    @endif


                </div>
                <div class="my-1 col-sm-3">
                     <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Búsqueda de datos" />
                </div>
                   </div>
                  </div>
              </div>

                <div class="card-body">
						@include('livewire.users.create')
						@include('livewire.users.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center">
								<td>#
                                     @include('components.table.sort', ['field' => 'id'])
                                </td>
								<th>Iniciales
                                    @include('components.table.sort', ['field' => 'dpi'])
                                </th>
								<th>Nombre completo
                                    @include('components.table.sort', ['field' => 'name'])
                                </th>
								<th>Usuario
                                    @include('components.table.sort', ['field' => 'username'])
                                </th>
								<th>Correo electrónico
                                    @include('components.table.sort', ['field' => 'email'])
                                </th>
								<th>Estado
                                    @include('components.table.sort', ['field' => 'status'])
                                </th>
								<th>Empresa
                                    @include('components.table.sort', ['field' => 'empresa_id'])
                                </th>
								<th>Role
                                    @include('components.table.sort', ['field' => 'role_id'])
                                </th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $row)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->dpi }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->username }}</td>
								<td>{{ $row->email }}</td>
								<td>
                                    @if ($row->status == 1)
                                          <span class="badge bg-label-success">
                                              ACTIVO
                                          </span>
                                    @else
                                        <span class="badge bg-label-danger">
                                              INACTIVO
                                          </span>
                                    @endif
                                </td>
								<td>{{ $row->empresa->razon_social }}</td>
								<td>{{ $row->role->name}}</td>
								<td width="150">
								<div class="btn-group">


									@can('user_edit')
                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-primary text-white" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i>  </a>
                                    @endcan
                                    @if(auth()->user()->can('user_delete') && Auth::user()->id != $row->id)
                                    <a class="btn btn-danger text-white" wire:click.prevent="deleteConfirmation({{$row->id}})"><i class="fa fa-trash"></i>  </a>
                                    @endif

								</div>
								</td>
							@endforeach
						</tbody>
					</table>

					</div>
				</div>
                <div class="card-footer clearfix">
                      {{ $users->links() }}
                      <p class="text-muted">Mostrando <strong>{{ $users->count() }}</strong> registros de <strong>{{$users->total() }}</strong> totales</p>
                  </div>
			</div>
		</div>
	</div>
</div>
@push('scripts')
<script>
    window.addEventListener('show-delete-confirmation', event =>{
        Swal.fire({
          title: '¿Estás seguro(a)?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            Livewire.emit('deleteConfirmed');
          }
    })
    });

</script>
@endpush

