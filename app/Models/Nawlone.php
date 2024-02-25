<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nawlone extends Model
{
    use HasFactory;
    protected $fillable = [
    'car_id',
    'down_location_id',
    'tatek_location',
    'nawlone_price',
    'comsion_driver',
    'custody',
    'solar',
    'user_id',
    ];





    public function car(){
    return $this->belongsTo(Car::class);
    }
    public function drivers(){
    return $this->belongsTo(Driver::class);
    }
    public function down_location(){
    return $this->belongsTo(DownLocation::class);
    }
}
