<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicleDriver extends Model
{
    protected $table = 'vehicle_driver';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'password', 'address' , 'mobile'];  
    use HasFactory;
}
