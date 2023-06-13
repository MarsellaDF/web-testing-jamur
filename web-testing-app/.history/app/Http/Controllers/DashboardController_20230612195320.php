<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = \App\Models\User::find(Auth::user()->id);

        $user->ip = $request->ip();
        $user->update();

        $data["countClickDashboard"] = 
                DB::table("first_click")->select('id_user', 'id_menu', DB::raw('count(*) as total'))
                ->groupBy('id_user', 'id_menu')
                ->get(); 

        $data["countClickDashboard"] = 
                DB::table("first_click")->select('id_menu', DB::raw('count(*) as total'))
                ->groupBy( 'id_menu')
                ->get(); 

        $data["data"] = "Anam";

        return $data;

        return view('dashboard', $data);
    }
}