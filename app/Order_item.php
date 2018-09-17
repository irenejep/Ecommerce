<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $guarded = [];

    public function orderitem(){

        return $this->belongsTo(Product::class);
    }
}
