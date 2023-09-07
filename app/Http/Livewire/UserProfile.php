<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserProfile extends Component
{

  public $selected_id, $name, $lastname, $email, $agencia_id, $username, $accountActivation;

  public function mount()
  {
    $this->name        = \Auth::user()->name;
    $this->lastname    = \Auth::user()->lastname;
    $this->username    = \Auth::user()->username;
    $this->email       = \Auth::user()->email;
    $this->agencia_id  = \Auth::user()->agencia_id;
    $this->selected_id = \Auth::id();
  } 

  public function render()
    {
        $agencias = \App\Models\Agencia::where('empresa_id',\Auth::user()->empresa_id)
        ->get();
        return view('livewire.user-profile',compact('agencias'));
    }

     public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

     private function resetInput()
    {
        $this->name        = \Auth::user()->name;
        $this->username    = \Auth::user()->username;
        $this->email       = \Auth::user()->email;
        $this->agencia_id  = \Auth::user()->agencia_id;
        $this->selected_id = \Auth::id();
    }

     public function update()
    {

        $re     = '/\b(\w)[^\s]*\s*/m';
        $str    = $this->name;
        $subst  = '$1';
        $result = preg_replace($re, $subst, $str);
        $user = \App\Models\User::find($this->selected_id);
        $user->dpi         = $result;
        $user->name        = $this->name;
        $user->username    = $this->username;
        $user->email       = $this->email;
        $user->agencia_id  = $this->agencia_id;
        $user->save();

        $this->emit('alert','¡Bien hecho!','Datos modificados satisfactoriamente','success');
        
    }

}
