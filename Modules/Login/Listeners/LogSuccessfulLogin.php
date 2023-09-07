<?php

namespace Modules\Login\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Login as LoginModel;

class LogSuccessfulLogin
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
     public function handle(Login $event)
    {


        $logs = new \App\Models\Log();
        $logs->user_id = \Auth::id();
        $logs->empresa_id = \Auth::user()->empresa_id;
        $logs->descripcion = 'El usuarios: '.\Auth::user()->name.' Ha iniciado sesión en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
        $logs->fecha_registro = date('d/m/Y');
        $logs->save();

        $login = $login = new LoginModel;
        $login->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $login->session_token = session('_token');
        $login->ip_address = $_SERVER['REMOTE_ADDR'];
        $login->login_at = \Carbon\Carbon::now();
        $login->mes = date('m');
        $login->empresa_id = \Auth::user()->empresa_id;
        $event->user->logins()->save($login);



         \Alert::alert('¡Bien hecho! '.\Auth::user()->name, 'Su sesión ha iniciado satisfactoriamente.', 'success');


    }
}
