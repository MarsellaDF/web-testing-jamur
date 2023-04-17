<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstClickModel;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('monitoring');
    }

    public function showMonitor()
    {
        $data = FirstClickModel::orderBy('created_at')->get();

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