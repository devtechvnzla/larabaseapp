<?php

namespace App\Http\Livewire;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\UsersExport;
use Illuminate\Validation\Rules\Password;
class Users extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

	protected $paginationTheme = 'bootstrap';
    public $selected_id,
           $keyWord,
           $cif,
           $dpi,
           $name,
           $username,
           $email,
           $status,
           $empresa_id,
           $role_id,
           $password;

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
        $this->orderable         = (new User())->orderable;
        $this->initListsForFields();
    }

    public function render()
    {
        $query = User::with(['roles'])->advancedFilter([
            's'               =>$this->search ?: null,
            'order_column'    =>$this->sortBy,
            'order_direction' =>$this->sortDirection,
        ]);

        $users = $query->paginate($this->perPage);

        return view('livewire.users.view', compact('query', 'users'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->cif = null;
		$this->dpi = null;
		$this->name = null;
		$this->username = null;
		$this->email = null;
		$this->status = null;
		$this->empresa_id = null;
		$this->role_id = null;
        $this->password = null;
    }

    public function store()
    {
        $this->validate([
		//'cif' =>'required',
		//'dpi' =>'required',
		'name' =>'required',
		'username' =>'required',
		'email' =>'required|unique:users',
		'status' =>'required',
		'empresa_id' =>'required',
		'role_id' =>'required',
        'password' => ['required', Password::defaults()],
        ]);

        //$user = \Adldap::search()->where('uid', '=', $this->username)->first();


            $re = '/\b(\w)[^\s]*\s*/m';
            $str = $this->name;
            $subst = '$1';
            $result = preg_replace($re, $subst, $str);

            $user = new User();
            //$user->cif        = $this->cif;
            $user->dpi        = $result;
            $user->name       = $this->name;
            $user->username   = $this->username;
            $user->email      = $this->email;
            $user->status     = $this->status;
            $user->empresa_id = $this->empresa_id;
            $user->role_id    = $this->role_id;
            $user->password   = \Hash::make($this->password);
            $user->save();
            $user->roles()->sync($this->role_id);

            $this->resetInput();
            $this->emit('closeModal');
            $this->emit('alert','¡Bien hecho!','Datos ingresados satisfactoriamente','success');


    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id;
		//$this->cif        = rand(15,30);
		$this->dpi        = uniqid();
		$this->name       = $record->name;
		$this->username   = $record->username;
		$this->email      = $record->email;
		$this->status     = $record->status;
		$this->empresa_id = $record->empresa_id;
		$this->role_id    = $record->role_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		//'dpi' =>'required',
		'name' =>'required',
		'username' =>'required',
		'email' =>'required',
		'status' =>'required',
		'empresa_id' =>'required',
		'role_id' =>'required',
        ]);

        if ($this->selected_id) {
			$user = User::find($this->selected_id);
            //$user->dpi        = $this->dpi;
            $user->name       = $this->name;
            $user->username   = $this->username;
            $user->email      = $this->email;
            $user->status     = $this->status;
            $user->empresa_id = $this->empresa_id;
            $user->role_id    = $this->role_id;
            if ($this->password <> null) {
              $user->password   = \Hash::make($this->password);
            }
            $user->save();
            $user->roles()->sync($this->role_id);

            $this->resetInput();
            $this->updateMode = false;
			$this->emit('closeModal');
            $this->emit('alert','¡Bien hecho!','Datos modificados satisfactoriamente','success');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
            $this->emit('alert','¡Lo siento!','Datos eliminados satisfactoriamente','success');
        }
    }

     protected function initListsForFields(): void
    {
        $this->listsForFields['users'] = \App\Models\User::pluck('name', 'id')->toArray();
    }

     public function deleteConfirmation($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

     public function deletedConfirmed()
    {
        if ($this->selected_id) {
            $record = User::where('id', $this->selected_id);
            $record->delete();
            $this->resetInput();
            $this->updateMode = false;
            $this->emit('closeModal');
            $this->emit('alert','¡Bien hecho!','Datos eliminados satisfactoriamente','success');
        }

    }
    public function export()
       {
           return \Maatwebsite\Excel\Facades\Excel::download(new UsersExport,'users.xlsx');
       }

}
