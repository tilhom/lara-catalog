<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public const ACTIVE = 1;
    public const DISABLE = 0;

	use Sluggable;

	public $fillable = ['name','description','image','status'];

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function statusOn()
    {
        return self::where('status',self::ACTIVE)->get();
    }

    public function animals()
    {
        return $this->hasMany('App\Animal');
    }
}
