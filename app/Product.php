<?php

namespace App;

use Carbon\Carbon;

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

    public function scopefilter($query, $filter){

        if(isset($filter['month'])){
            if($month = $filter['month']){
                $query->whereMonth('created_at', Carbon::parse($month)
                ->month);
            }
        }

        if(isset($filter['month'])){
            if($year = $filter['year']){
                $query->whereYear('created_at', $year);
            }
        }
    }
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthName(created_at) month, count(*) published')
        ->orderByRaw('min(created_at) desc')
        ->groupBy('year','month')
        ->get();
    }
}
