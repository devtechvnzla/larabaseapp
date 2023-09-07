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
                    <h1 class="mb-1">NUEVA EMPRESA</h1>
                    <p> <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            No se admiten campos vacíos, todos campos son requeridos
                        </div>

                    </div></p>
                </div>
                <form>
                    <div class="row">
                        <div class="col-sm-6 mt-2">
                              <div class="form-group">
                                  <label for="register-email" class="form-label">Razón social</label>
                                  <input type="text" class="form-control @error('razon_social') is-invalid @enderror" id="register-razon_social" wire:model="razon_social" placeholder="Nombre del ente" aria-describedby="register-razon_social" tabindex="2" value="{{ old('razon_social') }}" />
                                  @error('razon_social')
                                    <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                    </span>
                                  @enderror
                               </div>
                           </div>
                             <div class="col-sm-6 mt-2">
                              <div class="form-group">
                                  <label for="register-email" class="form-label">RIo de la empresa</label>
                                  <input type="text" class="form-control @error('documento') is-invalid @enderror" id="register-documento" wire:model="documento" placeholder="Documento del ente" aria-describedby="register-documento" tabindex="2" value="{{ old('documento') }}" />
                                  @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                    </span>
                                  @enderror
                               </div>
                           </div>
                           <div class="col-sm-6 mt-2">
                              <div class="form-group">
                                  <label for="register-email" class="form-label">Teléfono de contacto de la empresa</label>
                                  <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="register-telefono" wire:model="telefono" placeholder="Contacto del ente" aria-describedby="register-telefono" tabindex="2" value="{{ old('telefono') }}" />
                                  @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                    </span>
                                  @enderror
                               </div>
                           </div>
                           <div class="col-sm-6 mt-2">
                              <div class="form-group">
                                  <label for="register-email" class="form-label">Correo de la empresa</label>
                                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email" wire:model="email" placeholder="Correo del ente" aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" />
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                    </span>
                                  @enderror
                               </div>
                           </div>
                             <div class="col-sm-12 mt-2">
                              <div class="form-group">
                                  <label for="register-email" class="form-label">Direccióo de la empresa</label>
                                  <textarea type="text" class="form-control @error('tx_direccion') is-invalid @enderror" id="register-tx_direccion" wire:model="tx_direccion" placeholder="Contacto del ente" aria-describedby="register-tx_direccion" tabindex="2" value="{{ old('tx_direccion') }}" cols="30" rows="1">
                                  </textarea>
                                  @error('tx_direccion')
                                    <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                    </span>
                                  @enderror
                               </div>
                           </div>
                            @php
                          $estados  =  [1 => 'Activo' ,0 => 'Inactivo'];
                      @endphp
                      <div class="col-sm-12 mt-2">
                          <label for="telefono">Estado de la empresa</label>
                           <select wire.model="is_active" id="" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                           </select>
                        </div>
                         <div class="col-sm-12 mt-2">
                             <div class="form-group">
                              <label for="product_unit">Logo del ente <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Ingresa la Logo del ente."></i> <span class="text-danger">*</span></label>
                              <div class="file-upload-wrapper">
                                  <input type="file" id="input-file-now-custom-1" wire:model="logo_empresa" class="file-upload" data-default-file="{{asset('images/fallback_product_image.png')}}" />
                              </div>
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
