<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;


    public function usuarios(){
        return $this->belongsToMany(User::class, 'notificacion_usuarios', 'notificacion_id', 'user_id');
    }


     public static function crearNotificacion($titulo, $texto, $link, $link_texto,$sent_to){
        $usuario = \Auth::user();

        $notificacion = new \App\Models\Notificaciones();
        $notificacion->titulo = $titulo;
        $notificacion->texto = $texto;
        $notificacion->link = $link;
        $notificacion->link_texto = $link_texto;
        $notificacion->fecha = date("Y-m-d H:i:s");
        $notificacion->sent_to = $sent_to;
        $notificacion->save();

        $usuario->notificaciones()->attach($notificacion);
        $usuario->save();

        \App\Models\Notificaciones::cargarNotificaciones();
    }

    public static function cargarNotificaciones(){
        $usuario = \Auth::user();
        $notificaciones = $usuario->notificaciones()->get();
        session(['notificaciones' => null]);
        session(['notificaciones' => $notificaciones]);
    }
}
