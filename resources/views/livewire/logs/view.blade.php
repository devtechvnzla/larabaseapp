@section('title', __('Empresas'))
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
                <h4 class="card-title">
                    Trazas de los usuarios en general
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
						@include('livewire.logs.create')
						@include('livewire.logs.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center">
								<td>#</td>
								<th>User</th>
								<th>Descripcion</th>
								<th>Fecha Registro</th>

							</tr>
						</thead>
						<tbody>
							@foreach($logs as $row)
							<tr class="text-center small">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->user->name }}</td>
								<td>
                                    @if(strlen($row->descripcion) > 60)
										{{ substr($row->descripcion, 0, 60) . "..."}}
									@else
										{{ $row->descripcion }}
									@endif
                                </td>
								<td>{{ $row->fecha_registro }}</td>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
                <div class="card-footer clearfix">
                    {{ $logs->links() }}
                  <p class="text-muted">Mostrando <strong>{{ $logs->count() }}</strong> registros de <strong>{{$logs->total() }}</strong> totales</p>
            </div>
			</div>
		</div>
	</div>
</div>
