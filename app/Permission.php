<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $guarded=[];
    //
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
