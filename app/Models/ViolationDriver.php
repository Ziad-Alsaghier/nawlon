<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationDriver extends Model
{
    use HasFactory;

    protected $fillable =[
    'violations',
    'driver_id',
    'type',
    'violation_number',
    'violation_price',
    'violation_date',
    'user_id',
    ];
    public function driver(){
    return $this->belongsTo(Driver::class);
    }

       
}
