<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['penguji'] = DB::table('users')
            ->where("role", 3)
            ->orderByDesc('id')
            ->get();

        // return $data;
        return view("datauser", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['penguji'] = DB::table('users')->where("id", $id)->orderByDesc('id')->first();
        $data['datapenguji'] = DB::table('first_click')->where('id_user', $id)->get();
        $data['timespenguji'] = DB::table('first_click')->select('time_skenario')->where('id_user', $id)->where('id_menu', 1)->orderByDesc('time_skenario')->get();
        $data['timemenu1'] = DB::table('first_click')->select('duration')->where('id_user', $id)->where('id_menu', 1)->orderByDesc('duration')->get();

        $data['timemenu2'] = DB::table('first_click')->select('duration')->where('id_user', $id)->where('id_menu', 2)->orderByDesc('duration')->get();
        $data['timemenu3'] = DB::table('first_click')->select('duration')->where('id_user', $id)->where('id_menu', 3)->orderByDesc('duration')->get();
        $data['timemenu4'] = DB::table('first_click')->select('duration')->where('id_user', $id)->where('id_menu', 4)->orderByDesc('duration')->get();
        $data['timemenu5'] = DB::table('first_click')->select('duration')->where('id_user', $id)->where('id_menu', 5)->orderByDesc('duration')->get();

        $data['timeskenario1'] = DB::table('first_click')->select('time_skenario')->where('id_user', $id)->where('id_skenario', 1)->orderByDesc('time_skenario')->get();
        $data['timeskenario2'] = DB::table('first_click')->select('time_skenario')->where('id_user', $id)->where('id_skenario', 2)->orderByDesc('time_skenario')->get();
        $data['timeskenario3'] = DB::table('first_click')->select('time_skenario')->where('id_user', $id)->where('id_skenario', 3)->orderByDesc('time_skenario')->get();
        // return $data;
        return view("show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
