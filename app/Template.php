<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Template extends Model
{
    //
    public $timestamps = false;
    public $folder="template";
    
    public function logo_path()
    {
      
        return  asset('storage/'.$this->folder.'/'.$this->logo) ;
    }
    public function favicon_path()
    {
        return asset('storage/'.$this->folder.'/'.$this->favicon) ;
    }
}
