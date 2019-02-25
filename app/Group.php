<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function School(){
    	return $this->belongsTo('App\School');
    }
    public function ResearchCenter(){
    	return $this->belongsTo('App\ResearchCenter');
    }
    public function area_groups(){
    	return $this->hasMany('App\Area_Group');
    }
    public function areas(){
    	return $this->belongsToMany('App\ResearchArea','area_groups');
    }

    public function Group_lines(){
        return $this->hasMany('App\Group_Line');
    }
    public function lines(){
        return $this->belongsToMany('App\Line_of_investigation','group_lines');
    }
}
