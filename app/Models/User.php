<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'phone',
        'parent_phone',
        'position',
        'identity',
        'status',
        'package_id',
        'logoImage',
        'commission',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }


    public function package(){
        return  $this->belongsTo(Package::class);
      }
    public function roles(){
        return  $this->hasMany(RoleUser::class);
      }

      public function user_account(){
        return $this->hasOne(userAccount::class);
      }
      public function campanies_pending(){
        return $this->hasMany(User::class,'user_id')
        ->where('position','customer')
        ->where('status','pending');
      }
      public function customer_accepted(){
        return $this->hasMany(User::class,'user_id')
        ->where('position','customer')
        ->where('status','accepted');
      }
      public function customers(){
    return $this->hasMany(User::class, 'user_id');
      }
      

      public function getImageUrl (){
        if($this->image){
            return url('storage/app/public/'.$this->image);
        }
        return 'C:\xampp\tmp'.$this->name;
      }
      
             
    
}
