<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;

class adminController extends Controller
{
    public function index()
    {
        $employees = admin::all();
        return response()->json($employees);
    }  
    public function store(Request $request)
    {
            $a = new admin([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'branch' => $request->input('branch')
        ]);
        $a->save();
        return response()->json('A new admin has joined!');
    }
    public function show($id)
    {
        $a = admin::find($id);
        return response()->json($a);
    }
    public function update(Request $request, $id)
    {
       $a = admin::find($id);
       $a->update($request->all());
       return response()->json('Admin detail has updated');
    }
    public function destroy($id)
    {
        $a = admin::find($id);
        $a->delete();
        return response()->json('Admin left the organization ! ');
    }
}
