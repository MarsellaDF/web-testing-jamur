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


        $data["countClickPage"] = 
                DB::table("first_click")->select('id_menu', DB::raw('count(*) as total'))
                ->groupBy('id_menu')
                ->get(); 

        $data["countTimePage"] = $result = DB::table('first_click')
                ->select('id_menu', 'id_user', DB::raw('MAX(duration) as max_duration'))
                ->groupBy('id_menu', 'id_user')
                ->orderBy('max_duration', 'desc')
                ->get();

        $menuMaxDurations = [];

        foreach ($data["countTimePage"] as $menu) {
            $idMenu = $menu->id_menu;
            $maxDuration = $menu->max_duration;
        
            if (!isset($menuMaxDurations[$idMenu]) || $maxDuration > $menuMaxDurations[$idMenu]) {
                $menuMaxDurations[$idMenu] = $maxDuration;
            }
        }

        $data["menuMaxValueDurations"] = collect($menuMaxDurations)->max();

        $data["menuMaxDurations"] = $menuMaxDurations;

        $data["userCounts"] = DB::table('users')
                ->where('role', 3)
                ->count();
        // $data["result"] = DB::table('first_click')
        //         ->select('id_menu', DB::raw('SUM(duration) as total_duration'), DB::raw('COUNT(*) as count'))
        //         ->groupBy('id_menu')
        //         ->get();
    

        return $data;

        return view('dashboard', $data);
    }
}