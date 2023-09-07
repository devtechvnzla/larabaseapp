<?php

namespace App\Http\Livewire;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Permission;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\PermissionsExport;
class Permissions extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;


	protected $paginationTheme = 'bootstrap';
    public $selected_id,
           $keyWord,
           $name,
           $status,
           $descripcion,
           $slug;
     protected $listeners = ['deleteConfirmed' => 'deletedConfirmed'];


    public $updateMode = false;

   public int $perPage;

    public array $orderable;

     public array $listsForFields = [];

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' =>[
            'except' =>'',
        ],
        'sortBy' =>[
            'except' =>'id',
        ],
        'sortDirection' =>[
            'except' =>'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 5;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Permission())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Permission::with(['roles'])->advancedFilter([
            's'               =>$this->search ?: null,
            'order_column'    =>$this->sortBy,
            'order_direction' =>$this->sortDirection,
        ]);

        $permissions = $query->paginate($this->perPage);
        $modulos     = \App\Models\Modulo::get();
        return view('livewire.permissions.view', compact('query', 'permissions','modulos'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
		$this->descripcion = null;
		$this->slug = null;
    }

    public function store()
    {
        $this->validate([
        'name' => 'required',
        'descripcion' => 'required',
        'slug' => 'required',
        'status' => 'required',
        ]);

            $permission = new Permission();
			$permission->name         = $this->name;
			$permission->descripcion   = $this->descripcion;
			$permission->slug          = $this-> slug;
            $permission->status        = $this-> status;
            $permission->save();

            $role = \Spatie\Permission\Models\Role::find(1);
            $role->givePermissionTo($this->name);

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha registrado un nuevo permiso en el sistema: '.$permission->name.' para el módulo de: '.$permission->slug.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();


        $this->resetInput();
        $this->emit('closeModal');
        $this->emit('alert','¡Bien hecho!','Datos ingresados satisfactoriamente','success');
    }

    public function edit($id)
    {
        $record = Permission::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->descripcion = $record-> descripcion;
		$this->slug = $record-> slug;
        $this->status = $record-> status;

        $this->updateMode = true;
    }

    public function update()
    {


        if ($this->selected_id) {
			$permission = Permission::find($this->selected_id);
            $permission->name         = $this->name;
            $permission->descripcion   = $this->descripcion;
            $permission->slug          = $this-> slug;
            $permission->status        = $this-> status;
            $permission->save();

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha modificado el permiso en el sistema: '.$permission->name.' para el módulo de: '.$permission->slug.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();

           $this->resetInput();
           $this->updateMode = false;
           $this->emit('closeModal');
           $this->emit('alert','¡Bien hecho!','Datos modificados satisfactoriamente','success');
        }
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = \App\Models\Permission::pluck('name', 'id')->toArray();
    }

       public function deleteConfirmation($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

     public function deletedConfirmed()
    {
        if ($this->selected_id) {
            $record = Permission::find($this->selected_id);

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha eliminado el permiso en el sistema: '.$record->name.' para el módulo de: '.$record->slug.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();


            $record->delete();
            $this->emit('alert','¡Bien hecho!','Datos eliminados satisfactoriamente','success');
        }

    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new PermissionsExport,'permissions.xlsx');
    }
}
