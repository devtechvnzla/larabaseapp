<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
         if (! \Gate::allows('role_access'))
      {

           \Alert::error('¡Lo siento!','No tienes permiso para acceder a este módulo');

           return \Redirect::to('home');

        } else
       {
            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha ingresado al módulo de roles en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();
           return view('role::index');
       }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permisos = \Spatie\Permission\Models\Permission::where('status',1)->get();
        return view('role::create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       try {


        $role = \DB::table('roles')->where('name',$request->name)->first();

        if ($role <> null) {

            \Alert::error('¡Lo siento!','El Role ya existe');
            return redirect()->route('role.index');
        }
        else
        {


            $role = new \Spatie\Permission\Models\Role();

            $role->name = $request->name;
            $role->status = $request->status;
            $role->save();

            if(! empty($request->permissions))
            {
                $role->givePermissionTo($request->permissions);
            }
            else
            {
                $permissions =  \Spatie\Permission\Models\Permission::all();

                foreach ($permissions as $permission)
                {
                    $role->revokePermissionTo($permission->name);
                }
            }

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha registrado un nuevo role en el sistema: '.$role->name.' el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();

            \Alert::success('¡Bien hecho!','Role creado satisfactoriamente');
            return redirect()->route('role.index');
        }



       } catch (\Exception $e) {

            \Alert::error('¡Lo siento!','Algo salió mal al enviar el formulario');
            return redirect()->route('role.index');
       }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $role = \Spatie\Permission\Models\Role::find($id);
        $permisos = \Spatie\Permission\Models\Permission::where('status',1)->get();

        $logs = new \App\Models\Log();
        $logs->user_id = \Auth::id();
        $logs->empresa_id = \Auth::user()->empresa_id;
        $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha ingresado para modificar el role: '.$role->name.' en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
        $logs->fecha_registro = date('d/m/Y');
        $logs->save();
        return view('role::edit',compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {


        try {

            if(! empty($request->permissions))
            {
                $role = \Spatie\Permission\Models\Role::find( $id);
                $role->status = $request->status;
                $role->save();

                $role->givePermissionTo($request->permissions);
            }
            else
            {
                $permissions =  \Spatie\Permission\Models\Permission::all();
                $role = \Spatie\Permission\Models\Role::find($id);
                $role->status = $request->status;
                $role->save();

                foreach ($permissions as $permission)
                {
                    $role->revokePermissionTo($permission->name);
                }
            }

            $logs = new \App\Models\Log();
            $logs->user_id = \Auth::id();
            $logs->empresa_id = \Auth::user()->empresa_id;
            $logs->descripcion = 'El usuario: '.\Auth::user()->name.' Ha modificado el role: '.$role->name.' en el sistema el día '.date('d').' del mes '.date('m').' del presente año a las '.date('H:i:s');
            $logs->fecha_registro = date('d/m/Y');
            $logs->save();


            \Alert::success('¡Bien hecho!','Role modificado satisfactoriamente');
            return redirect()->route('role.index');



        } catch (\Exception $e) {

        }


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
}
