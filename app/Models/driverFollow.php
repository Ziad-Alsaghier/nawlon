<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driverFollow extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'id_follow',
            'image',
            'image_procedures',
            'salary',
            'address',
            'phone',
            'user_id',
            // 'driver_id',
    ];

}
