<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nawlone extends Model
{
    use HasFactory;
    protected $fillable = [
    'driver_id',
    'car_id',
    'down_location_id', // id For down location tatek
    'location_name',// name Location down
    'location_tatek_id', // id tatek
    'location_tatek_name', // string Name For location tatek  
    'nawlone_price',
    'comsion_driver',
    'custody',
    'solar',
    'user_id',
    ];





    public function car(){
    return $this->belongsTo(Car::class)->withTrashed();
    }
    public function driver(){
    return $this->belongsTo(Driver::class);
    }
    public function down_location(){
    return $this->belongsTo(DownLocation::class);
    }
    public function location_tatek(){
    return $this->belongsTo(LocationTatek::class);
    }
}
