<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function users(){

        return $this->belongsTo(User::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function productfeatures(){

        return $this->hasMany(Productfeature::class);
    }
}
