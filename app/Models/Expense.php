<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_expenses_id',
        'total_price',
        'date',
        'user_id',


    ];
        public function category_expenses()
        {
            return $this->belongsTo(CategoryExpense::class);
        }
}
