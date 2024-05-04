<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
        use HasFactory, SoftDeletes;

        protected $fillable = [
                'cars_name',
                'image',
                'brand',
                'car_type',
                'car_number',
                'category_id',
                'user_id',
                'status',
                'car_text',

        ];

        function category()
        {
                return $this->belongsTo(Category::class);
        }
        function license()
        {
                return $this->hasOne(License::class);
        }
        public function car_parts()
        {
                return $this->belongsToMany(CarPart::class,'cars_car_part');
        }

        public function violations()
        {
                return $this->hasMany(ViolationCar::class);
        }
        function maintenances()
        {
                return $this->hasMany(Maintenance::class, 'car_id');
        }
        function maintenances_price()
        {
                return $this->hasMany(Maintenance::class, 'car_id')->sum('maintenances_price');
        }
        public function nawlon()
        {
                return $this->hasMany(Nawlone::class)->orderBy('created_at', 'desc');
        }
        public function nawlon_price()
        {
                return $this->hasMany(Nawlone::class)->sum('nawlone_price');
        }

         public function getCreatedAtAttribute($date){
         return date('d-m-Y',strtotime($date));
         }
         public function taxes(){
         return $this -> hasMany(tax::class)->sum('total_tex');
         }
       
}
