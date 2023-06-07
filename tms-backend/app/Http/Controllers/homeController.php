<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\admin;
use App\Models\vehicleDriver;
use App\Models\vehicle;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $Count = (array) null;
        $Count[0] = task::count();
        $Count[1] = admin::count();
        $Count[2] = vehicle::count();
        $Count[3] = vehicleDriver::count();
        return response()->json($Count);
    }  
    
}
