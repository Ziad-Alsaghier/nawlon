<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccountProcess extends Model
{
    use HasFactory;

    protected $fillable = [
          'user_accounts_id',
          'money',
          'process_type',
          'status',
    ];




    
}
