<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
class Package extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'type',
            'price_monthly',
            'car_limitation',
            'price_year',
            'user_id',
    ];


        public function users(){
          return  $this->hasMany(User::class);
        }

 
}
