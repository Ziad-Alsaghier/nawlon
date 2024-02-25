<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'product_category_id',
        'user_id'
    ];



    public function parent_categories(){
        return $this->hasMany(ProductCategory::class)->where('status','1');
    }
    public function product_category(){
        return $this->belongsTo(ProductCategory::class)->where('status','0');
    }
}
