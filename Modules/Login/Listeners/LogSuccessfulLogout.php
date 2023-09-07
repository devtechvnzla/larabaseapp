<?php

namespace Modules\Login\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Login;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Logout $event)
    {
             $token = Login::where('user_id', \Auth::user()->id)->get();
             $lastToken = $token->last();

             $login = $event->user->logins()->where('session_token', $lastToken->session_token)->first();

             $login->logout_at = \Carbon\Carbon::now();
             $login->save();

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha finalizado sesión en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();


                \Alert::alert('¡Vuelve pronto!', 'Su sesión ha finalizado satisfactoriamente.', 'success');
                return redirect()->to('/login');
    }
}
