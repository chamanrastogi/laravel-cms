<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    //
    protected $table = 'gallery';
    public $folder="gallery";
    public function image_path()
    {
        
        return  asset('storage/'.$this->folder.'/'.$this->image);
    }
    public function status()
    {
       if($this->status==0)
       {
           return ['Acitve','info'];
       }else
       {
        return ['Deactive','danger'];
       }
    }
}
