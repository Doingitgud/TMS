<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\vehicleDriver;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        $users=vehicleDriver::table('users')->select('id','name','email')->get();
        return view('some-view')->with('users', $users);
        
    }  
}
