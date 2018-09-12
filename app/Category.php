<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function users(){

        return $this->belongsTo(User::class);
    }

    public function products(){

        return $this->hasMany(Product::class);
    }
}
