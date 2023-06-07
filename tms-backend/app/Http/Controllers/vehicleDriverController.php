<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\vehicleDriver;

class vehicleDriverController extends Controller
{
    public function index()
    {
        $driver = vehicleDriver::all();
        return response()->json($driver);
    }  
    public function store(Request $request)
    {
        $driver = new vehicleDriver([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile')
        ]);
        $driver->save();
        return response()->json('Welcome to our organization, new vehicle driver employee');
    }
    public function show($id)
    {
        $contact = vehicleDriver::find($id);
        return response()->json($contact);
    }
    public function update(Request $request, $id)
    {
       $driver = vehicleDriver::find($id);
       $driver->update($request->all());
       return response()->json('Vehicle driver info has updated');
    }
    public function destroy($id)
    {
        $employees = vehicleDriver::find($id);
        $employees->delete();
        return response()->json('Vehicle driver you are fired !');
    }
}
