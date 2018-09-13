<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productfeature extends Model
{
    protected $fillable = [
        'product_id', 'feature_id'
    ];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
