<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line_of_investigation extends Model
{
    public function Group_lines(){
    	return $this->hasMany('App\Group_Line');
    }
    public function groups(){
    	return $this->belongsToMany('App\Group','Group_lines');
    }
}
