<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class vehicle extends Model
{   
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    protected $fillable = ['model', 'licence_plate_number', 'current_driver' , 'status'];  
  
}
