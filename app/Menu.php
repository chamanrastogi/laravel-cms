<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
   
    public function staus_check()
    {
        if($this->status==0)
        {
            return "Active";
        }else
        {
            return "Deactive";
        }
       
    }
}
