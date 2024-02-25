<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable =[
        'maintenances_price',
        'description',
        'car_id',
        
    ];


     function car(){
     return $this->belongsTo(Car::class);
        
     }
     function car_parts(){
     return $this->belongsToMany(CarPart::class,'maintenance_car_parts');
        
     }
    
    
}
