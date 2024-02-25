<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
protected $fillable =[
       'driv_name',
       'id_number',
       'salary',
       'comsium',
       'image',
       'image_procedures',
       'image_license',
       'license',
       'ex_date',
       'address',
       'user_id',
       'phone',
]; 


    public function violations(){
        return $this->hasMany(ViolationDriver::class);
    }
}
