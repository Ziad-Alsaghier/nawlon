<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet',
        'user_id',
        'total_earned'
    ]; 

    public function account_process () {
        return $this->hasMany(UserAccountProcess::class,'user_accounts_id')->where('status','pending');
    }
    public function user_account_process () {
        return $this->hasMany(UserAccountProcess::class,'user_accounts_id');
    }
}
