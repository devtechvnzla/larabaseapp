
   <div class="card">
       <div class="card-header">
           <h5>Cambiar contraseña</h5>
       </div>
          <form wire:submit.prevent="updatePassword">
       <div class="card-body">
          <div class="row">
              
              <div class="col-sm-6 mt-2">
                  <label class="mb-2">Nueva Contraseña</label>
                  <input type="password" class="form-control" placeholder="*******" wire:model="new_password" id="">
                   @error('new_password')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
              <div class="col-sm-6 mt-2">
                  <label class="mb-2">Confirmación de contraseña</label>
                  <input type="password" class="form-control" placeholder="*******" wire:model="password_confirmation" id="">
                   @error('password_confirmation')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
             
          </div>
       </div>
       <div class="card-footer clearfix">
            <button class="btn btn-primary mr-3">
                    {{ __('Guardar') }}
            </button>
            <div x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="text-sm" style="display: none;">
                {{ __('Guardar cambio') }}
            </div>

       </div>
       </form>
   </div>
