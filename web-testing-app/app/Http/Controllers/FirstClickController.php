<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FirstClickModel;

class FirstClickController extends Controller
{
    public function save(Request $request)
    {
        $new = new FirstClickModel;
        $new->ip = $request->ip();
        $new->id_menu = $request->get('id_menu');
        $new->sumbu_x = $request->get('sumbu_x');
        $new->sumbu_y = $request->get('sumbu_y');
        $new->id_skenario = $request->get('id_skenario');
        $new->duration = $request->get('duration');
        $new->id_user = $request->get('id_user');
        $new->time_skenario = $request->get('durasi_skenario');
        $new->save();

        return response()->json(['succes' => 'Ini pada test berhasil menambahkan data']);
    }
}
