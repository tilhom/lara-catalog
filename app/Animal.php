<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public $fillable = ['cat_id','name','description','image'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
