<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users   = \App\Models\User::where('status',1)->orderBy('id','ASC')->get();
        $logs    = \App\Models\Log::orderBy('id','ASC')->get();
        $logins1 = \App\Models\Login::whereMonth('created_at',1)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins2 = \App\Models\Login::whereMonth('created_at',2)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins3 = \App\Models\Login::whereMonth('created_at',3)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins4 = \App\Models\Login::whereMonth('created_at',4)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins5 = \App\Models\Login::whereMonth('created_at',5)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins6 = \App\Models\Login::whereMonth('created_at',6)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins7 = \App\Models\Login::whereMonth('created_at',7)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins8 = \App\Models\Login::whereMonth('created_at',8)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins9 = \App\Models\Login::whereMonth('created_at',9)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins10 = \App\Models\Login::whereMonth('created_at',10)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins11 = \App\Models\Login::whereMonth('created_at',11)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        $logins12 = \App\Models\Login::whereMonth('created_at',12)
                                     ->whereYear('created_at',date('Y'))
                                     ->count();
        //dd($logins7);

        return view('home', compact('users',
                                    'logs',
                                    'logins1',
                                    'logins2',
                                    'logins3',
                                    'logins4',
                                    'logins5',
                                    'logins6',
                                    'logins7',
                                    'logins8',
                                    'logins9',
                                    'logins10',
                                    'logins11',
                                    'logins12',));
    }
}
