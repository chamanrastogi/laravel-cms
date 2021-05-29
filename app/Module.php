<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Module extends Model
{
    //
    public $timestamps = false;
    public $folder="module";
    public function image_path()
    {
        
        return asset('storage/'.$this->folder.'/'.$this->image) ;
    }
}
