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
    /**
     *  string uploadImage(UploadedImage $image)
     * @param UploadedImage|null $image
     * @return string
     */
    public static function uploadImage($image)
    {
        $filenameToStore='';
        if (!empty($image)) {
        // Get filename with extension
          $filenameWithExt = $image->getClientOriginalName();
              // Get just the filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              // Get extension
          $extension = $image->getClientOriginalExtension();
              // Create new filename
          $filenameToStore = $filename.'_'.time().'.'.$extension;
              // Uplaod image
          $path= $image->storeAs('public/categories/', $filenameToStore);
      }
      return $filenameToStore;
    }
}
