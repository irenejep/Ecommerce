<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = ['user_id', 'order_status_id', 'product_id', 'order_number','price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
