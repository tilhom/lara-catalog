<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Sluggable;

	public $fillable = ['name','description','image'];

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function animals()
    {
        return $this->hasMany('App\Animal');
    }
}
