<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'car_part_id',
        'supplier_id',
        'quantity',
        'date',
        'totalPrice',
        'user_id',
        'imageInvoice',
    ];


        public function supplier(){
        return $this->belongsTo(Supplier::class);
        }
        public function product_category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
        }
        public function carPart(){
        return $this->belongsTo(CarPart::class);
        }


        public function getCreatedAtAttribute($date){
                return date('Y-m-d',strtotime($date));
        }
       
        public function getDateAttribute($date){
                return date('Y-m-d',strtotime($date));
        }
}
