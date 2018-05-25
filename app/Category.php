<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $fillable = ['name','description','image'];

    public function animals()
    {
        return $this->hasMany('App\Animal');
    }
}
