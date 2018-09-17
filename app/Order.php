<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $guarded = [];

    public function users(){

        return $this->belongsTo(User::class);
    }

    public function orderitems(){

        return $this->hasMany(Order_item::class);
    }
}
