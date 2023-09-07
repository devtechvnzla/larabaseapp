<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Login;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Exports\LoginsExport;

class Logins extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $user_agent, $session_token, $ip_address, $login_at, $logout_at, $ciudad;
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
        $this->orderable         = (new Login())->orderable;
        $this->initListsForFields();
    }


    public function render()
    {
		 if (\Auth::user()->role_id == 1) {
             $query = Login::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);
             $logins = $query->paginate($this->perPage);
             return view('livewire.logins.view', compact('query', 'logins'));
         }
         else
         {
            $query = Login::where('user_id',\Auth::user()->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);
             $logins = $query->paginate($this->perPage);
             return view('livewire.logins.view', compact('query', 'logins'));
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
		$this->user_agent = null;
		$this->session_token = null;
		$this->ip_address = null;
		$this->login_at = null;
		$this->logout_at = null;
		$this->ciudad = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'user_agent' => 'required',
		'session_token' => 'required',
		'ip_address' => 'required',
		'login_at' => 'required',
        ]);

        Login::create([
			'user_id' => $this-> user_id,
			'user_agent' => $this-> user_agent,
			'session_token' => $this-> session_token,
			'ip_address' => $this-> ip_address,
			'login_at' => $this-> login_at,
			'logout_at' => $this-> logout_at,
			'ciudad' => $this-> ciudad
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Login Successfully created.');
    }

    public function edit($id)
    {
        $record = Login::findOrFail($id);

        $this->selected_id = $id;
		$this->user_id = $record-> user_id;
		$this->user_agent = $record-> user_agent;
		$this->session_token = $record-> session_token;
		$this->ip_address = $record-> ip_address;
		$this->login_at = $record-> login_at;
		$this->logout_at = $record-> logout_at;
		$this->ciudad = $record-> ciudad;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'user_agent' => 'required',
		'session_token' => 'required',
		'ip_address' => 'required',
		'login_at' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Login::find($this->selected_id);
            $record->update([
			'user_id' => $this-> user_id,
			'user_agent' => $this-> user_agent,
			'session_token' => $this-> session_token,
			'ip_address' => $this-> ip_address,
			'login_at' => $this-> login_at,
			'logout_at' => $this-> logout_at,
			'ciudad' => $this-> ciudad
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Login Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Login::where('id', $id);
            $record->delete();
        }
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['logins'] = \App\Models\Login::pluck('user_agent', 'id')->toArray();
    }

    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new LoginsExport,'logins.xlsx');
    }
}
