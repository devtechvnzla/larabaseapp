<?php

namespace App\Http\Livewire;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Empresa;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\EmpresasExport;

class Empresas extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $razon_social, $documento, $telefono, $direccion, $email, $is_active, $logo_empresa;
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

     protected $listeners = ['deleteConfirmed' => 'deletedConfirmed'];


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
        $this->orderable         = (new Empresa())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {


        $query = Empresa::advancedFilter([
            's'               =>$this->search ?: null,
            'order_column'    =>$this->sortBy,
            'order_direction' =>$this->sortDirection,
        ]);

        $empresas = $query->orderBy('id','DESC')->paginate($this->perPage);

        return view('livewire.empresas.view', compact('query', 'empresas'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->razon_social = null;
		$this->documento = null;
		$this->telefono = null;
		$this->direccion = null;
		$this->email = null;
		$this->is_active = null;
		$this->logo_empresa = null;
    }

    public function store()
    {
        $this->validate([
		'razon_social' => 'required',
		'documento' => 'required',
		'email' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'email' => 'required',
        ]);

        $logs = new \App\Models\Log();
        $logs->user_id = \Auth::id();
        $logs->empresa_id = \Auth::user()->empresa_id;
        $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha registrado una empresa en el sistema, con la razón social: '.$this->razon_social.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
        $logs->fecha_registro = date('d/m/Y');
        $logs->save();

        Empresa::create([
			'razon_social' => $this->razon_social,
			'documento' => $this->documento,
			'telefono' => $this->telefono,
			'direccion' => $this->direccion,
			'email' => $this->email,
			'is_active' => $this->is_active,
			//'logo_empresa' => $this->logo_empresa
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		$this->emit('alert','¡Bien hecho!','Dato registrado satisfactoriamente','success');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);

        $this->selected_id = $id;
		$this->razon_social = $record->razon_social;
		$this->documento = $record->documento;
		$this->telefono = $record->telefono;
		$this->direccion = $record->direccion;
		$this->email = $record->email;
		$this->is_active = $record->is_active;
		$this->logo_empresa = $record->logo_empresa;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'razon_social' => 'required',
		'documento' => 'required',
		'email' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([
			'razon_social' => $this->razon_social,
			'documento' => $this->documento,
			'telefono' => $this->telefono,
			'direccion' => $this->direccion,
			'email' => $this->email,
			'is_active' => $this->is_active,
			//'logo_empresa' => $this->logo_empresa
            ]);

            if ($this->is_active == 0) {
               $user= \App\Models\User::where('empresa_id',$record->id)
               ->update([
                'status' => 0
               ]);
            } else {
              $user= \App\Models\User::where('empresa_id',$record->id)
               ->update([
                'status' => 1
               ]);
            }


            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha modificado a la empresa en el sistema, con la razón social: '.$this->razon_social.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
			$this->emit('alert','¡Bien hecho!','Dato actualizado satisfactoriamente','success');
        }
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['empresas'] = \App\Models\Empresa::pluck('razon_social', 'id')->toArray();
    }

    public function deleteConfirmation($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

     public function deletedConfirmed()
    {
        if ($this->selected_id) {
            $user   = \App\Models\User::where('empresa_id',$this->selected_id)
            ->update([
            'status' => 0

            ]);

            $agencia   = \App\Models\Agencia::where('empresa_id',$this->selected_id)
            ->update([
            'status' => 0

            ]);

            $record = Empresa::find($this->selected_id);
            $record->is_active = 0;
            $record->save();

            $this->emit('alert','¡Bien hecho!','Datos modificados satisfactoriamente','success');
        }

    }


    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new EmpresasExport,'empresas.xlsx');
    }
}
