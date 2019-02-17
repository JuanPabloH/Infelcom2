<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchArea extends Model
{
    public function Area_hotbeds(){
    	return $this->hasMany('App\Area_Hotbed');
    }
    public function hotbeds(){
    	return $this->belongsToMany('App\Hotbed','area_hotbeds');
    }
}
