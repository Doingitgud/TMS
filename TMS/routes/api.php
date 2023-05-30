<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;// password would be in hash format
use app\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Create Employee
Route::post('/users/create', function(Request $request)//we get data: $request  when someone sends api request on route /users/create
{    $addData=$request->all();//array addData gets all info from array request

    if(!User::where('email','=',$addData['email'])->exists()){  //if email from database does not match this email from $request
            $employee=User::create([           //creating a new row within database from Models/database
              "name"=>$addData["name"],
              "email"=>$addData["email"],
              "password"=>Hash::make($addData["password"])//convert plain text to hash
            ]);
         if(empty($employee->id)){// if any value in employee array is missing
            return[
                "Success"=>false,
                "response"=>[
                    "error"=>"An unexpected error has occured"
                ]
                ];
         }else{
            return[
               "success"=> true,
               "response"=>["employee"=> $employee]//passing the employee array we created
            ];
         }

    }else{//when that employee is already in database
        return[
            "success" => false,
            "response" => ["This Employee already exists.."]
        ];
    }
});
//Get employee
Route::get('/users/all', function()
{
     $employee=User::all();
     if(empty($employee)){   //if there is no user in database
        return[
           "success"=>false,
           "response"=> ["error"=>"No Employees found"]
        ];
     }
     return[
        "success"=>true,
        "response"=>["employees"=>$employee]
     ];
});

Route::get('/users/{id}', function(Request $request,$id){// trying to get a specific employee from database. Here $id is same as {id}
  $employee=User::find($id);   //passing data from database to variable employee with specific data if found
  if(empty($employee)){        //when employee variable is empty
    return[
        "success"=>false,
        "response"=> ["error"=>"No Employees found"]
    ];
  }
  
    return[
        "success"=>true,
        "response"=>["employee"=>$employee]
     ]; 

});

//deleting a specific employee
Route::delete('/users/{id}', function(Request $request, $id){
   $employee=User::find($id);      //passing data from database to variable employee with specific data if found
   if(empty($employee)){
      $success = false;
      $response= ["error"=>"Empoyee data could not be deleted"];

   }else{
    $success = $employee->delete();  //$employee->delete() returns a boolean value
    $response= ["message"=>"Empoyee deleted successfully"];
   }
   return["success"=>$success, "response"=>$response];
});

//updating an specific user

Route::put('/users/update/{id}', function(Request $request, $id){
     $data=$request->all();     // data from $request transferred to variable data
     $employee=User::find($id);  // variable employee will get specific data row from database based on specific $id 
     foreach($data as $key=>$val){  //we need to loop through columns of same row and match it to the data 
        $employee->{$key}=$val;    //for every single key we pass through when we get the key, value gets updated
     }
     $result=$employee->save(); // $employee->save() return a boolean value
     return["success"=>$result, "response"=>["employee"=>$employee]];
});

