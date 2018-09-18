<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_status extends Model
{

    public function orders(){

        $this->hasMany(Order::class);
    }
}
