<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revenue extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'total_price',
            'date',
            'user_id',
            'category_revenue_id',
    ];

     public function category_revenue(){
     return $this->belongsTo(CategoryRevenues::class);
     }
}
