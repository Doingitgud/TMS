<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\vehicle;

class vehicleController extends Controller
{
    public function index()
    {
        $vec = vehicle::all();
        return response()->json($vec);
    }  
    public function store(Request $request)
    {
        $veh = new vehicle([
            'model' => $request->input('model'),
            'licence_plate_number' => $request->input('licence_plate_number'),
            'current_driver' => $request->input('current_driver'),
            'status' => $request->input('status')
        ]);
        $veh->save();
        return response()->json('A new vehicle is bought for our organization');
    }
    public function show($id)
    {
        $veh = vehicle::find($id);
        return response()->json($veh);
    }
    public function update(Request $request, $id)
    {
       $veh = vehicle::find($id);
       $veh->update($request->all());
       return response()->json('Vehicle info is now updated');
    }
    public function destroy($id)
    {
        $veh = vehicle::find($id);
        $veh->delete();
        return response()->json('This vehicle was sold ! ');
    }
}
