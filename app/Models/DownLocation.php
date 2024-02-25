<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownLocation extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'user_id'
    ];

    public function nawlons(){
        return $this->hasMany(Nawlone::class);
    }
}
