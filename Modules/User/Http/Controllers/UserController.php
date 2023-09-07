<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (! \Gate::allows('user_access')) {

           \Alert::error('¡Lo siento!','No tienes permiso para acceder a este módulo');

           return \Redirect::to('home');

        } else {
           return view('user::index');
       }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }


    /**
     * Función para obtener datos el usuario Logueado
     * Creado por: Theizer Gonzalez
     * 04/02/2023 7:58  PM
     */
    public function profile()
    {
        $logins = \App\Models\Login::WithUser()
        ->get();
     
        $nombre = \Auth::user();
        $iniciales= $this->getIniciales($nombre);

        return view('user::auth.profile',compact('logins','iniciales'));
    }

    /**
     * Función para obtener datos el usuario Logueado
     * Creado por: Theizer Gonzalez
     * 04/02/2023 7:58  PM
     */
    public function password()
    {
        $logins = \App\Models\Login::WithUser()
        ->get();
     
        $nombre = \Auth::user();
        $iniciales= $this->getIniciales($nombre);

        return view('user::auth.password',compact('logins','iniciales'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }


        function getIniciales($nombre){
            $name = '';
            $explode = explode(' ',$nombre);
            foreach($explode as $x){
                $name .=  $x[0];
            }
            return $name;
        }


}
