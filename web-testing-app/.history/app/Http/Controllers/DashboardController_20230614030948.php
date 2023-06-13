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

        $range = range(1, 5); // Range key 1 sampai 5

        $maxValue = null;
        $maxKey = null;

        foreach ($range as $key) {
            if (isset($menuMaxDurations[$key])) {
                $value = $menuMaxDurations[$key];
                if ($maxValue === null || $value > $maxValue) {
                    $maxValue = $value;
                    $maxKey = $key;
                }
            }
        }
        
        $data["menuMaxDurations"] = $maxKey;

        $menuMinDurations = [];

        foreach ($data["countTimePage"] as $menu) {
            $idMenu = $menu->id_menu;
            $minDuration = $menu->max_duration;

            if (!isset($menuMinDurations[$idMenu]) || $minDuration < $menuMinDurations[$idMenu]) {
                $menuMinDurations[$idMenu] = $minDuration;
            }
        }

        $range = range(1, 5); // Range key 1 sampai 5

        $minValue = null;
        $minKey = null;

        foreach ($range as $key) {
            if (isset($menuMinDurations[$key])) {
                $value = $menuMinDurations[$key];
                if ($minValue === null || $value < $minValue) {
                    $minValue = $value;
                    $minKey = $key;
                }
            }
        }
        $data["menuMinDurations"] = $minKey;
        $data["userCounts"] = DB::table('users')
                ->where('role', 3)
                ->count();


        $nilaiTerbesar = 0;
        $idMenuTerbesar = "";

        foreach ($data["countClickPage"] as $datas) {
            if ($datas->total > $nilaiTerbesar) {
                $nilaiTerbesar = $datas->total;
                $idMenuTerbesar = $datas->id_menu;
            }
        }
        $dataValue = "";
        switch ($idMenuTerbesar) {
            case 1:
                $dataValue = "Dashboard";
                break;
            case 2:
                $dataValue = "Produk";
                break;
            case 3:
                $dataValue = "Galeri";
                break;
            case 4:
                $dataValue = "Kontak";
                break;
            case 5:
                $dataValue = "Tentang";
                break;
            default:
                // Code to execute if none of the cases match
                break;
        }

        $data['idMenuTerbesar'] = $dataValue;

        // $data["result"] = DB::table('first_click')
        //         ->select('id_menu', DB::raw('SUM(duration) as total_duration'), DB::raw('COUNT(*) as count'))
        //         ->groupBy('id_menu')
        //         ->get();
    

        return $data;
// 
        return view('dashboard', $data);
    }
}