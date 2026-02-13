<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function connection(){
        return response()->json([
            'success' => true,
            'message' => 'Connected'
        ], 200);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'temperature' => 'required|integer',
            'phlevel' => 'required|integer',
            'lux' => 'required|integer',
        ]);

        $sensorData = SensorData::create($validatedData);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data Stored Successfully',
            ],
            201
        );
    }

    public function getData(){
        // get the first 10 latest entries
        $data = SensorData::latest()->take(10)->get();
        return response()->json($data, 200);
    }
}
