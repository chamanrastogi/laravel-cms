<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //
    public $timestamps = false;
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
