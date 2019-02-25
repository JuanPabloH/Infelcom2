<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchArea extends Model
{
    public function Area_groups(){
    	return $this->hasMany('App\Area_Group');
    }
    public function groups(){
    	return $this->belongsToMany('App\Group','area_groups');
    }
}
