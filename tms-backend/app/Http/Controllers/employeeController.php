<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\vehicleDriver;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index()
    {
        $t = vehicleDriver::all();
        return response()->json($t);
    }  
    
    public function update(Request $request, $id)
    {
       $t = task::find($id);
       $t->update($request->all());
       return response()->json('Task details have been updated');
    }
}
