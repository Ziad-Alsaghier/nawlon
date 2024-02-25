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
        'location',
    ];




    public function product_categories(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function productCars(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
}
