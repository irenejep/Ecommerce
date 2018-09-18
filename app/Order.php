<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = ['user_id', 'order_status_id'];

    public function users(){

        return $this->belongsTo(User::class);
    }

    public function orderitems(){

        return $this->hasMany(Order_item::class);
    }

    public function orderstatuses(){

        return $this->hasMany(Order_status::class);
    }
}
