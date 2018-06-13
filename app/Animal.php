<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	use Sluggable;
    public $fillable = ['name','description','price','image','category_id'];

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
          $path= $image->storeAs('public/animals/', $filenameToStore);
      }
      return $filenameToStore;
    }
}
