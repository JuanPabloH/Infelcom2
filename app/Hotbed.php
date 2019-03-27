<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotbed extends Model
{
    public function User_Hotbed(){
        return $this->hasMany('App\User_Hotbed');
    }
    public function users(){
        return $this->belongsToMany('App\User','user_hotbeds');
    }

    public function scopeName($query,$name){
        if (trim($name) != "") {
           $query->where("name","LIKE","%$name%");
        }    
    }
}
