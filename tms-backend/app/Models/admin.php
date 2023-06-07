<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class admin extends Model
{   
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'password', 'mobile' , 'address' , 'branch'];  
   
}
