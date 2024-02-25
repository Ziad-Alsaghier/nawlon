<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationCar extends Model
{
    use HasFactory;

      protected $fillable =[
      'violations',
      'car_id',
      'type',
      'violation_number',
      'violation_price',
      'violation_date',
      'user_id',
      ];


      public function car(){
      return $this->belongsTo(Car::class);
      }
}
