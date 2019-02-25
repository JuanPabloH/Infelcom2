<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area_Group extends Model
{
    public function Group(){
    	return $this->belongsTo('App\Group');
    }
    public function area(){
    	return $this->belongsTo('App\ResearchArea');
    }
}
