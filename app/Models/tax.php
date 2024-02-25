<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tax extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'total_tex',
        'user_id',
        'date',
    ];

    public function car(){
        return $this->BelongsTo(Car::class);
    }
}
