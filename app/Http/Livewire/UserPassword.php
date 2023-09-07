<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class UserPassword extends Component
{
    public $state = [];

    public $current_password, $new_password,$password_confirmation;


    public function mount()
    {
        $this->resetState();
    }

    public function updatePassword()
    {
        $this->validate([
        //'code' => 'required',
        'new_password' => ['required', Password::defaults()],
        "password_confirmation" => "required|min:8|max:50|same:new_password",
        //'user_id' => 'required',
        //'empresa_id' => 'required',
        ]);

        $user = \App\Models\User::find(\Auth::id());
        $user->password = \Hash::make($this->new_password);
        $user->save();

        $this->resetState();

        $this->emit('alert','¡Bien hecho!','Contraseña modificada satisfactoriamente','success');
    }

    public function render()
    {
        return view('livewire.user-password');
    }

    protected function rules()
    {
        return [
            'state.current_password' => ['required', 'current_password'],
            'state.password'         => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function resetState()
    { 
        $this->current_password      = '';
        $this->new_password          = '';
        $this->password_confirmation = '';
       
    }
}
