<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller
{
    public function index()
    {
        $t = task::all();
        return response()->json($t);
    }  
    public function store(Request $request)
    {
        $t = new task([
            'name' => $request->input('name'),
            'licence_plate_number' => $request->input('licence_plate_number'),
            'pickup_date' => $request->input('pickup_date'),
            'dropoff_date' => $request->input('dropoff_date'),
            'customerName' => $request->input('customerName'),
            'upPlace' => $request->input('upPlace'),
            'dropPlace' => $request->input('dropPlace'),
            'status' => $request->input('status')
        ]);
        $t->save();
        return response()->json('A new task is created!');
    }
    public function show($id)
    {
        $t = task::find($id);
        return response()->json($t);
    }
    public function update(Request $request, $id)
    {
       $t = task::find($id);
       $t->update($request->all());
       return response()->json('Task details have been updated');
    }
    public function destroy($id)
    {
        $t = task::find($id);
        $t->delete();
        return response()->json('A task is omitted! ');
    }
}
