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
        'user_id',
        
    ];


     function car(){
     return $this->belongsTo(Car::class);
        
     }
     function car_parts(){
     return $this->belongsToMany(CarPart::class,'maintenance_car_parts')->withTimestamps();
        
     }
     function srevicesMaintanenc(){
     return $this->hasMany(ServicesMaintanence::class);
        
     }
     public function getCreatedAtAttribute($date){
     return date('d-m-Y',strtotime($date));
     }
    
}
