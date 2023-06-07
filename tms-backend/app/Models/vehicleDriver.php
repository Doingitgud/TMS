<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class vehicleDriver extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'vehicle_driver';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'password', 'address' , 'mobile'];  
   
}
