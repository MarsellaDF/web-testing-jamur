<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = \App\Models\User::find(Auth::user()->id);

        $user->ip = $request->ip();
        $user->update();

        $data["countClickDashboard"] = DB ::table("first_click")->all(); 

        $data["data"] = "Anam";

        return $data;

        return view('dashboard', $data);
    }
}