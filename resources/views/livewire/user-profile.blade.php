<div class="card">
  <div class="card-header">
      <h4 class="card-title">
          Datos personales
      </h4>
  </div>
  <div class="card-body">
      <div class="row">
          <div class="col-sm-6">
              <label class="mt-2">Nombre completo</label>
              <input type="text" class="form-control mt-2" wire:model="name" id="">
          </div>
          <div class="col-sm-6">
              <label class="mt-2">Usuario</label>
              <input type="text" class="form-control mt-2" wire:model="username" id="">
          </div>
          <div class="col-sm-6">
              <label class="mt-2">Correo electrónico</label>
              <input type="text" class="form-control mt-2" wire:model="email" id="">
          </div>
          <div class="col-sm-6">
              <label class="mt-2">Agencia</label>
              <select type="text" class="form-control mt-2" wire:model="agencia_id" id="">
                <option value="">Seleccione</option>
                @foreach ($agencias as $element)
                  <option value="{{ $element->id }}">{{ $element->code .' | '.$element->name }}</option>
                @endforeach
              </select>  
          </div>
     </div>
  </div>
  <div class="card-footer clearfix">
      <button type="button" wire:click.prevent="update()" class="btn btn-primary close-modal me-1">Guardar</button>
  </div>
</div>


  <div class="card mt-5">
    <h5 class="card-header">Desactivar cuenta</h5>
    <div class="card-body">
      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-warning">
          <h5 class="alert-heading mb-1">¿Estás seguro(a) en deshabilitar tu cuenta?</h5>
          <p class="mb-0">Una vez deshabilitada, no podrás acceder mas a tu cuenta.</p>
        </div>
      </div>
      <form>
        <div class="form-check mb-4">
          <input
            class="form-check-input"
            type="checkbox"
            name="accountActivation"
            id="accountActivation" />
          <label class="form-check-label" for="accountActivation"
            >I confirm my account deactivation</label
          >
        </div>
        <button type="button" wire:click.prevent="activation()" class="btn btn-primary close-modal me-1">Guardar</button>
      </form>
    </div>
  </div>