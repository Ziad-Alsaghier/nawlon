<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

     protected $fillable=[
     'license_number',
     'ex_date',
     'car_id',
     'user_id',
     'image',
     ];



     function car(){
     return $this->belongsTo(Car::class);
     }

}
