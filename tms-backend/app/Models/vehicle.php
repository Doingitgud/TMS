<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{   
    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    protected $fillable = ['model', 'licence_plate_number', 'current_driver' , 'status'];  
    use HasFactory;
}
