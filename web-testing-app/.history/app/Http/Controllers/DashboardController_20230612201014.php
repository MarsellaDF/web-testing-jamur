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

        // $data["countClickDashboard"] = 
        //         DB::table("first_click")->select('id_user', 'id_menu', DB::raw('count(*) as total'))
        //         ->groupBy('id_user', 'id_menu')
        //         ->get(); 

        $data["countClickPage"] = 
                DB::table("first_click")->select('id_menu', DB::raw('count(*) as total'))
                ->groupBy('id_menu')
                ->get(); 

        $data["countTimePage"] = $result = DB::table('first_click')
                ->select('id_menu', 'id_user', DB::raw('MAX(duration) as max_duration'))
                ->groupBy('id_menu', 'id_user')
                ->get();

        $data["result"] = DB::table('countClickDashboard')
                ->select('id_menu', DB::raw('AVG(duration) as avg_duration'))
                ->groupBy('id_menu')
                ->get();
    

        // $data["countTimeMenu"] = DB::table('first_click')
        //         ->select('id_menu', 'id_user', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(time_skenario))) as total_time'))
        //         ->groupBy('id_menu', 'id_user')
        //         ->get();

        $data["data"] = "Anam";

        return $data;

        return view('dashboard', $data);
    }
}