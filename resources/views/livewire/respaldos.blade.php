@section('title', __('Roles'))
<div>
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                    <div class="card-controls">
                        <div class="row">
                            <div class="demo-inline-spacing">

                               @can('backup_generate')
                               <button id="create-backup" type="button" class="btn btn-primary">Crear respaldo</button>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split  ml-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    Tipos de backup
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                    <li>
                                        <a class="dropdown-item" href="#" id="create-backup-only-db" wire:click.prevent="">
                                            Create database backup
                                        </a>
                                    </li>

                                    <li></li> <a class="dropdown-item" href="#" id="create-backup-only-files" wire:click.prevent="">
                                        Create files backup
                                    </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                                    </ul>
                                    <button class="btn btn-primary  btn-refresh ml-auto"
                                        wire:loading.class="loading"
                                        wire:loading.attr="disabled"
                                        wire:click="updateBackupStatuses">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.7875rem" height="0.7875rem" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path class="heroicon-ui" d="M6 18.7V21a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2H7.1A7 7 0 0 0 19 12a1 1 0 1 1 2 0 9 9 0 0 1-15 6.7zM18 5.3V3a1 1 0 0 1 2 0v5a1 1 0 0 1-1 1h-5a1 1 0 0 1 0-2h2.9A7 7 0 0 0 5 12a1 1 0 1 1-2 0 9 9 0 0 1 15-6.7z"/>
                                    </svg>
                                </button>
                                </div>
                                @endcan
                           </div>
                      </div>
                   </div>
                </h4>
              </div>
             <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead">
                            <tr class="text-center">
                                <th scope="col">Disco</th>
                                <th scope="col">Healthy</th>
                                <th scope="col">Cantidad de respaldos</th>
                                <th scope="col">Nuevo respaldo</th>
                                <th scope="col">Espacio utilizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backupStatuses as $backupStatus)
                                <tr class="text-center">
                                    <td>{{ $backupStatus['disk'] }}</td>
                                    <td>
                                        @if($backupStatus['healthy'])
                                        <span class="iconify menu-icon tf-icons text-success" data-icon="mdi:checkbox-marked-circle"></span>
                                        @else
                                        <span class="iconify menu-icon tf-icons text-danger" data-icon="mdi:checkbox-marked-circle"></span>
                                        @endif
                                    </td>
                                    <td>{{ $backupStatus['amount'] }}</td>
                                    <td>{{ $backupStatus['newest'] }}</td>
                                    <td>{{ $backupStatus['usedStorage'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="mt-2 col-sm-12">
            <div class="card shadow-sm">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th scope="col">Ruta del archivo</th>
                            <th scope="col">Fecha de creación</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file['path'] }}</td>
                                <td>{{ $file['date'] }}</td>
                                <td>{{ $file['size'] }}</td>
                                <td class="text-right pr-3">
                                   @can('backup_download')
                                   <a class="action-button mr-2" href="#" target="_blank" wire:click.prevent="downloadFile('{{ $file['path'] }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path class="heroicon-ui" d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"/>
                                    </svg>
                                </a>
                                   @endcan
                                    @can('backup_delete')
                                    <a class="action-button" href="#" target="_blank" wire:click.prevent="showDeleteModal({{ $loop->index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path class="heroicon-ui" d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"/>
                                        </svg>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                        @if(!count($files))
                            <tr>
                                <td class="text-center" colspan="4">
                                    {{ 'No backups present' }}
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title mb-3">Delete backup</h5>
                                @if($deletingFile)
                                <span class="text-muted">
                                    Are you sure you want to delete the backup created at {{ $deletingFile['date'] }} ?
                                </span>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary cancel-button" data-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-danger delete-button" wire:click="deleteFile">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        @this.updateBackupStatuses()

        @this.on('backupStatusesUpdated', function () {
            @this.getFiles()
        })

        @this.on('showErrorToast', function (message) {
            Swal.fire({
                title: '¡Lo siento!',
                text: message,
                icon: 'error',
                showCancelButton: true,

                })
        })

        const backupFun = function (option = '') {
            Swal.fire({
                title: '¡Bien hecho!',
                text: 'Creating a new backup in the background...' + (option ? ' (' + option + ')' : ''),
                icon: 'success',
                showCancelButton: true,

                })

            @this.createBackup(option)
        }

        $('#create-backup').on('click', function () {
            backupFun()
        })
        $('#create-backup-only-db').on('click', function () {
            backupFun('only-db')
        })
        $('#create-backup-only-files').on('click', function () {
            backupFun('only-files')
        })

        const deleteModal = $('#deleteModal')
        @this.on('showDeleteModal', function () {
            deleteModal.modal('show')
        })
        @this.on('hideDeleteModal', function () {
            deleteModal.modal('hide')
        })

        deleteModal.on('hidden.bs.modal', function () {
            @this.deletingFile = null
        })
    })
</script>

@endpush
