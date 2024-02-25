<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_id',
        'category_id',
        'car_id',
        'user_id',
        'ex_date',
    ];



    public function license(){
        return $this->belongsTo(License::class);
    }
    public function category(){
       return $this->belongsTo(Category::class);
    }
    public function car(){
       return $this->belongsTo(Car::class);
    }
}
