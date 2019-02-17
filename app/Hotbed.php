<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotbed extends Model
{
    public function School(){
    	return $this->belongsTo('App\School');
    }
    public function ResearchCenter(){
    	return $this->belongsTo('App\ResearchCenter');
    }
    public function area_hotbeds(){
    	return $this->hasMany('App\Area_Hotbed');
    }
    public function areas(){
    	return $this->belongsToMany('App\ResearchArea','area_hotbeds');
    }

    public function Hotbed_lines(){
        return $this->hasMany('App\Hotbed_Line');
    }
    public function lines(){
        return $this->belongsToMany('App\Line_of_investigation','hotbed_lines');
    }

    public function User_Hotbed(){
        return $this->hasMany('App\User_Hotbed');
    }
    public function users(){
        return $this->belongsToMany('App\User','user_hotbeds');
    }
}
