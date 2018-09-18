<?php

namespace App;

use App\User_type;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','users_types_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user_type(){
        
        return $this->belongsTo(User_type::class);
    }

    public function features(){

        return $this->hasMany(Feature::class);
    }

    public function products(){

        return $this->hasMany(Product::class);
    }

    public function orders(){

        return $this->hasMany(Order::class);
    }
}
