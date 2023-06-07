<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class task extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'licence_plate_number', 'pickup_date' , 'dropoff_date', 'customerName', 'upPlace','dropPlace', 'status'];  
    
}
