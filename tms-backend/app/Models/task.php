<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'licence_plate_number', 'pickup_date' , 'dropoff_date', 'customerName', 'upPlace','dropPlace', 'status'];  
    use HasFactory;
}
