<?php

namespace App\Http\Livewire;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Agencia;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\AgenciasExport;

class Agencias extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $code, $name, $status, $user_id, $empresa_id;

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
        $this->orderable         = (new Agencia())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        $logs = new \App\Models\Log();
        $logs->user_id = \Auth::id();
        $logs->empresa_id = \Auth::user()->empresa_id;
        $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha ingresado al módulo de agencias en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
        $logs->fecha_registro = date('d/m/Y');
        $logs->save();

        $query = Agencia::advancedFilter([
            's'               =>$this->search ?: null,
            'order_column'    =>$this->sortBy,
            'order_direction' =>$this->sortDirection,
        ]);

        $agencias = $query->paginate($this->perPage);

        return view('livewire.agencias.view', compact('query', 'agencias'));
    }



    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->code = null;
		$this->name = null;
		$this->status = null;
		$this->user_id = null;
		$this->empresa_id = null;
    }

    public function store()
    {
        $this->validate([
		//'code' => 'required',
		'name' => 'required',
		'status' => 'required',
		//'user_id' => 'required',
		//'empresa_id' => 'required',
        ]);

        $logs = new \App\Models\Log();
        $logs->user_id = \Auth::id();
        $logs->empresa_id = \Auth::user()->empresa_id;
        $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha ingresado a: '.$this->name.' como una nueva agencias en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
        $logs->fecha_registro = date('d/m/Y');
        $logs->save();


        $agencia = new Agencia();
		$agencia->code =  uniqid();
		$agencia->name  =$this-> name;
		$agencia->status  =$this-> status;
		$agencia->user_id = \Auth::id();
		$agencia->empresa_id = \Auth::user()->empresa_id;
        $agencia->save();

        $this->resetInput();
		$this->emit('closeModal');
		$this->emit('alert','¡Bien hecho!','Dato registrado satisfactoriamente','success');
    }

    public function edit($id)
    {
        $record = Agencia::findOrFail($id);

        $this->selected_id = $id;
		$this->code = $record-> code;
		$this->name = $record-> name;
		$this->status = $record-> status;
		$this->user_id = $record-> user_id;
		$this->empresa_id = $record-> empresa_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'code' => 'required',
		'name' => 'required',
		'status' => 'required',
		'user_id' => 'required',
		'empresa_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Agencia::find($this->selected_id);
            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha modificado a: '.$this->name.' de una agencia en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
        $logs->save();
            $record->update([
			//'code' => $this-> code,
			'name' => $this-> name,
			'status' => $this-> status,
			'user_id' => $this-> user_id,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
			$this->emit('alert','¡Bien hecho!','Dato actualizado satisfactoriamente','success');
        }
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['agencias'] = \App\Models\Agencia::pluck('name', 'id')->toArray();
    }

    public function deleteConfirmation($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

     public function deletedConfirmed()
    {
        if ($this->selected_id) {
            $user   = \App\Models\User::where('agencia_id',$this->selected_id)
            ->update([
            'status' => 0

            ]);


            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha inactivado a: '.$this->name.' de una agencia en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');

            $record = Agencia::find($this->selected_id);
            $record->status = 0;
            $record->save();

            $this->emit('alert','¡Bien hecho!','Datos eliminados satisfactoriamente','success');
        }

    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new AgenciasExport,'agencias.xlsx');
    }
}
