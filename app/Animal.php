<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	use Sluggable;
    //public $fillable = ['name','description','price','image'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getFormattedPriceAttribute()
    {
         return number_format($this->price/100,2,',',' ');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
