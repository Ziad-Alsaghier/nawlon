<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_category_id',
        'car_id',
        'coverPhoto',
        'image',
        'code',
        'user_id',
        'avg_car_part',
        'location',
    ];




    public function product_categories(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
    public function cars(){
        return $this->belongsToMany(Car::class,'cars_car_part');
    }
   
    public function productCars(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
}
