<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
               <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  wire:click.prevent="cancel()" aria-hidden="true"
                ></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Ingreso de usuario</h1>
                    <p> <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            No se admiten campos vacíos, todos campos son requeridos
                        </div>

                    </div></p>
                </div>
                <form autocomplete="off">
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                            <label for="name">Nombre completo</label>
                            <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-sm-6 mt-1">
                         <div class="form-group">
                            <label for="username">Usuario</label>
                            <input wire:model="username" type="text" class="form-control" id="username" placeholder="Username">@error('username') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-sm-12 mt-1">
                          <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                      <div class="col-sm-12 mt-1">
                           <div class="form-group">
                             <label for="password">Contraseña</label>
                              <input wire:model="password" type="password" class="form-control" id="password" placeholder="************">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                          </div>
                      </div>
                      <div class="col-sm-6 mt-1">
                          <div class="form-group">

                            @php
                                $roles = \App\Models\Role::get();
                            @endphp

                        <label for="password">Roles</label>
                        <select wire:model="role_id" type="text" class="form-control" id="role_id" placeholder="role_id">
                            <option value="">Seleccione</option>
                            @foreach ($roles as $element)
                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                            @endforeach
                        </select>
                            @error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                   </div>
                   @php
                       $empresas = \App\Models\Empresa::get()
                   @endphp
                    <div class="col-sm-6 mt-1">
                          <div class="form-group">
                            <label for="password">Empresa del usuario</label>
                             <select wire:model="empresa_id" type="text" class="form-control" id="empresa_id" placeholder="empresa_id">
                                <option value="">Seleccione</option>
                                @foreach ($empresas as $element)
                                   <option value="{{ $element->id }}">{{ $element->razon_social }}</option>
                                @endforeach

                          </select>
                      @error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                   </div>
                   <div class="col-sm-12 mt-1">
                          <div class="form-group">
                            <label for="password">Estado del usuario</label>
                             <select wire:model="status" type="text" class="form-control" placeholder="genero">
                                <option value="">Seleccione</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                          </select>
                      @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                   </div>
                 </div>
                 <div class="col-12 text-center mt-4 pt-50">
                       <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal me-1">Guardar</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
