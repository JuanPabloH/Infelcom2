<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line_of_investigation extends Model
{
    public function Hotbed_lines(){
    	return $this->hasMany('App\Hotbed_Line');
    }
    public function hotbeds(){
    	return $this->belongsToMany('App\Hotbed','Hotbed_lines');
    }
}
