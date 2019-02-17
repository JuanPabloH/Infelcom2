<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function Faculty(){
    	return $this->belongsTo('App\Faculty');
    }
    public function Hotbeds(){
    	return $this->hasMany('App\Hotbed');
    }
}
