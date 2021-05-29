<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Post extends Model
{
    //
    public $folder="post";
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function image_path()
    {
        return url(Storage::url($this->folder.'/'.$this->post_image));
    }

   // public function  getPostImageAttribute($value) {
     //   if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
     //       return $value;
     //   }
      //  return asset('storage/' . $value);
      //  }
   
}
