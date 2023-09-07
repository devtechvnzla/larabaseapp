@section('title', __('Empresas'))
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
                <h4 class="card-title">
                    Historial de logueo
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
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center">
								<td>#</td>
								<th>Usuario</th>
								<th>Agente</th>
								<th>Mes</th>
								<th>Dirección IP</th>
								<th>Login</th>
								<th>Logout</th>
							</tr>
						</thead>
						<tbody>
							@foreach($logins as $row)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->user->name }}</td>
								<td>
									@if(strlen($row->user_agent) > 12)
										{{ substr($row->user_agent, 0, 12) . "..."}}
									@else
										{{ $row->user_agent }}
									@endif
					            </td>
								<td>
									@if(strlen($row->mes) > 12)
										{{ substr($row->mes, 0, 12) . "..."}}
									@else
										{{ $row->mes }}
									@endif
								</td>
								<td>{{ $row->ip_address }}</td>
								<td>{{ $row->login_at }}</td>
								<td>{{ $row->logout_at }}</td>


							@endforeach
						</tbody>
					</table>
					 </div>
				</div>
                 <div class="card-footer clearfix">
                        {{ $logins->links() }}
                      <p class="text-muted">Mostrando <strong>{{ $logins->count() }}</strong> registros de <strong>{{$logins->total() }}</strong> totales</p>
                </div>
			</div>
		</div>
	</div>
</div>
