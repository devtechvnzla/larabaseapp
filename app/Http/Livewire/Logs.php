<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Log;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Exports\LogsExport;


class Logs extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $empresa_id, $descripcion, $fecha_registro;
    public $updateMode = false;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $permissions = [];

    public array $paginationOptions;

     public array $listsForFields = [];


    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
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
        $this->orderable         = (new Log())->orderable;
        $this->initListsForFields();
    }


    public function render()
    {
		 if (\Auth::user()->role_id == 1) {
             $query = Log::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);
             $logs = $query->paginate($this->perPage);
             return view('livewire.logs.view', compact('query', 'logs'));
         }
         else
         {
            $query = Log::where('user_id',\Auth::user()->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);
             $logs = $query->paginate($this->perPage);
             return view('livewire.logs.view', compact('query', 'logs'));
         }



    }


    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->user_id = null;
		$this->empresa_id = null;
		$this->descripcion = null;
		$this->fecha_registro = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'empresa_id' => 'required',
		'descripcion' => 'required',
		'fecha_registro' => 'required',
        ]);

        Log::create([
			'user_id' => $this-> user_id,
			'empresa_id' => $this-> empresa_id,
			'descripcion' => $this-> descripcion,
			'fecha_registro' => $this-> fecha_registro
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Log Successfully created.');
    }

    public function edit($id)
    {
        $record = Log::findOrFail($id);

        $this->selected_id = $id;
		$this->user_id = $record-> user_id;
		$this->empresa_id = $record-> empresa_id;
		$this->descripcion = $record-> descripcion;
		$this->fecha_registro = $record-> fecha_registro;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'empresa_id' => 'required',
		'descripcion' => 'required',
		'fecha_registro' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Log::find($this->selected_id);
            $record->update([
			'user_id' => $this-> user_id,
			'empresa_id' => $this-> empresa_id,
			'descripcion' => $this-> descripcion,
			'fecha_registro' => $this-> fecha_registro
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Log Successfully updated.');
        }
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['logs'] = \App\Models\Log::pluck('descripcion', 'id')->toArray();
    }

}
