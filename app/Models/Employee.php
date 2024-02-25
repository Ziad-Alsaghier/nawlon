<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
      protected $fillable = [
      'name',
      'divide_id',
      'phone',
      'id_employee',
      'address',
      'image',
      'image_procedures',
      'salary',
      'user_id',

      ];

        public function divide(){
        return $this->belongsTo(Divide::class);
        }

}
