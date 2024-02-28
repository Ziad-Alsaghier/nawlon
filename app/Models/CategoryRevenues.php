<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRevenues extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function revenues(){
       return $this->hasMany(revenue::class);
    }

        public function getCreatedAtAttribute($value){
        return date('Y-m-d',strtotime($value));
        }
}
