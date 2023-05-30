<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstClickModel;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('monitoring');
    }

    public function showMonitor(Request $request)
    {
        // $data = FirstClickModel::orderBy('created_at')->get();
        $data = DB::table('first_click')->where("id_menu", $request->get('menu'))->get();

        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'dataku' => "",
                'message' => 'Data tidak ada',
            ]);
        }
        return response()->json(['success'=>'Ajax request submitted successfully', 'data'=>$data]);
        // return response()->json([
        //     'success' => $data,
        // ],200);
    }
}
