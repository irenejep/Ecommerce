<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = [];

    public function users(){

        return $this->belongsTo(User::class);
    }
}
